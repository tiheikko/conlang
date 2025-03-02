<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\UploadedFile;

/**
 * Сервис для работы со статьями.
 *
 * Предоставляет методы для создания, обновления и удаления статьи.
*/
class ArticleService
{
    /**
     * Конструктор класса.
     *
     * @param FileService $file_service Сервис для работы с файлами.
    */
    public function __construct(private readonly FileService $file_service) {}

    /**
     * Публикация новой статьи.
     *
     * @param array $validated Валидированные данные о статье.
     * @param UploadedFile|null $file Файл обложки, если загружен.
     *
     * @return string Название роута, куда необходимо переадресовать пользователя.
    */
    public function storeNewArticle(array $validated, ?UploadedFile $file = null): string {
        if ($file) {
            $cover_path = $this->file_service->uploadFile('images/translates', $file);
            $validated['cover_path'] = $cover_path;
        }

        unset($validated['file']);

        $new_article = Article::create($validated);

        if ($new_article->category->name == 'Грамматика') {
            $href = route('grammar');
        } else {
            $href = route('translates');
        }

        return $href;
    }

    /**
     * Обновление статьи.
     *
     * @param Article $article Статья, которую нужно обновить.
     * @param array $validated Валидированные данные о статье.
     * @param UploadedFile|null $file Файл обложки, если загружен.
     *
     * @return void
     */
    public function updateArticle(Article $article, array $validated, ?UploadedFile $file = null): void {
        if ($file) {
            $file_path_to_delete = public_path($article->cover_path);
            $this->file_service->deleteFile($file_path_to_delete);

            $cover_path = $this->file_service->uploadFile('images/translates', $file);
            $validated['cover_path'] = $cover_path;
        }

        unset($validated['file']);

        $article->update($validated);
    }

    /**
     * Удаление статьи.
     *
     * @param Article $article Статья, которую нужно удалить.
     *
     * @return string Название роута, куда необходимо переадресовать пользователя.
     */
    public function deleteArticle(Article $article): string {
        if ($article->cover_path) {
            $this->file_service->deleteFile(public_path($article->cover_path));
        }

        $article->delete();

        if ($article->category->name == 'Грамматика') {
            $href = 'grammar';
        } else {
            $href = 'translates';
        }

        return $href;
    }
}
