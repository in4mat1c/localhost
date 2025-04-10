<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DNSService {
    public function getData($searchText) {
        $data = [];
        $encodedText = urlencode($searchText);

        $url = "https://www.dns-shop.kz/search/?q={$encodedText};"
    }
}