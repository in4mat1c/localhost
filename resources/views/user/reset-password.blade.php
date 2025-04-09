@extends('layouts.main')

@section('title', 'Восстановление пароля')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="rounded-5 p-3 shadow-lg">
                <h1 class="h2 text-center mt-3 mb-4">Восстановление пароля</h1>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email', $email) }}" readonly>
                        @error('email')
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
                        <label for="password_confirmation" class="form-label">Подтвердите пароль:</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="*********">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Изменить пароль</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
@endsection
