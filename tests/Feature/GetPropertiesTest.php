<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class GetPropertiesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the getProperties method returns the expected JSON response.
     *
     * @return void
     */
    public function testGetProperties(): void
    {
        // Define the mock response data
        $mockResponse = [
            'data' => [
                ['id' => 1, 'name' => 'Property 1'],
                ['id' => 2, 'name' => 'Property 2'],
            ],
        ];

        // Fake the HTTP request to the external API
        Http::fake([
            'https://api.stagingeb.com/v1/properties*' => Http::response($mockResponse, 200),
        ]);

        // Send a GET request to your controller method
        $response = $this->get('/api/get-properties');

        // Assert that the response is JSON and has the expected data
        $response->assertStatus(200)
                 ->assertJson($mockResponse);
    }
}
