<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index() {
        $grammar_articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Грамматика');
        })->get();
        $translate_articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Перевод');
        })->limit(6)->get();

        return view('main_page.index', compact('grammar_articles', 'translate_articles'));
    }
}
