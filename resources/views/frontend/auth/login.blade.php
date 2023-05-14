@extends('frontend.layout.app')
@section('title','تسجيل الدخول')
@section('content')
    <body class="bg-primary">
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
                <form class="form-signin py-md-5 mt-md-5  px-4"  method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="h4 title-h2 position-relative pb-2 mb-3 font-weight-bold">تسجيل دخول</h1>
                    <div class="position-relative">
                        <label for="inputEmail" class="sr-only">اسم المتسخدم</label>
                        <i class="far fa-user text-primary position-absolute btm-15p fs-16p"></i>
                        <input type="text"  name="email"  id="inputEmail" class="form-control form-control-lg mb-2 fs-16p pl-4" placeholder="اسم المتسخدم" required autofocus>
                    </div>
                    <div class="position-relative">
                        <label for="inputPassword" class="sr-only">كلمة المرور</label>
                        <i class="far fa-lock text-primary position-absolute btm-15p fs-16p"></i>
                        <input name="password" type="password" id="inputPassword" class="form-control form-control-lg mb-3 fs-16p pl-4" placeholder="كلمة المرور" required>
                    </div>
                    <a class="float-right text-light fs-14p" href="{{ route('forget_password') }}">هل نسيت كلمة المرور؟</a>
                    <div class="checkbox mb-3">
                        <input class="punter"  type="checkbox" id="checkd" value="remember-me">
                        <label for="checkd" class="px-2 punter">تذكرني</label>

                    </div>
                    <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p hover-scl" type="submit">تسجيل دخول</button>
                    <div class="text-center">
                        <a class="mt-5 mb-3 fs-14p d-inline-block regst" href="{{ route('register') }}"> قم بإنشاء حساب الأن<i class="fas fa-arrow-left fs-16p pl-2 position-relative top-3p"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="containrt mw-900p text-right mx-auto">
        <a class="bg-white p-2 px-4 rounded-lg mt-2 d-inline-block " href="{{ route('home') }}">الرجوع للصفحة الرئيسية</a>
    </div>
</section>
@endsection
