@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">Галерея</h1>
                </div>
            </div>

            @auth
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Загрузить изображение
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Загрузка картинки</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Изображение</label>
                                            <input type="file" class="form-control" name="file">
                                            <label for="translationInput" class="form-label">Перевод</label>
                                            <input type="text" name="translation" id="translationInput" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть
                                        </button>
                                        <button type="submit" class="btn btn-primary">Загрузить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer" }'>
                <div class="grid-sizer"></div>
                @foreach($images as $image)
                    <div class="grid-item">
                        <div class="card text-center text-decoration-none">
                            <img class="card-img-top" src="{{ asset($image->image_path) }}" alt="Card image cap"
                                 data-bs-toggle="modal" data-bs-target="#imageModal"
                                 onclick="openModal('{{ asset($image->image_path) }}', '{{ $image->id }}', '{{ $image->translation }}', '{{ $image->created_at->format('d.m.Y') }}')">
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Модальное окно -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel">Просмотр изображения</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img id="modalImage" src="" alt="Modal Image" class="img-fluid">
                            <div class="text-left mt-2">
                                <p><b>Перевод: </b></p>
                                <p id="modalTranslation"></p>
                                <small class="text-muted" id="modalCreatedAt"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            @auth
                                <button type="button" class="btn btn-danger" id="deleteImageButton">Удалить</button>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            {{ $images->links('pagination::bootstrap-5') }}
        </div>
    </div>
    @include('plugins.gallery_plugin')
@endsection
