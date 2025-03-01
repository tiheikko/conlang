@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">Словарь</h1>
                </div>
            </div>

            @auth
                <div class="mt-3 mb-3">
                    <button type="button" class="btn btn-primary" id="create_new_word_btn" data-bs-toggle="modal"
                            data-bs-target="#dictionary_modal">
                        Создать новое слово
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="dictionary_modal" tabindex="-1"
                         aria-labelledby="dictionary_modal_label">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dictionary_modal_label">Добавление слова</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="word_definition_form">
                                        <div class="mb-3">
                                            <label for="word_input" class="form-label">Слово</label>
                                            <input type="text" class="form-control" id="word_input" name="word">
                                        </div>
                                        <div class="mb-3">
                                            <label for="definition_input" class="form-label">Значения</label>
                                            <textarea name="definition" class="form-control"
                                                      id="definition_input"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена
                                    </button>
                                    <button type="button" id="add_word_btn" class="btn btn-primary">Добавить</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth


            <div class="row">
                <div class="col-md-12">
                    <h3 class="">Слова</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Слово</th>
                                <th>Значения</th>
                                @auth
                                    <th>Изменить</th>
                                    <th>Удалить</th>
                                @endauth
                            </tr>
                            </thead>
                            <tbody id="dictionary_body">
                            @foreach($words as $word)
                                @include('dictionary.word_template')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('plugins.dictionary_plugin')
@endsection
