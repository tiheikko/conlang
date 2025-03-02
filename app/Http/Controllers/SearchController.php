<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Models\Article;
use Illuminate\View\View;

/**
 * Класс для отображения страницы с результатами поиска по переводным статьям.
*/
class SearchController extends Controller
{
    /**
     * Отображение страницы с результатами поиска.
     *
     * @param SearchRequest $request Поисковой запрос
     *
     * @return View Представление со страницей с результатами поиска.
    */
    public function search(SearchRequest $request): View {
        $query = $request->validated()['query'];

        $found_articles = Article::whereHas('category', function ($q) {
            $q->where('name', 'Перевод');
        })
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'ilike', '%' . $query . '%');
            }, function ($q) {
                $q->orderBy('created_at', 'desc');
            })
            ->get();

        return view('search.index', compact('found_articles', 'query'));
    }
}
