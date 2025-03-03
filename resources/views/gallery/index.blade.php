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
                                            <input type="text" name="translation" id="translationInput"
                                                   class="form-control">
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
                                <div class="row">
                                    <div class="col-10">
                                        <p id="modalTranslation"></p>
                                    </div>
                                    @auth
                                        <div class="col-2">
                                            <svg id="editIcon" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                 fill="currentColor" class="bi bi-pencil ml-2" viewBox="0 0 16 16"
                                                 style="cursor: pointer;">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.5-.5V9h-.5a.5.5 0 0 1-.5-.5v-.207l.106-.106z"/>
                                            </svg>
                                            <svg id="saveIcon" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                                 fill="currentColor" class="bi bi-check ml-2" viewBox="0 0 16 16"
                                                 style="cursor: pointer; display: none;">
                                                <path
                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                            </svg>
                                        </div>
                                    @endauth
                                </div>
                                <textarea id="editTranslation" class="form-control mt-2"
                                          style="display: none;"></textarea>
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
