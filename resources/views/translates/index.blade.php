@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">Переводы</h1>
                </div>
            </div>
            @auth
                <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-lg" href="{{ route('article.create') }}">Создать статью</a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    <div class="py-2">
        <div class="container">

            <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer" }'>
                <div class="grid-sizer"></div>
                @foreach($articles as $article)
                    @include('article.article_card_template')
                @endforeach
            </div>

        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{ $articles->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
