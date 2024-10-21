<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

abstract class BaseQlsService
{

    protected $baseUrl = 'https://api.pakketdienstqls.nl';
    protected function makeRequest(string $method, string $endpoint, array $data = [], array $params = [])
    {
        $response = Http::withBasicAuth(config('services.qls.login.username'),config('services.qls.login.password'))->$method($this->baseUrl . $endpoint, $method === 'get' ? $params : $data);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception("Request failed: " . $response->body());
    }

}
