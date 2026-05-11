<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AIService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = 'http://127.0.0.1:8001';
    }

    public function validatePermit($data)
    {
        $response = Http::post(
            $this->baseUrl . '/validate',
            $data
        );

        return $response->json();
    }
}