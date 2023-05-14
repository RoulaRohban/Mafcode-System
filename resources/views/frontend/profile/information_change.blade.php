@extends('frontend.layout.app')
@section('title','تعديل المعلومات')
@section('content')
    <main>
        <section class="login bg-primary">
            <div class="container mw-900p bg-white mx-auto">
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <div class="p-3 text-center">
                            <h2 class="font-weight-bold h4">أهلا بك في موقع وتطبيق</h2>
                            <div class="mx-lg-auto mx-5 ">
                                <img class="img-fluid px-2" src="{{ asset('front_end/images/logo.jpg') }}" alt="logo">
                            </div>
                            <h4>قم بإيجاد اشيائك او ضع اشياء الاخريين</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="form-signin my-4 px-4">
                            <h1 class="h4 title-h2 position-relative pb-2 mb-3 font-weight-bold">تغيير معلوماتي</h1>
                            <div class="">
                                <div class="clearfix">
                                    <label for="File1" class="btn btn-outline-light rounded-lg float-left p-0">
                                        <img width="55" height="55" src="{{ asset('front_end/images/profile-photo-empty.png') }}" alt=""></label>
                                    <label for="File1" class="btn d-inline-block float-left mt-2"> أضغط هنا لرفع صورة شخصية</label>
                                    <input type="file" class="d-none" id="File1">
                                </div>
                            </div>
                            <div class="position-relative">
                                <label for="fulName" class="sr-only">الإسم كامل</label>
                                <i class="far fa-user text-primary position-absolute btm-15p fs-16p"></i>
                                <input type="text" id="fulName" class="form-control form-control-lg fs-16p pl-4" placeholder="الإسم كامل">
                            </div>
                            <div class="position-relative">
                                <label for="phone" class="sr-only">رقم الهاتف</label>
                                <i class="fas fa-mobile-alt text-primary position-absolute btm-15p fs-16p"></i>
                                <input type="text" id="phone" class="form-control form-control-lg fs-16p pl-4" placeholder="رقم الهاتف">
                            </div>
                            <div class="position-relative">
                                <label for="email" class="sr-only">البريد الإلكتروني</label>
                                <i class="far fa-envelope text-primary position-absolute btm-15p fs-16p"></i>
                                <input type="email" id="email" class="form-control form-control-lg fs-16p pl-4" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="position-relative">
                                <label for="inputPassword" class="sr-only">كلمة المرور</label>
                                <i class="far fa-lock text-primary position-absolute btm-15p fs-16p"></i>
                                <input type="password" id="inputPassword" class="form-control form-control-lg fs-16p pl-4" placeholder="كلمة المرور">
                            </div>
                            <div class="position-relative">
                                <label for="address" class="sr-only">العنوان</label>
                                <i class="fas fa-map-marker-alt text-primary position-absolute btm-15p fs-16p"></i>
                                <input type="text" id="address" class="form-control form-control-lg fs-16p pl-4" placeholder="العنوان">
                            </div>
                            <div class="checkbox mb-3">
                                <input class="punter"  type="checkbox" id="checkd" value="remember-me">
                                <label for="checkd" class="px-2 punter fs-12p mb-0">إذا كنت من محبي التبرع بالدم إضغط هنا</label>
                            </div>
                            <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p" type="submit">تأكيد</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="containrt mw-900p text-right mx-auto mb-3">
                <a class="bg-white p-2 px-4 rounded-lg mt-2 d-inline-block " href="{{ route('home') }}" >الرجوع للصفحة الرئيسية</a>
            </div>
        </section>
    </main>
@endsection
