<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PropertyController extends Controller
{
    /**
     * Get properties from Easy Broker API.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProperties()
    {
        $response = Http::withHeaders([
            'X-Authorization' => env('EASY_BROKER_API_TOKEN'),
            'accept' => 'application/json',
        ])->get('https://api.stagingeb.com/v1/properties', [
            'page' => 1,
            'limit' => 20,
        ]);
        
        return response()->json($response->json());
    }
}
