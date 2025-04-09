@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="rounded-5 p-3 shadow-lg">
                <h1 class="h2 text-center mt-3 mb-4">Регистрация</h1>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Имя:</label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Артур" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль:</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="*********">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Повторите пароль:</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="*********">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('login') }}">Уже есть аккаунт?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
