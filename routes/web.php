<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DictionaryPageController;
use App\Http\Controllers\GalleryPageController;
use App\Http\Controllers\GrammarPageController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\TranslatesPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index'])->name('main');

Route::get('/translates', [TranslatesPageController::class, 'index'])->name('translates');

Route::get('/grammar', [GrammarPageController::class, 'index'])->name('grammar');

Route::get('/dictionary', [DictionaryPageController::class, 'index'])->name('dictionary');
Route::post('/dictionary', [DictionaryPageController::class, 'store'])->name('dictionary.store');
Route::post('/dictionary/{word}', [DictionaryPageController::class, 'update'])->name('dictionary.update');
Route::delete('/dictionary/{word}', [DictionaryPageController::class, 'destroy'])->name('dictionary.destroy');

Route::get('/gallery', [GalleryPageController::class, 'index'])->name('gallery');

Route::get('/create_article', [ArticleController::class, 'create'])->name('article.create');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

require __DIR__.'/auth.php';
