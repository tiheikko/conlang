<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Класс для отображения страницы с грамматическими статьями.
*/
class GrammarPageController extends Controller
{
    /**
     * Отображение страницы со статьями по грамматике.
     *
     * @return View Преставление страницы с грамматикой.
    */
    public function index(): View {
        $articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Грамматика');
        })->orderBy('created_at')->get();

        return view('grammar.index', compact('articles'));
    }
}
