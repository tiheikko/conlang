@extends('layouts.html_template')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="text-center mx-auto col-md-8">
                    <h1 class="mb-3">I enjoy with my whole heart</h1>
                    <p class="lead">I throw myself down among the tall grass by the trickling stream; and, as I lie
                        close to the earth, a thousand unknown plants are noticed by me: when I hear the buzz of the
                        little world.</p>
                </div>
            </div>
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
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Заголовок</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Изображение</label>
                                        <input type="file" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-1.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-2.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-3.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-4.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-3.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-4.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-1.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-2.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-2.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-1.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-4.svg"></div>
                <div class="col-lg-3 col-md-6 p-3"><img class="img-fluid d-block"
                                                        src="https://static.pingendo.com/img-placeholder-3.svg"></div>
            </div>
        </div>
    </div>
@endsection
