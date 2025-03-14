<?php

namespace App\Http\Controllers;

use App\Models\Article;

/**
 * Класс для отображения главной страницы.
*/
class MainPageController extends Controller
{
    /**
     * Отображение главной страницы со статьями по грамматике и с последними переводными статьями.
    */
    public function index() {
        $grammar_articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Грамматика');
        })
            ->orderBy('created_at')
            ->get();

        $translate_articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Перевод');
        })
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('main_page.index', compact('grammar_articles', 'translate_articles'));
    }
}
