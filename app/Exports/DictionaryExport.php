<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Класс для формирования файла словаря для скачивания
*/
class DictionaryExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @var Collection $words Коллекция слов, по которым будет сформирован файл
    */
    protected Collection $words;

    /**
     * Конструктор класса
     *
     * @param Collection $words Все слова из словаря
    */
    public function __construct(Collection $words) {
        $this->words = $words;
    }

    /**
     * Возвращает сформированные строки файла.
     *
     * @return \Illuminate\Support\Collection Коллекция с сформированными строками файла.
    */
    public function collection(): \Illuminate\Support\Collection
    {
        $rows = [];

        // проход по каждому слову и возврат в формате "слово - значение"
        foreach ($this->words as $word) {
            $rows[] = [
                $word->word,
                $word->definition,
            ];
        }

        return collect($rows);
    }

    /**
     * Заголовки файла.
     *
     * @return array Заголовки файла
    */
    public function headings(): array
    {
        return [
            'Слово',
            'Значение'
        ];
    }

    /**
     * Объединение всех строк в единый файл
     *
     * @return array Строки файла
    */
    public function map($row): array
    {
        return $row;
    }
}
