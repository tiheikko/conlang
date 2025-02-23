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
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            The current link item
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">A second link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A third link item</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a href="#" class="list-group-item list-group-item-action" tabindex="-1" aria-disabled="true">A
                            disabled link item</a>
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
            <div class="row">
                @for($i = 0; $i < 12; $i++)
                    @include('article.article_card_template')
                @endfor
            </div>
        </div>
    </div>
@endsection

