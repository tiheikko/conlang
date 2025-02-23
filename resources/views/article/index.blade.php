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
                    <a href="" class="btn btn-primary">Изменить</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту статью?')">Удалить</button>
                    </form>
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
