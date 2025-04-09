@extends('layouts.main')

@section('title', 'Вход')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="rounded-5 p-3 shadow-lg">
                <h1 class="h2 text-center mt-3 mb-4">Войти в аккаунт</h1>
                <form action="{{ route('login.auth') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль:</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="*********">
                    </div>

                    <div class="mb-3 form-check">
                        <input name='remember' class="form-check-input" type="checkbox" id="checkDefault">
                        <label class="form-check-label" for="remeber">
                            Запомнить меня?
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </div>
                    
                    <div class="text-center mt-3">
                        <a href="{{ route('password.request') }}" class="ms-2 btn btn-link">Забыли пароль?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
