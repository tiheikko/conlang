<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Класс для отображения страницы с переводными статьями.
 */
class TranslatesPageController extends Controller
{
    /**
     * Отображение страницы со статьями по переводам.
     *
     * @return View Преставление страницы с переводами.
     */
    public function index(): View {
        $articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Перевод');
        })->orderBy('created_at', 'desc')->paginate(12);

        return view('translates.index', compact('articles'));
    }
}
