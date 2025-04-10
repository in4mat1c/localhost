<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SearchHistoryController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            UserHistory::create([
                'user_id' => $user->id,
                'history' => $request->input('query'),
            ]);

            return response()->json(['message' => 'Search history saved successfully.']);
        }

        return response()->json(['error' => 'User not authenticated'], 401);
    }

    public function getData() {
        $history = UserHistory::where('user_id', auth()->id())->get(); 
        return $history;
    }
}