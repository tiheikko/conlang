<?php

namespace App\Imports;

use App\Models\DictionaryWord;
use Maatwebsite\Excel\Concerns\ToModel;

class DictionaryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // если нет слова или значения, то запись в бд не создается
        if (is_null($row[0]) || is_null($row[1])) return null;

        return new DictionaryWord([
            'word' => $row[0],
            'definition' => $row[1],
        ]);
    }
}
