<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class TechnodomService {
    public function getData($searchText) {
        $data = [];
        $url = "https://api.technodom.kz/katalog/api/v2/products/ab/search";

        $response = Http::withHeaders([
            'SessionId' => 'db78505d-aa85-4504-800e-377a7d45c4d8',
            'Content-Type' => 'application/json'
        ])->post($url, [
            "categories" => [""],
            "city_id" => "5f5f1e3b4c8a49e692fefd70",
            "client_id" => "6FZ5xNy4WD",
            "filters" => new \stdClass(), 
            "limit" => 24,
            "page" => 1,
            "price_range" => [
                "max" => 0,
                "min" => 0
            ],
            "query" => $searchText,
            "referer" => "https://www.technodom.kz/search?recommended_by=instant_search&recommended_code=iphone%2015&r46_search_query=iphone%2015",
            "session_id" => "IYH0alWo9P",
            "sort_by" => "score",
            "sort_order" => "",
            "type" => "full_search"
        ]);

        if ($response->successful()) {
            $cards = $response->json()['products'] ?? [];
            $cardsSlice = array_slice($cards, 0, 10);
            if (!empty($cards)) {
                $i = 0;
                foreach ($cardsSlice as $card) {
                    $data[] = [
                        'id' => $i++,
                        'name' => $card['title'],
                        'price' => $card['price'],
                        'link' => 'https://www.technodom.kz/p/' . $card['uri'],
                    ];
                }
                usort($data, function ($a, $b) {
                    return $a['price'] <=> $b['price'];
                });
            }
            return $data;
        }

    }
}