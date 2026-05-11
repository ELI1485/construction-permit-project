<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permit;

use App\Services\AIService;

class PermitController extends Controller
{
    public function store(
        Request $request,
        AIService $aiService
    )
    {

        $validated = $request->validate([

            'permit_type' => 'required|string',

            'surface' => 'required|numeric'
        ]);

        $uploadedDocs = [

            'cin'
        ];

        $aiResult = $aiService->validatePermit([

            'surface' => $validated['surface'],

            'permit_type' => $validated['permit_type'],

            'uploaded_docs' => $uploadedDocs
        ]);

        $permit = Permit::create([

            'user_id' => 1,

            'permit_type' => $validated['permit_type'],

            'surface' => $validated['surface'],

            'status' => 'submitted',

            'risk_score' => $aiResult['risk_score'],

            'risk_level' => $aiResult['risk_level'],

            'ai_priority' => $aiResult['priority'],

            'technical_review_required' => $aiResult[
                'technical_review_required'
            ],

            'ai_recommendations' => $aiResult[
                'recommendations'
            ]
        ]);

        return response()->json([

            'message' => 'Permit created successfully',

            'permit' => $permit,

            'ai_analysis' => $aiResult
        ]);
    }
}