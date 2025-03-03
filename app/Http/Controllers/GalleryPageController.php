<?php

namespace App\Http\Controllers;

use App\Http\Requests\Gallery\GalleryImageRequest;
use App\Http\Requests\Gallery\GalleryImageUpdateRequest;
use App\Models\GalleryImage;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Класс для работы со страницей галереи.
 *
 * Предоставляет методы для отображения галереи, загрузки картинок и их удаления.
*/
class GalleryPageController extends Controller
{
    /**
     * Конструктор класса.
     *
     * @param FileService $file_service Сервис для работы с файлами.
    */
    public function __construct(private readonly FileService $file_service) {}

    /**
     * Отображение галереи.
     *
     * @return View Представление галереи.
    */
    public function index(): View {
        $images = GalleryImage::orderBy('created_at', 'desc')->paginate(30);

        return view('gallery.index', compact('images'));
    }

    /**
     * Загрузка картинки.
     *
     * @param GalleryImageRequest $request Запрос, содержащий картинку для загрузки.
     *
     * @return RedirectResponse Редирект на страницу галереи.
     */
    public function store(GalleryImageRequest $request): RedirectResponse {
        $image_path = $this->file_service->uploadFile('images/gallery', $request->file('file'));

        GalleryImage::create([
            'image_path' => $image_path,
            'translation' => $request->translation
        ]);

        return redirect()->route('gallery');
    }

    /**
     * Обновление перевода картинки.
     *
     * @param GalleryImage $image Картинка, которую нужно обновить.
     *
     * @return JsonResponse Ответ об успешном обновлении перевода картинки.
     */
    public function updateTranslate(GalleryImage $image, GalleryImageUpdateRequest $request): JsonResponse {
        $image->update($request->validated());

        return response()->json(['success' => true]);
    }

    /**
     * Удаление картинки.
     *
     * @param GalleryImage $image Картинка, которую нужно удалить.
     *
     * @return JsonResponse Ответ об успешном удалении картинки.
     */
    public function destroy(GalleryImage $image): JsonResponse {
        $this->file_service->deleteFile(public_path($image->image_path));

        $image->delete();

        return response()->json(['success' => true]);
    }
}
