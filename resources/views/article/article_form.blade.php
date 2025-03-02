@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">
                        @if($is_edit_page)
                            Редактирование статьи
                        @else
                            Создание статьи
                        @endif
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form id="article_form" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            @if($is_edit_page)
                                <p><b>Категория:</b> {{ $article->category->name }}</p>
                            @else
                                <label>Категория</label>
                                <select class="form-select" name="article_category_id" id="category_select" aria-label="Default select example">
                                    <option selected>Выбрать категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label>Заголовок</label>
                            <input type="text" class="form-control" name="title"
                                   placeholder="Заголовок" @if($is_edit_page) value="{{ $article->title }}" @endif>
                        </div>

                        @if(!$is_edit_page || ($is_edit_page && $article->category->name == 'Перевод'))
                            <div class="form-group mb-3" id="cover_form"
                                 @if(!$is_edit_page) style="display: none" @endif>
                                <label>Обложка</label>
                                <input type="file" name="file" class="form-control">
                            </div>
                        @endif

                        <div class="form-group mb-3">
                            <label>Контент<br></label>
                            <div id="toolbar-container">
                                <span class="ql-formats">
                                    <select class="ql-size"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-strike"></button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color"></select>
                                    <select class="ql-background"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-script" value="sub"></button>
                                    <button class="ql-script" value="super"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-header" value="1"></button>
                                    <button class="ql-header" value="2"></button>
                                    <button class="ql-blockquote"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-indent" value="-1"></button>
                                    <button class="ql-indent" value="+1"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-direction" value="rtl"></button>
                                    <select class="ql-align"></select>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                    <button class="ql-formula"></button>
                                </span>
                            </div>
                            <div id="text_editor">
                                @if($is_edit_page)
                                    {!! $article->content !!}
                                @endif
                            </div>
                        </div>

                        <button type="button" id="article_btn" class="btn btn-primary mb-3"
                        data-what-to-do="{{ $is_edit_page ? 'edit' : 'create' }}">
                            @if($is_edit_page)
                                Сохранить
                            @else
                                Создать
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('plugins.article_plugin')
@endsection
