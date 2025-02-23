<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DictionaryPageController extends Controller
{
    public function index() {
        return view('dictionary.index');
    }
}
