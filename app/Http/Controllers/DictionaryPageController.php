<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dictionary\DictionaryWordRequest;
use App\Models\DictionaryWord;

class DictionaryPageController extends Controller
{
    public function index() {
        $words = DictionaryWord::all();
        return view('dictionary.index', compact('words'));
    }

    public function store(DictionaryWordRequest $request) {
        $validated = $request->validated();

        $word = DictionaryWord::create($validated);

        $template = view('dictionary.word_template', compact('word'))->render();

        return response()->json(['template' => $template]);
    }

    public function update(DictionaryWordRequest $request, DictionaryWord $word) {
        $validated = $request->validated();
        $word->update($validated);

        $template = view('dictionary.word_template', compact('word'))->render();

        return response()->json(['template' => $template]);
    }

    public function destroy(DictionaryWord $word) {
        $word->delete();

        return response()->json(['success' => true]);
    }
}
