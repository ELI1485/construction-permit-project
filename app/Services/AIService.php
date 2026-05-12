<?php

namespace App\Services;

use App\Models\Permit;
use Illuminate\Support\Facades\Http;

class AIService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('AI_SERVICE_URL', 'http://127.0.0.1:8001');
    }

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

    public function validatePermit($data)
    {
        try {
            $response = Http::timeout(10)->post(
                $this->baseUrl . '/validate',
                $data
            );

            return $response->json();
        } catch (\Exception $e) {
            return [
                'risk_score' => 0,
                'risk_level' => 'low',
                'priority' => 'normal',
                'technical_review_required' => false,
                'recommendations' => []
            ];
        }
    }
}