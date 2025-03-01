@extends('layouts.html_template')

@section('content')
    <div class="py-4">
        <div class="container">
            <!-- Категория статьи -->
            <div class="row">
                <div class="col-md-12">
                    <span class="badge bg-primary">{{ $article->category->name }}</span>
                </div>
            </div>

            <!-- Заголовок статьи и кнопки -->
            <div class="row mt-3 align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4">{{ $article->title }}</h1>
                </div>
                <div class="col-md-4 text-end">
                    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('article.edit', $article->id) }}'">
                        Изменить
                    </button>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_article_modal">
                        Удалить
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="delete_article_modal" tabindex="-1" aria-labelledby="delete_article_modal_label">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="dictionary_modal_label">Удаление статьи</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Вы уверены, что хотите удалить статью?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                                    <form action="{{ route('article.destroy', $article->id) }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" id="add_word_btn" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($article->cover_path)
                <!-- Обложка статьи -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <img src="{{ asset($article->cover_path) }}" alt="Обложка статьи" class="img-fluid rounded">
                    </div>
                </div>
            @endif

            <!-- Контент статьи -->
            <div class="row mt-4">
                <div class="col-md-12">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
