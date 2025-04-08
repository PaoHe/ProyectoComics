<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FastApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('http://localhost:5000'); 
    }

    public function get($endpoint)
    {
        $response = Http::get($this->baseUrl . $endpoint);
        return $response->successful() ? $response->json() : throw new \Exception('Error en la petición GET');
    }

    public function post($endpoint, $data)
    {
        $response = Http::post($this->baseUrl . $endpoint, $data);
        return $response->successful() ? $response->json() : throw new \Exception('Error en la petición POST');
    }

    public function put($endpoint, $data)
    {
        $response = Http::put($this->baseUrl . $endpoint, $data);
        return $response->successful() ? $response->json() : throw new \Exception('Error en la petición PUT');
    }

    public function delete($endpoint)
    {
        $response = Http::delete($this->baseUrl . $endpoint);
        return $response->successful() ? $response->json() : throw new \Exception('Error en la petición DELETE');
    }
}
