@extends('layouts.html_template')

@section('content')
    <div class="py-4">
        <div class="container">
            <!-- Категория статьи -->
            <div class="row">
                <div class="col-md-12">
                    <span class="badge bg-primary">
                        <a href="
                        @if($article->category->name == 'Грамматика')
                            {{ route('grammar') }}
                        @else
                            {{ route('translates') }}
                        @endif
                        " class="text-white underline text-decoration-none">
                            {{ $article->category->name }}
                        </a>
                    </span>
                </div>
            </div>

            <!-- Заголовок статьи и кнопки -->
            <div class="row mt-3 align-items-center">
                <div class="col-md-8">
                    <small class="text-muted">
                        {{ $article->created_at->format('d.m.Y') }}
                    </small>
                    <h1 class="display-4">{{ $article->title }}</h1>
                </div>

                @auth
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
                @endauth
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
                <div class="col-md-12 ql-editor">
                    {!! $article->content !!}
                </div>
            </div>

            <div class="container mt-4">
                <div class="d-flex justify-content-between">
                    @if($previous)
                        <a href="{{ route('article.show', $previous->id) }}" class="btn btn-light">
                            <!-- SVG иконка для стрелки влево -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                            </svg>
                            <span class="d-none d-md-inline">Предыдущая статья:</span> {{ $previous->title }}
                        </a>
                    @else
                        <span class="btn btn-secondary disabled">
                <!-- SVG иконка для стрелки влево -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                Предыдущая статья
            </span>
                    @endif

                    @if($next)
                        <a href="{{ route('article.show', $next->id) }}" class="btn btn-light">
                            <span class="d-none d-md-inline">Следующая статья:</span> {{ $next->title }}
                            <!-- SVG иконка для стрелки вправо -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg>
                        </a>
                    @else
                        <span class="btn btn-secondary disabled">
                Следующая статья
                            <!-- SVG иконка для стрелки вправо -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                </svg>
            </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
