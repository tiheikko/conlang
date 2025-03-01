<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css"
          type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
    />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
<div class="wrapper">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar7">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar7">
                <a class="navbar-brand text-primary d-none d-md-block" href="#">
                    <i class="fa d-inline fa-lg fa-stop-circle-o"></i>
                    <b> BRAND</b>
                </a>
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link {{ Route::is('main') ? 'active' : '' }}" href="{{ route('main') }}">Главная</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('translates') ? 'active' : '' }}" href="{{ route('translates') }}">Переводы</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('grammar') ? 'active' : '' }}" href="{{ route('grammar') }}">Грамматика</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('dictionary') ? 'active' : '' }}" href="{{ route('dictionary') }}">Словарь</a></li>
                    <li class="nav-item"><a class="nav-link {{ Route::is('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Галерея</a></li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
        @include('layouts.notification')
    </div>

    <footer class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="lead text-center">2025 Lorem ipsum dolores tratata</p>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
@include('plugins.packages_initializations')
</body>
</html>
