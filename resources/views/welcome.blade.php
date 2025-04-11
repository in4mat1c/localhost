@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')
    <div class="rounded-5 p-3 mt-3 shadow-lg">
        <div class="row flex-column flex-md-row">
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('public/images/section1.png') }}" alt="" class="img-fluid rounded-5 mobile-image">
            </div>
            <div class="col-md-9 text-start mt-2 d-flex flex-column justify-content-center">
                <p class="fw-bold title-font">PackCheck: Сравнивай и анализируй товары быстро</p>
                <p class="mt-3 description-font">Тут ты быстро сможешь найти 
                    <span class="fw-bold">товары с маркетплейсов</span> 
                    и быстро сравнить цены, не тратя на это кучу времени.</p>
                <ul class="list-group list-group-flush item-font">
                    <li class="main-item">✅ Быстрый поиск</li>
                    <li class="main-item">📅 Постоянное добавление магазинов и маркетплейсов</li>
                    <li class="main-item">📊 История поиска товаров</li>
                    <li class="main-item">🎯 Экономия времени</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="rounded-5 p-3 mt-3 shadow-lg">
        <div class="row flex-column flex-md-row">
            <div class="col-md-12 d-flex flex-column justify-content-center align-items-center">
                <span class="fs-3 d-block text-center mb-2 fw-bold">ПРОСТОЙ И УДОБНЫЙ ДИЗАЙН</span> 
                <img src="{{ asset('public/images/section2.png') }}" alt="" class="img-fluid rounded-5 mobile-image">
            </div>
        </div>
    </div>
    <div class="rounded-5 p-3 mt-3 shadow-lg">
        <div class="row flex-column flex-md-row justify-content-center align-items-center">
            <span class="fs-3 d-block text-center mb-2 fw-bold">ИНТЕГРАЦИИ</span> 
            <div class="rounded-3 mx-5 my-2 p-2" style="width: 6rem;">
                <img src="{{ asset('public/images/logos/kaspi.png') }}" class="card-img-top" alt="...">
                <h5 class="text-center d-block">Kaspi</h5>
            </div>
            <div class="rounded-3 mx-5 my-2 p-2" style="width: 6rem;">
                <img src="{{ asset('public/images/logos/wildberries.png') }}" class="card-img-top" alt="...">
                <h5 class="text-center d-block">Wildberries</h5>
            </div>
        </div>
    </div>
@endsection
