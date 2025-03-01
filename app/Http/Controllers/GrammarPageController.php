<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class GrammarPageController extends Controller
{
    public function index() {
        $articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Грамматика');
        })->orderBy('created_at')->get();

        return view('grammar.index', compact('articles'));
    }
}
