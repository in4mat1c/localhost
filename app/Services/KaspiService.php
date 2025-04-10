<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KaspiService
{
    public function getData($searchText)
    {
        $data = [];
        $sendingData = [];
        $encodedText = urlencode($searchText);

        $url = "https://kaspi.kz/yml/product-view/pl/filters?text={$encodedText}&hint_chips_click=false&page=0&all=false&fl=true&ui=d&q=%3AavailableInZones%3AMagnum_ZONE1&i=-1&c=750000000";

        $response = Http::withHeaders([
            'Referer' => 'https://kaspi.kz/shop/search/?',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36',
            'Accept' => 'application/json, text/plain, */*',
            'Accept-Language' => 'ru-RU,ru;q=0.9,en;q=0.8',
            'Connection' => 'keep-alive',
        ])->get($url);

        if ($response->successful()) {
            $cards = $response->json()['data']['cards'] ?? [];
            $cardsSlice = array_slice($cards, 0, 10);
            if (!empty($cards)) {
                foreach ($cardsSlice as $card) {
                    $data[] = [
                        'id' => $card['id'],
                        'title' => $card['title'],
                        'price' => $card['priceFormatted'],
                        'imageUrl' => $card['previewImages'][0]['large'],
                        'storeUrl' => 'https://kaspi.kz/shop' . $card['shopLink'],
                    ];
                }
                usort($data, function ($a, $b) {
                    return $a['price'] <=> $b['price'];
                });
            }
            return [
                'service_name' => 'Kaspi',
                'service_image' => 'public/images/logos/kaspi.png',
                'data' => $data,
            ];
        }

        return [
            'error' => 'Request failed',
            'status' => $response->status(),
            'body' => $response->body(),
        ];
    }
}