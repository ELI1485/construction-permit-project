<?php

namespace App\Services;

use App\Models\Permit;
use Illuminate\Support\Facades\Http;

class AIService
{
    public static function analyze(Permit $permit): array
    {
        $uploadedDocs = $permit->documents->pluck('file_name')->toArray();

        try {
            $response = Http::timeout(10)->post(env('AI_SERVICE_URL', 'http://localhost:8001') . '/validate', [
                'surface'      => $permit->surface,
                'permit_type'  => $permit->permitType?->nom ?? '',
                'uploaded_docs'=> $uploadedDocs,
            ]);

            if ($response->successful()) {
                $result = $response->json();

                $permit->update([
                    'risk_score'       => $result['risk_score'] ?? null,
                    'risk_level'       => $result['risk_level'] ?? null,
                    'ai_priority'      => $result['priority'] ?? null,
                    'ai_recommendations' => $result['recommendations'] ?? [],
                ]);

                return $result;
            }
        } catch (\Exception $e) {
            // AI service unavailable — continue without it
        }

        return [];
    }
}