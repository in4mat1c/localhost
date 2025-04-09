@extends('layouts.main')

@section('title', 'Вход')

@section('content')
    <h1 class="h2">Забыли пароль?</h1>
    <p class="lead">Введите адрес электронной почты, чтобы получить ссылку для восстановления пароля.</p>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input 
                name="email" 
                type="email" 
                class="form-control 
                @error('email') is-invalid @enderror" 
                id="email" 
                placeholder="name@example.com"
                value="{{ old('email') }}"
            >
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Отправить ссылку для восстановления</button>
    </form>
@endsection
