<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RandomCardController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\QrCodeController;



Route::get('home', function () {
    return view('card.home');
});

// ruta para las card all
Route::get('/cards', [CardController::class, 'publicIndex'])->name('cards.public');
// ruta para las card view
Route::get('card/{id}/view', [CardController::class, 'view'])->name('card.view');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/cards/random', [RandomCardController::class, 'showRandomCards'])->name('card.random');

Route::middleware(['auth'])->group(function () {
    Route::post('/cards/{card}/click', [ClickController::class, 'clickOnCard'])->name('card.click');
    Route::view('/click-success', 'card.click_success')->name('card.click_success');
});
Route::get('/card/download/{id}', [CardController::class, 'download'])->name('card.download');
Route::resource('card', CardController::class);
//::::::::::::::::::::::::::::::::::::codigo qr:::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/card/{id}', [CardController::class, 'view'])->name('card.view');
Route::get('/qr/{id}', [CardController::class, 'showQr'])->name('qr.show');
//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
Route::get('/register', [RegisterController::class,"show"]);
Route::post('/register', [RegisterController::class, "register"]);
Route::get('/login', [LoginController::class,"show"]);
Route::post('/login', [LoginController::class, "login"]);
Route::get('/dashboard', [DashBoardController::class, 'index'])->name('dashboard');
Route::get('/logout', [LogoutController::class,"logout"]);
