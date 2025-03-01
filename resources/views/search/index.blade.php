@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1>Результаты поиска</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="container">
            <p>
                @if($found_articles->count() > 0)
                    По запросу "{{ $query }}" найдено:
                @else
                    По запросу "{{ $query }}" ничего найдено.
                @endif
            </p>

            <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer" }'>
                <div class="grid-sizer"></div>
                @foreach($found_articles as $article)
                    @include('article.article_card_template')
                @endforeach
            </div>
        </div>
    </div>
@endsection
