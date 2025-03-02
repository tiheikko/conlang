<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dictionary\DictionaryWordRequest;
use App\Models\DictionaryWord;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

/**
 * Класс для работы со словарем.
 *
 * Предоставляет методы для отображения страницы словаря, создания, редактирования и удаления слов.
*/
class DictionaryPageController extends Controller
{
    /**
     * Отображение страницы со словарем.
     *
     * @return View Представление страницы словаря.
    */
    public function index(): View {
        $words = DictionaryWord::all();

        return view('dictionary.index', compact('words'));
    }

    /**
     * Создание нового слова.
     *
     * @param DictionaryWordRequest $request Запрос, содержащий слово и определение для создания.
     *
     * @return JsonResponse Ответ с отрендеренным шаблоном нового слова.
    */
    public function store(DictionaryWordRequest $request): JsonResponse {
        $validated = $request->validated();

        $word = DictionaryWord::create($validated);

        $template = view('dictionary.word_template', compact('word'))->render();

        return response()->json(['template' => $template]);
    }

    /**
     * Обновление слова.
     *
     * @param DictionaryWordRequest $request Запрос, содержащий слово и определение для обновления.
     * @param DictionaryWord $word Слово, которое нужно обновить.
     *
     * @return JsonResponse Ответ с отрендеренным шаблоном обновленного слова.
     */
    public function update(DictionaryWordRequest $request, DictionaryWord $word): JsonResponse {
        $validated = $request->validated();
        $word->update($validated);

        $template = view('dictionary.word_template', compact('word'))->render();

        return response()->json(['template' => $template]);
    }

    /**
     * Обновление слова.
     *
     * @param DictionaryWord $word Слово, которое нужно удалить
     *
     * @return JsonResponse Ответ с информацией об успешном удалении слова.
     */
    public function destroy(DictionaryWord $word): JsonResponse {
        $word->delete();

        return response()->json(['success' => true]);
    }
}
