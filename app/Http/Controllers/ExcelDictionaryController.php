<?php

namespace App\Http\Controllers;

use App\Exports\DictionaryExport;
use App\Http\Requests\Dictionary\ExcelDictionaryRequest;
use App\Imports\DictionaryImport;
use App\Models\DictionaryWord;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Класс для загрузки слов для словаря из Excel-файла.
 *
 * Предоставляет метод для загрузки слов из файла.
*/
class ExcelDictionaryController extends Controller
{
    /**
     * Загрузка слов из Excel-файла.
     *
     * @param ExcelDictionaryRequest $request Запрос с загруженным excel-файлом.
     *
     * @return RedirectResponse Редирект на страницу словаря.
    */
    public function import(ExcelDictionaryRequest $request): RedirectResponse {
        Excel::import(new DictionaryImport, $request->file('excel_file'));

        return redirect()->route('dictionary');
    }

    /**
     * Выгрузка словаря в Excel-файле.
     *
     * @return BinaryFileResponse Скачивание сформированного файла
    */
    public function export(): BinaryFileResponse {
        $words = DictionaryWord::all();

        return Excel::download(new DictionaryExport($words), 'dictionary.xlsx');
    }
}
