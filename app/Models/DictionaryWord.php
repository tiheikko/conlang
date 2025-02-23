<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DictionaryWord extends Model
{
    protected $table = 'dictionary_words';

    protected $fillable = [
        'word',
        'definition'
    ];
}
