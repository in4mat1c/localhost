<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\KaspiService;
use App\Services\WildberriesService;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $query = $request->get('q');
        $kaspi = new KaspiService();
        $wildberries = new WildberriesService();

        $kaspiData = $kaspi->getData($query);
        $wildberriesData = $wildberries->getData($query);

        $data = [$kaspiData, $wildberriesData];
        
        return response()->json(['cards' => $data]);
    }
}
