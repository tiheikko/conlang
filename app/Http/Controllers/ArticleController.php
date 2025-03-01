<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\ArticleService;

class ArticleController extends Controller
{
    public function __construct(private readonly ArticleService $service) {}

    public function show(Article $article) {
        return view('article.index', compact('article'));
    }

    public function create() {
        $categories = ArticleCategory::all();
        $is_edit_page = false;

        return view('article.article_form', compact('categories', 'is_edit_page'));
    }

    public function store(ArticleRequest $request) {
        $validated = $request->validated();

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
        }

        $redirect_href = $this->service->storeNewArticle($validated, $file);

        return response()->json(['href' => $redirect_href]);
    }

    public function edit(Article $article) {
        $is_edit_page = true;

        return view('article.article_form', compact('article', 'is_edit_page'));
    }

    public function update(ArticleUpdateRequest $request, Article $article) {
        $validated = $request->validated();

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
        }

        $this->service->updateArticle($article, $validated, $file);

        return response()->json(['success' => true]);
    }

    public function destroy(Article $article) {
        $redirect_href = $this->service->deleteArticle($article);

        return redirect()->route($redirect_href);
    }
}
