@extends('layouts.main')

@section('title', 'Подтверждение почты')

@section('content')
    <div class="alert alert-info" role="alert">
        Спасибо за регистрацию! Пожалуйста, проверьте свою электронную почту и перейдите по ссылке для подтверждения.
    </div>
    <div>
        Если вы не получили письмо, повторите попытку отправить его, нажав на кнопку ниже.
        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link ps-0">Отправить повторно</button>
        </form>
    </div>
@endsection
