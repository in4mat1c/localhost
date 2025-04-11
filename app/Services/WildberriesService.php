<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Log;

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
                    $imagePath = $this->findBasket($card['id']);

                    $data[] = [
                        'id' => $card['id'],
                        'title' => $card['name'],
                        'price' => $formattedAmount,
                        'imageUrl' => $imagePath,
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

    private function findBasket($id) {
        $idString = (string)$id;
        $forth = substr($idString, 0, 4);  
        $six = substr($idString, 0, 6);  
        $resultId = $idString; 

        foreach (range(10, 30) as $i) {
            $urls[] = "https://basket-{$i}.wbcontent.net/vol{$forth}/part{$six}/{$resultId}/images/c516x688/1.webp";
        }

        $start = microtime(true);

        $client = new Client();
        $promises = [];

        foreach ($urls as $url) {
            $promises[$url] = $client->getAsync($url, [
                'http_errors' => false,      
                'timeout' => 2,              
                'connect_timeout' => 1       
            ]);
        }

        $results = Utils::settle($promises)->wait();

        $successful = [];

        foreach ($results as $url => $result) {
            if (
                $result['state'] === 'fulfilled' &&
                $result['value']->getStatusCode() === 200
            ) {
                $successful[] = $url;
            }
        }

        $end = microtime(true);
        $duration = round($end - $start, 3); 

        return $successful[0];
    }
}