@extends('frontend.layout.app')
@section('title','إعادة تعيين كلمة المرور')
@section('content')
    <section class="login bg-primary mt-n3">
        <div class="containrt mw-900p bg-white mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="px-3 py-5 text-center">
                        <h2 class="font-weight-bold h4">أهلا بك في موقع وتطبيق</h2>
                        <img class="img-fluid img-logo-login" src="{{ asset('front_end/images/logo.jpg') }}" alt="logo">
                        <h4>قم بإيجاد اشيائك او ضع اشياء الاخريين</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form-signin py-md-5 mt-md-5  px-4">
                        <h1 class="h4 title-h2 position-relative pb-2 mb-3 font-weight-bold">استرجاع كلمة المرور</h1>
                        <div class="position-relative">
                            <label for="inputEmail" class="sr-only">اسم المتسخدم</label>
                            <i class="far fa-user text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="text" id="inputEmail" class="form-control form-control-lg mb-2 fs-16p pl-4" placeholder="اسم المتسخدم" required autofocus>
                        </div>
                        <div class="position-relative">
                            <label for="email" class="sr-only">البريد الإلكتروني</label>
                            <i class="far fa-envelope text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="email" id="email" class="form-control form-control-lg fs-16p pl-4" placeholder="البريد الإلكتروني" required="" autofocus="">
                        </div>
                        <a class="float-right text-light fs-14p my-3" href="{{ route('login') }}">تسجيل الدخول</a>
                        <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p hover-scl" type="button" data-toggle="modal" data-target="#forgot-password">استرجاع كلمة المرور</button>
                        <div class="text-center">
                            <a class="mt-5 mb-3 fs-14p d-inline-block regst" href="{{ route('register') }}"> قم بإنشاء حساب الأن<i class="fas fa-arrow-left fs-16p pl-2 position-relative top-3p"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="containrt mw-900p text-right mx-auto">
            <a class="bg-white p-2 px-4 rounded-lg mt-2 d-inline-block "href="{{ route('home') }}">الرجوع للصفحة الرئيسية</a>
        </div>

        <div class="modal fade" id="forgot-password" tabindex="-1" role="dialog" aria-labelledby="forgot-passwordTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-xl">
                    <div class="modal-body">
                        <div class="text-center pt-3">
                            <img height="50" src="{{ asset('front_end/images/warning.png') }}" alt="">
                            <h5 class="font-weight-bold mt-4">سيتم ارسال كلمة المرور علي الايميل التالي</h5>
                            <p class="text-p">osm.omari@gmail.com</p>
                            <button class="btn btn-primary mx-4"> ارسال كلمة المرور</button>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
