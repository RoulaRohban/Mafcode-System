@extends('frontend.layout.app')
@section('title','إنشاء حساب جديد')
@section('content')

    <section class="login bg-primary mt-n4">
        <div class="containrt mw-900p bg-white mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <div class="px-3 py-5 text-center">
                        <h2 class="font-weight-bold h4">أهلا بك في موقع وتطبيق</h2>
                        <img class="img-fluid" src="{{ asset('front_end/images/logo.jpg') }}" alt="logo">
                        <h4>قم بإيجاد اشيائك او ضع اشياء الاخريين</h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="form-signin mt-4 px-4">
                        <h1 class="h4 title-h2 position-relative pb-2 mb-3 font-weight-bold">إنشاء حساب</h1>
                        <div class="">
                            <div class="clearfix">
                                <label for="File1" class="btn btn-outline-primary border-moted rounded-lg float-left w-15 d-inline-block"> <i class="fas fa-user text-light fa-2x"></i></label>
                                <label for="File1" class="btn d-inline-block mr-4 float-left"> أضغط هنا لرفع صورة شخصية</label>
                                <input type="file" class="d-none" id="File1">
                            </div>
                        </div>
                        <div class="position-relative">
                            <label for="fulName" class="sr-only">الإسم كامل</label>
                            <i class="far fa-user text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="text" id="fulName" class="form-control form-control-lg fs-16p pl-4" placeholder="الإسم كامل" required autofocus>
                        </div>
                        <div class="position-relative">
                            <label for="phone" class="sr-only">رقم الهاتف</label>
                            <i class="fas fa-mobile-alt text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="text" id="phone" class="form-control form-control-lg fs-16p pl-4" placeholder="رقم الهاتف" required autofocus>
                        </div>
                        <div class="position-relative">
                            <label for="email" class="sr-only">البريد الإلكتروني</label>
                            <i class="far fa-envelope text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="email" id="email" class="form-control form-control-lg fs-16p pl-4" placeholder="البريد الإلكتروني" required autofocus>
                        </div>
                        <div class="position-relative">
                            <label for="inputPassword" class="sr-only">كلمة المرور</label>
                            <i class="far fa-lock text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="password" id="inputPassword" class="form-control form-control-lg fs-16p pl-4" placeholder="كلمة المرور" required>
                        </div>
                        <div class="position-relative">
                            <label for="inputPassword2" class="sr-only">تأكيد كلمة المرور</label>
                            <i class="far fa-lock text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="password" id="inputPassword2" class="form-control form-control-lg fs-16p pl-4" placeholder="كلمة المرور" required>
                        </div>
                        <div class="position-relative">
                            <label for="address" class="sr-only">العنوان</label>
                            <i class="fas fa-map-marker-alt text-primary position-absolute btm-15p fs-16p"></i>
                            <input type="password" id="address" class="form-control form-control-lg fs-16p pl-4" placeholder="العنوان" required>
                        </div>
                        <div class="checkbox mb-3">
                            <input class="punter"  type="checkbox" id="checkd" value="remember-me">
                            <button  for="checkd" class="btn px-2 punter fs-12p mb-0" data-toggle="modal" data-target="#blood-type">إذا كنت من محبي التبرع بالدم إضغط هنا</button>
                        </div>
                        <p class="text-p fs-10p">بتسجيلك في الموقع او التطبيق انت توافق على <a href="#">سياسة الخصوصية</a> ، <a href="#">شروط الاستخدام</a></p>
                        <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p" type="submit"data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">تسجيل جديد</button>
                        <div class="text-center">
                            <a class="mt-4 mb-3 fs-14p d-inline-block regst" href="{{ route('login') }}"> لدي حساب بالفعل<i class="fas fa-arrow-left fs-16p pl-2 position-relative top-3p"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="containrt mw-900p text-right mx-auto mb-3">
            <a class="bg-white p-2 px-4 rounded-lg mt-2 d-inline-block " href="{{ route('home') }}">الرجوع للصفحة الرئيسية</a>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content border-0 bg-transparent text-center text-white mt-5 pt-5">
                    <h2 class="mb-4">تم تسجيلك بنجاح</h2>
                    <h3 class="mb-3">يرجى منك تفعيل حسابك بإحدى الطرق التالية</h3>
                    <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p" type="submit" data-toggle="modal" data-target="#confirm-email" aria-label="Close" data-dismiss="modal">تأكيد الإيميل</button>
                    <button class="btn btn-lg btn-outline-primary form-control-lg btn-block fs-14p bg-white text-primary mt-3" type="submit">  <i class="fas fa-redo mr-2"></i>إعادة إرسال</button>

                </div>
            </div>
        </div>

        <!-- Modal blood-type-->
        <div class="modal fade" id="blood-type" tabindex="-1" role="dialog" aria-labelledby="blood-typeTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-xl">
                    <div class="modal-body">
                        <div class="text-center pt-3">
                            <img height="80" src="{{ asset('front_end/images/blood-red.png') }}" alt="">
                            <h5 class="font-weight-bold my-4">يرجى منك تحديد فصيلة الدم الخاصة بك</h5>
                            <div class="row">
                                <div class="col-6">
                                    <p class="">فصيلة الدم</p>
                                </div>
                                <div class="col-4">
                                    <select class="form-control">
                                        <option selected>+ABA</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>+A</option>
                                        <option>-A</option>
                                    </select>

                                </div>
                            </div>

                            <button class="btn btn-primary mx-2 mt-3 px-5" data-toggle="modal" data-target="#ok-success" aria-label="Close" data-dismiss="modal">موافق</button>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal blood-type-->
        <div class="modal fade" id="confirm-email" tabindex="-1" role="dialog" aria-labelledby="confirm-emailTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content rounded-xl">
                    <div class="modal-body">
                        <div class="containrt mw-600p bg-white mx-auto rounded-lg">
                            <form class="form-signin p-5 mx-sm-5 px-3 text-center">
                                <h1 class="h4 position-relative pb-2 mb-3 font-weight-bold">يرجى منك تأكيد الايميل المدخل</h1>
                                <p class="text-primary">ahmed.hasa@gmail.com</p>
                                <p class="text-p">اضغط على الزر التالي لتأكيد الإيميل وتفعيل الحساب</p>
                                <button class="btn btn-lg btn-primary form-control-lg btn-block fs-14p  mt-3" type="submit">تأكيد الايميل</button>
                                <button class="btn btn-lg btn-outline-primary form-control-lg btn-block fs-14p  mt-3" type="submit">  <i class="fas fa-redo mr-2"></i>إعادة إرسال رابط التأكيد</button>
                                <a  href="{{ route('information_change') }}" class="mt-3 d-inline-block">تغيير الإيميل</a>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
