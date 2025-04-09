@extends('layouts.main')

@section('title', 'Вход')

@section('container_class', 'container-fluid')
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-2">
                <div class='shadow-lg p-3 rounded-4 d-flex flex-column'>
                    <span class="d-block text-center mb-3 fw-bold">История поиска</span>
                    <a href="#" class="text-decoration-none text-dark mb-2">
                        <div class="card rounded-4">
                            <div class="card-body">
                                Iphone 14 Pro Max 128GB Deep Purple
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-10">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <search />
                    </div>
                </div>
    
                <div class="d-flex flex-column mt-5 mx-5 shadow-lg p-2 rounded-4">
                    <div class="card-container">
                        <div class="text-center my-3 d-flex justify-content-center align-items-center gap-2">
                            <img src="public/images/logos/kaspi.png" alt="kaspi" style="width: 20px; height: 20px;">
                            <span class="fw-bold">Kaspi KZ</span>
                        </div>
                        <div class="d-flex flex-row align-items-center overflow-auto gap-3" style="flex-wrap: nowrap; white-space: nowrap;">
                            <primary-card 
                                imageUrl="{{ asset('images/section1.png') }}" 
                                title="'Iphone 15 Pro Max'" 
                                price="21000" 
                                storeUrl="http://google.com" 
                            ></primary-card>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn btn-danger">Открыть в магазине</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-container">
                        <div class="text-center my-3 d-flex justify-content-center align-items-center gap-2">
                            <img src="public/images/logos/wildberries.png" alt="wildberries" style="width: 20px; height: 20px;">
                            <span class="fw-bold">WildBerries</span>
                        </div>
                        <div class="d-flex flex-row align-items-center overflow-auto gap-3" style="flex-wrap: nowrap; white-space: nowrap;">
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn" style="background-color: #6f42c1; color: white;">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn" style="background-color: #6f42c1; color: white;">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn" style="background-color: #6f42c1; color: white;">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn" style="background-color: #6f42c1; color: white;">Открыть в магазине</a>
                                </div>
                            </div>
                            <div class="card" style="width: 18rem; flex: 0 0 auto;">
                                <img src="public/images/section1.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Iphone 15 Pro Max</h5>
                                    <p class="card-text">19 000 T</p>
                                    <a href="#" class="btn" style="background-color: #6f42c1; color: white;">Открыть в магазине</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
