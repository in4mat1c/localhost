<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OzonService
{
    public function getData($searchText)
    {
        $url = "http://rollservice.ddns.net/ozon-search?query={$searchText}";

        $response = Http::get($url);

        if ($response->successful()) {
            $cards = $response->json();
            usort($cards, function ($a, $b) {
                return $a['price'] <=> $b['price'];
            });
            return [
                'service_name' => 'Ozon',
                'service_image' => 'public/images/logos/ozon.png',
                'data' => $cards,
            ];
        }

        return [
            'error' => 'Request failed',
            'status' => $response->status(),
            'body' => $response->body(),
        ];
    }
}