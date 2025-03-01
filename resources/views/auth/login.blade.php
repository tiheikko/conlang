@extends('layouts.html_template')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <div class="py-5 h-100 auth_form" style="background-image: url({{ asset('images/login_bg.jpg') }});">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="mx-auto col-md-6 col-10 bg-white p-5">
                        <h2 class="mb-4 text-center">Авторизация</h2>
                        <div>
                            <!-- Поле для логина -->
                            <div class="form-group mb-3">
                                <label for="login_input" class="form-label fw-bold">Логин</label>
                                <input type="text" class="form-control" name="login" placeholder="Введите логин"
                                       id="login_input">
                            </div>

                            <!-- Поле для пароля -->
                            <div class="form-group mb-4">
                                <label for="password_input" class="form-label fw-bold">Пароль</label>
                                <input type="password" class="form-control" name="password" placeholder="Введите пароль"
                                       id="password_input">
                            </div>

                            <!-- Чекбокс "Запомнить меня" -->
                            <div class="form-group mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                                    <label class="form-check-label fw-bold" for="rememberMe">Запомнить меня</label>
                                </div>
                            </div>

                            <!-- Кнопка отправки -->
                            <button type="submit" class="btn btn-primary w-100 mb-3">Войти</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
