<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TranslatesPageController extends Controller
{
    public function index() {
        $articles = Article::whereHas('category', function($query) {
            $query->where('name', 'Перевод');
        })->orderBy('created_at', 'desc')->paginate(12);

        return view('translates.index', compact('articles'));
    }
}
