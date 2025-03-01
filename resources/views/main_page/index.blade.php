@extends('layouts.html_template')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="">Грамматика</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="list-group">
                        @foreach($grammar_articles as $article)
                            <a href="{{ route('article.show', $article->id) }}"
                               class="list-group-item list-group-item-action">
                                {{ $article->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="">Последние переводы</h1>
                </div>
            </div>

            <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer" }'>
                <div class="grid-sizer"></div>
                @foreach($translate_articles as $article)
                    @include('article.article_card_template')
                @endforeach
            </div>

        </div>
    </div>
@endsection

