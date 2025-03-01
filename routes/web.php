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
Route::post('/gallery', [GalleryPageController::class, 'store'])->name('gallery.store');
Route::delete('/gallery/{image}', [GalleryPageController::class, 'destroy'])->name('gallery.destroy');

Route::get('/create_article', [ArticleController::class, 'create'])->name('article.create');
Route::post('/create_article', [ArticleController::class, 'store'])->name('article.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/articles/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

});

require __DIR__.'/auth.php';
