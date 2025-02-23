<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
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
        return view('article.article_form', compact('categories'));
    }

    public function store(ArticleRequest $request) {
        $validated = $request->validated();
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $folder_path = public_path('images/translates');
            if (!file_exists($folder_path)) {
                mkdir($folder_path, 0777, true);
            }

            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->move($folder_path, $filename);
            $validated['cover_path'] = 'images/translates/' . $filename;
        }

        unset($validated['file']);

        $new_article = Article::create($validated);

        if ($new_article->category->name == 'Грамматика') {
            $href = route('grammar');
        } else {
            $href = route('translates');
        }

        return response()->json(['href' => $href]);
    }
}
