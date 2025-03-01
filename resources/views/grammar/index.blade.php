@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row mb-3">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">Грамматика</h1>
                    <p class="lead">I throw myself down among the tall grass by the trickling stream; and, as I lie
                        close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the
                        little world.</p>
                </div>
            </div>

            @auth
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-lg" href="{{ route('article.create') }}">Создать статью</a>
                    </div>
                </div>
            @endauth

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="list-group">
                        @foreach($articles as $article)
                            <a href="{{ route('article.show', $article->id) }}" class="list-group-item list-group-item-action">
                                {{ $article->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
