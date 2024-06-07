<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UrlController::class, 'index'])->name('urls.index');
Route::get('/create', [UrlController::class, 'create'])->name('urls.create');
Route::post('/shorten', [UrlController::class, 'storeUrlMap'])->name('urls.shorten');
Route::get('d/{shortUrl}', [UrlController::class, 'redirectToLongUrl'])->name('urls.redirect');

Route::fallback(function () {
    abort(404, 'Invalid url');
});

