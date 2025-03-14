<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\ArticleRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Класс для работы со статьями.
 *
 * Предоставляет методы для отображения, создания, редактирования и удаления статей.
*/
class ArticleController extends Controller
{
    /**
     * Конструктор класса.
     *
     * @param ArticleService $service Сервис для работы со статьями
    */
    public function __construct(private readonly ArticleService $service) {}

    /**
     * Отображение конкретной статьи.
     *
     * @param Article $article Статья, для которой необходимо отобразить страницу.
     *
     * @return View Представление с информацией о статье.
    */
    public function show(Article $article): View {
        $previous = $article->previousArticle();
        $next = $article->nextArticle();
        return view('article.index', compact('article', 'previous', 'next'));
    }

    /**
     * Отображение страницы создания новой статьи.
     *
     * @return View Представление страницы создания новой статьи.
    */
    public function create(): View {
        $categories = ArticleCategory::all();
        $is_edit_page = false;

        return view('article.article_form', compact('categories', 'is_edit_page'));
    }

    /**
     * Создание новой статьи.
     *
     * @param ArticleRequest $request Запрос с информацией для создания новой статьи.
     *
     * @return JsonResponse Ответ, содержащий ссылку для редиректа после создания статьи.
    */
    public function store(ArticleRequest $request): JsonResponse {
        $validated = $request->validated();

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
        }

        $redirect_href = $this->service->storeNewArticle($validated, $file);

        return response()->json(['href' => $redirect_href]);
    }

    /**
     * Отображение страницы для редактирования конкретной статьи.
     *
     * @param Article $article Статья, для которой нужно отобразить страницу редактирования.
     *
     * @return View Представление страницы для редактирования статьи.
    */
    public function edit(Article $article): View {
        $is_edit_page = true;

        return view('article.article_form', compact('article', 'is_edit_page'));
    }

    /**
     * Обновление информации о статье.
     *
     * @param ArticleUpdateRequest $request Запрос с информацией, которую необходимо обновить.
     * @param Article $article Статья, которую необходимо обновить.
     *
     * @return JsonResponse Ответ, содержащий информацию об успешном обновлении.
    */
    public function update(ArticleUpdateRequest $request, Article $article): JsonResponse {
        $validated = $request->validated();

        $file = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
        }

        $this->service->updateArticle($article, $validated, $file);

        return response()->json(['success' => true]);
    }

    /**
     * Удаление статьи.
     *
     * @param Article $article Статья, которую необходимо удалить.
     *
     * @return RedirectResponse Редирект на страницу переводов или грамматики, в зависимости от типа удаленной статьи.
    */
    public function destroy(Article $article): RedirectResponse {
        $redirect_href = $this->service->deleteArticle($article);

        return redirect()->route($redirect_href);
    }
}
