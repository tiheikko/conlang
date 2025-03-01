<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class ArticleService
{
    public function __construct(private readonly FileService $file_service) {}

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
