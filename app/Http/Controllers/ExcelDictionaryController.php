<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dictionary\ExcelDictionaryRequest;
use App\Imports\DictionaryImport;
use Illuminate\Http\RedirectResponse;
use Maatwebsite\Excel\Facades\Excel;

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
    public function store(ExcelDictionaryRequest $request): RedirectResponse {
        Excel::import(new DictionaryImport, $request->file('excel_file'));

        return redirect()->route('dictionary');
    }
}
