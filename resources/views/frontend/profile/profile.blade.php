@extends('frontend.layout.app')
@section('title','الملف الشخصي')
@section('content')
    <main class="container profile">
        <article>
            <h1 class="title-h2 h4 position-relative pb-3 font-weight-bold"> الملف الشخصي</h1>
            <div class="row mt-4">
                <div class="col-lg-5">
                    <div class="card p-2 border-light rounded-lg shadow-sm ">
                        <div class="clearfix">
                            <img width="105" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/img-per.png') }}" alt="">
                            <div class="float-left mt-4 px-2">
                                <p class="font-weight-bold mb-1">أحمد أبو أدهم</p>
                                <p class="font-weight-bold mb-1">ahmed.abuadham@mail.com</p>
                                <p><img width="11" src="{{ asset('front_end/images/blood.png') }}" alt=""> فصيلة الدم <span class="text-primary font-weight-bold ml-2">+AB</span></p>
                            </div>
                            <a href="#" class="float-right"><img width="39" class="mt-4-5" src="{{ asset('front_end/images/edit.png') }}" alt=""> </a>
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/user.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">معلوماتي</p>
                            </a>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/dashboard.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">إعلاناتي</p>
                            </a>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/favorite.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">المفضلة</p>
                            </a>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/blood-drop.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">فصيلة الدم</p>
                            </a>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/privacy.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">سياسة الخصوصية</p>
                            </a>
                        </div>
                        <div class="col-4 mt-4">
                            <a href="#" class="d-block box-o h-100 p-2 py-4 rounded-lg shadow-sm border border-light text-center">
                                <img height="60" src="{{ asset('front_end/images/terms.png') }}" alt="">
                                <p class="card-footer text-black px-0 mt-2 mb-0 bg-transparent border-0">شروط الإستخدام</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 d-lg-block d-none align-self-center">
                    <img class="img-fluid rounded-xl" src="{{ asset('front_end/images/img-10.png') }}" alt="">
                </div>
            </div>
        </article>
    </main>
    @endsection

