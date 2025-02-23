<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function show(Article $article) {
        return view('article.index', compact('article'));
    }

    public function create() {
        $categories = ArticleCategory::all();
        return view('article.create_article_form', compact('categories'));
    }
}
