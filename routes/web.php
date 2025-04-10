<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\SearchHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});


Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'create'])->name('register');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');

    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');

    Route::get('forgot-password', function () {
        return view('user.forgot-password');
    })->name('password.request');

    Route::post('forgot-password', [UserController::class, 'sendResetLinkEmail'])->name('password.email')->middleware('throttle:3,1');

    Route::get('reset-password/{token}', function (Request $request, string $token) {
        return view('user.reset-password', [
            'token' => $token,
            'email' => $request->input('email')
        ]);
    })->name('password.reset');

    Route::post('reset-password', [UserController::class, 'resetPassword'])->name('password.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/verify-email', function () {
        return view('user.verify-email');
    })->name('verification.notice');
    
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect()->route('dashboard');
    })->middleware('signed')->name('verification.verify');
    
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Ссылка для подтверждения отправлена!');
    })->middleware('throttle:3,1')->name('verification.send');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/save-search-history', [SearchHistoryController::class, 'store']);
    Route::get('/search-history-data', [SearchHistoryController::class, 'getData']);
});


