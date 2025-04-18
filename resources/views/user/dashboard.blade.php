@extends('layouts.main')

@section('title', 'Рабочая зона')

@section('container_class', 'container-fluid')
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-12 col-lg-2 order-2 order-lg-1">
                <div class="vh-100 shadow-lg p-3 rounded-4 d-flex flex-column">
                    <span class="text-center mb-3 fw-bold">История поиска</span>
                    <div class="overflow-auto flex-grow-1">
                        <a
                            v-for="(item, index) in history"
                            :key="index"
                            href="#"
                            class="text-decoration-none text-dark mb-2 d-block"
                        >
                            <primary-history-card :text="item.history" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-10 order-1 order-lg-2">
                <div class="d-flex justify-content-center align-items-center ">
                    <div class="d-flex flex-column gap-3 justify-content-center align-items-center w-100">
                        <search @search="updateCards" />
                    </div>
                </div>
                <div class="d-flex flex-column mt-5 mx-5 shadow-lg p-2 rounded-4" v-if="cards.length">
                    <primary-card-container v-for="(card, index) in cards" :key="index"
                        :service_name="card.service_name"
                        :service_image="card.service_image"
                        :cards="card.data"
                    ></primary-card-container>
                </div>
            </div>
        </div> 
    </div>
@endsection
