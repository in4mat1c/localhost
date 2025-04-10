<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WildBerriesService {
    public function getData($searchText) {
        $data = [];
        $sendingData = [];
        $encodedText = urlencode($searchText);

        $url = "https://search.wb.ru/exactmatch/sng/common/v9/search?ab_testing=false&appType=1&curr=kzt&dest=123587538&hide_dtype=10;13&lang=ru&page=1&query={$encodedText}&resultset=catalog&sort=popular&spp=30&suppressSpellcheck=false&";

        $response = Http::get($url);

        if ($response->successful()) {
            $cards = $response->json()['data']['products'] ?? [];

            $cardsSlice = array_slice($cards, 0, 10);
            if (!empty($cards)) {
                foreach($cardsSlice as $card) {
                    $price = $card['sizes'][0]['price']['total'];
                    $formattedAmount = number_format($price / 100, 0, '.', ' ') . ' ₸';
                    $data[] = [
                        'id' => $card['id'],
                        'title' => $card['name'],
                        'price' => $formattedAmount,
                        'imageUrl' => null,
                        'storeUrl' => 'https://global.wildberries.ru/catalog/' . $card['id'] . '/detail.aspx',
                    ];
                }
                usort($data, function ($a, $b) {
                    return $a['price'] <=> $b['price'];
                });
                
            }
            return [
                'service_name' => 'WildBerries',
                'service_image' => 'public/images/logos/wildberries.png',
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