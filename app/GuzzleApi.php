<?php

namespace App;

class GuzzleApi
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function test1()
    {
        $client = new \GuzzleHttp\Client([
            'http_errors' => false // This disables throwing exceptions for 4xx and 5xx responses
        ]);

        $headers = [
            'x-apihub-key' => 'COE9ZcTJCdchjd8NaCnxli0WMR27zx7WlkaFIv9I9NKnw-26V7',
            'x-apihub-host' => 'Faker-API.allthingsdev.co',
            'x-apihub-endpoint' => '068a5941-4f63-4db1-a04d-efbbe5ed833b'
         ];

        $response = $client->request('GET', 'https://Faker-API.proxy-production.allthingsdev.co/api/v2/creditCards?_quantity=3', ['headers' => $headers]);

        if($response->getStatusCode() == 200){
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            return $data;
        }
    }

    public static function test2()
    {
        $client = new \GuzzleHttp\Client([
            'http_errors' => false // This disables throwing exceptions for 4xx and 5xx responses
        ]);
        $headers = [
            'x-apihub-key' => 'COE9ZcTJCdchjd8NaCnxli0WMR27zx7WlkaFIv9I9NKnw-26V7',
            'x-apihub-host' => 'Faker-API.allthingsdev.co',
            'x-apihub-endpoint' => '068a5941-4f63-4db1-a04d-efbbe5ed833b'
         ];
        $request = new \GuzzleHttp\Psr7\Request('GET', 'https://Faker-API.proxy-production.allthingsdev.co/api/v2/creditCards?_quantity=3', $headers);

        try {
            $response = $client->sendAsync($request)->wait();
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);

            return $data;
        } catch (\Exception $e) {
            return 'An error occurred: ' . $e->getMessage();
        }
    }
}
