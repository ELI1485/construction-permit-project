<?php

namespace App\Services;

use App\Models\Permit;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * AIService - Communication with FastAPI microservice.
 *
 * Sends permit data for AI analysis and stores results.
 * Handles OCR document processing requests.
 */
class AIService
{
    /**
     * Analyze a permit using the FastAPI AI microservice.
     * Sends permit data and uploaded documents list for risk assessment.
     */
    public static function analyze(Permit $permit): array
    {
        $uploadedDocs = $permit->documents->pluck('file_name')->map(function ($name) {
            // Extract document type from filename for AI analysis
            $lower = strtolower($name);
            if (str_contains($lower, 'cin')) return 'cin';
            if (str_contains($lower, 'plan') && str_contains($lower, 'arch')) return 'architectural_plan';
            if (str_contains($lower, 'titre') || str_contains($lower, 'foncier')) return 'land_title';
            if (str_contains($lower, 'situation')) return 'site_plan';
            if (str_contains($lower, 'quittance') || str_contains($lower, 'fiscal')) return 'tax_receipt';
            if (str_contains($lower, 'commerce') || str_contains($lower, 'registre')) return 'commercial_register';
            if (str_contains($lower, 'topograph')) return 'topographic_survey';
            return $name;
        })->toArray();

        try {
            $response = Http::timeout(15)
                ->retry(2, 500)
                ->post(env('AI_SERVICE_URL', 'http://localhost:8001') . '/validate', [
                    'permit_type'  => $permit->permitType?->nom ?? 'construction',
                    'surface'      => $permit->surface,
                    'location'     => $permit->district?->nom ?? '',
                    'uploaded_docs' => $uploadedDocs,
                    'owner_type'   => 'individual',
                ]);

            if ($response->successful()) {
                $result = $response->json();

                // Store AI analysis results in the permit
                $permit->update([
                    'risk_score'              => $result['risk_score'] ?? null,
                    'risk_level'              => $result['risk_level'] ?? null,
                    'ai_priority'             => $result['priority'] ?? null,
                    'ai_recommendations'      => $result['recommendations'] ?? [],
                    'technical_review_required' => $result['technical_review_required'] ?? false,
                ]);

                Log::info("AI Analysis completed for permit #{$permit->reference_number}", [
                    'risk_score' => $result['risk_score'],
                    'risk_level' => $result['risk_level'],
                    'priority'   => $result['priority'],
                ]);

                return $result;
            }

            Log::warning("AI Service returned non-successful response for permit #{$permit->reference_number}", [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
        } catch (\Exception $e) {
            Log::error("AI Service unavailable for permit #{$permit->reference_number}: {$e->getMessage()}");
        }

        return [];
    }

    /**
     * Process a document through OCR using the FastAPI microservice.
     *
     * @param string $filePath Path to the document file
     * @return array OCR results with extracted text and analysis
     */
    public static function processOCR(string $filePath): array
    {
        try {
            $response = Http::timeout(30)
                ->attach('file', file_get_contents($filePath), basename($filePath))
                ->post(env('AI_SERVICE_URL', 'http://localhost:8001') . '/ocr');

            if ($response->successful()) {
                $result = $response->json();

                Log::info("OCR processing completed for file: " . basename($filePath), [
                    'word_count' => $result['word_count'] ?? 0,
                    'is_valid'   => $result['analysis']['is_valid'] ?? false,
                ]);

                return $result;
            }

            Log::warning("OCR Service returned error for file: " . basename($filePath), [
                'status' => $response->status(),
            ]);
        } catch (\Exception $e) {
            Log::error("OCR Service unavailable: {$e->getMessage()}");
        }

        return [];
    }
}
