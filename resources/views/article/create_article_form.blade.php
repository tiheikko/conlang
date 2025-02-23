@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">Создание статьи</h1>
                    <p class="lead">I throw myself down among the tall grass by the trickling stream; and, as I lie
                        close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the
                        little world.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form class="">
                        <div class="form-group mb-3">
                            <label>Категория</label>
                            <select class="form-select" id="category_select" aria-label="Default select example">
                                <option selected>Выбрать категорию</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Заголовок</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group mb-3" id="cover_form" style="display: none">
                            <label>Обложка</label>
                            <input type="file" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group mb-3">
                            <label>Контент<br></label>
                            <div id="toolbar-container">
                                <span class="ql-formats">
                                    <select class="ql-font"></select>
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
                                    <button class="ql-code-block"></button>
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
                                    <button class="ql-video"></button>
                                    <button class="ql-formula"></button>
                                </span>
                                <span class="ql-formats">
                                    <button class="ql-clean"></button>
                                </span>
                            </div>
                            <div id="text_editor"></div>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let category_select = document.getElementById('category_select');
        let cover_form = document.getElementById('cover_form');

        category_select.addEventListener('change', function(event) {
            let text = event.target.options[event.target.selectedIndex].textContent.trim();
            if (text == 'Перевод') {
                cover_form.style.display = 'block';
            } else {
                cover_form.style.display = 'none';
            }
        });
    </script>
@endsection
