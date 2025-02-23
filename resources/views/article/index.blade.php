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

            <!-- Заголовок статьи -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <h1 class="display-4">{{ $article->title }}</h1>
                </div>
            </div>

            @if($article->cover_path)
                <!-- Обложка статьи -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <img src="https://static.pingendo.com/cover-bubble-dark.svg" alt="Обложка статьи" class="img-fluid rounded">
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
