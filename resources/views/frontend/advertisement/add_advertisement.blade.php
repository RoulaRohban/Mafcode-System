@extends('frontend.layout.app')
@section('title','إضافة إعلان')
@section('content')
    <main>
        <article class="container add-ads pt-3 pb-5">
            <div class="text-center">
                <h1 class="h4 font-weight-bold d-inline-block pb-2">اضافة اعلان</h1>
            </div>
            <form class="needs-validation mx-auto mb-5">
                <div class="my-3 clearfix">
                    <div class="d-inline-block w-15 float-left">
                        <p class="pr-4">إضافة صور</p>
                    </div>
                    <div class="w-85 float-right">
                        <div class="row">
                            <div class="col-3">
                                <label for="File1" class="btn btn-outline-primary border-moted rounded-lg p-4-5"><img
                                            src="{{ asset('front_end/images/iqn-cam.png') }}" class="img-fluid" alt=""></label>
                                <input  type="file" class="d-none" id="File1">
                            </div>
                            <div class="col-3">
                                <label for="File2" class="btn btn-outline-primary border-moted rounded-lg p-4-5"><img
                                            src="{{ asset('front_end/images/iqn-cam.png') }}" class="img-fluid" alt=""></label>
                                <input  type="file" class="d-none" id="File2">
                            </div>
                            <div class="col-3">
                                <label for="File3" class="btn btn-outline-primary border-moted rounded-lg p-4-5"><img
                                            src="{{ asset('front_end/images/iqn-cam.png') }}" class="img-fluid" alt=""></label>
                                <input  type="file" class="d-none" id="File3">
                            </div>
                            <div class="col-3">
                                <label for="File4" class="btn btn-outline-primary border-moted rounded-lg p-4-5"><img
                                            src="{{ asset('front_end/images/iqn-cam.png') }}" class="img-fluid" alt=""></label>
                                <input  type="file" class="d-none" id="File4">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="my-3 clearfix">
                    <div class="d-inline-block w-15 float-left">
                        <p class="pr-4">أنت</p>
                    </div>
                    <div class="w-85 float-right">
                        <div class="d-inline-block custom-control custom-radio pr-5">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">إضعت</label>
                        </div>
                        <div class="d-inline-block custom-control custom-radio pr-5">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">وجدت</label>
                        </div>
                    </div>
                </div>
                <div class="my-3 clearfix">
                    <label class="w-15 float-left" for="country">حدد القسم</label>
                    <div class="w-85 float-right">
                        <select class="form-control w-200p d-inline-block mr-lg-4" id="country" required>
                            <option value="">.</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                        <label class="mr-lg-4" for="number">رقم الهوية او جواز السفر</label>
                        <select class="form-control w-200p d-inline-block" id="number" required>
                            <option value="">.</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>
                <div class="my-3 clearfix">
                    <label class="w-15 float-left" for="location">الموقع</label>
                    <div class="w-85">
                        <select class="form-control w-200p d-inline-block" id="location" required>
                            <option value="">.</option>
                            <option>United States</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>
                <div class="my-3 clearfix">
                    <label class="w-15 float-left" for="Title">العنوان</label>
                    <div class="w-85 float-right">
                        <input type="text" class="form-control" id="Title" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>
                <div class="my-3 clearfix">
                    <label class="w-15 float-left" for="ads-input">الاعلان</label>
                    <div class="w-85 float-right">
                        <textarea class="form-control" id="ads-input" rows="5" placeholder=""></textarea>
                        <div class="invalid-feedback">
                            Please select a valid country.
                        </div>
                    </div>
                </div>

                <button class="btn btn-primary btn-lg btn-block w-85 float-right" type="submit" data-toggle="modal" data-target="#add-ads">إضافة الاعلان</button>
            </form>
            <!-- Button trigger modal -->
            <!-- Modal add-ads-->
            <div class="modal fade" id="add-ads" tabindex="-1" role="dialog" aria-labelledby="add-adsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-header border-0">
                            <button type="button" class="close fs-16p text-primary" data-dismiss="modal" aria-label="Close">
                                الغاء
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="text-center">
                                        <img height="50" src="{{ asset('front_end/images/true.png') }}" alt="">
                                        <h5 class="font-weight-bold mt-2">.تم إضافة إعلانك بنجاح</h5>
                                        <p>يمكنك إدارة إعلاناتك من خلال إعلاناتي
                                            في القائمة الرئيسية
                                        </p>
                                        <a href="{{ route('home') }}" class="btn btn-primary hover-scl">الرجوع للصفحة الرئيسية</a>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <img height="50" src="{{ asset('front_end/images/tg-orange.png') }}" alt="">
                                        <h5 class="font-weight-bold mt-2">.هل تريد ترويج الاعلان؟</h5>
                                        <p>عند ترويج الاعلان سيظهر في بداية النتائج
                                            مع رقم هاتفك حتى يستطيع المستخدمين التواصل معك                                 </p>
                                        <a href="#" class="btn bg-orange text-white hover-scl px-5" data-toggle="modal" data-target="#promotion" aria-label="Close" data-dismiss="modal">ترويج</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal promotion step-1-->
            <div class="modal fade" id="promotion" tabindex="-1" role="dialog" aria-labelledby="promotionTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                    <div class="modal-content rounded-xl">
                        <button type="button" class="close fs-16p text-primary position-absolute left-0 z-in-2 m-3" data-dismiss="modal" aria-label="Close">
                            الغاء
                        </button>
                        <div class="modal-body">
                            <div class="text-center">
                                <img height="50" src="{{ asset('front_end/images/tg-orange.png') }}" alt="">
                                <p class="mt-2 px-5">
                                    يمكنك من خلال ترويج اعلانك الوصول الي نتائج
                                    فعالة وسريعة حيث سيتم وضع اعلانكم في مقدمة
                                    الاعلانات المضافة في تطبيق وموقع الويب
                                </p>
                            </div>
                            <div class="row no-gutters px-5">
                                <div class="col-4">
                                    <div class="position-relative">
                                        <span class="step active step-1 "></span>
                                        <p class="text-light mt-3">تفاصيل </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-center">
                                        <span class="step step-2"></span>
                                        <p class="text-light mt-3">الدفع </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-right">
                                        <span class="step step-3"></span>
                                        <p class="text-p mt-3">التاكيد </p>
                                    </div>
                                </div>
                            </div>
                            <form>
                                <div class="row px-5">
                                    <div class="col-6">
                                        <h4 class="font-weight-bold mb-1">عدد ايام الترويج</h4>
                                        <small>يرجى إختيار عدد ايام ترويج اعلانك</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="form-group">
                                            <label for="inputState"></label>
                                            <select id="inputState" class="border-0 ">
                                                <option selected>يوم واحد</option>
                                                <option>2 يوم</option>
                                                <option>3 ايام</option>
                                                <option>4 ايام</option>
                                                <option>5 ايام</option>
                                                <option>6 ايام</option>
                                                <option>7 ايام</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="font-weight-bold mb-1 mt-3">السعر</h4>
                                    </div>
                                    <div class="col-6 text-right">
                                        <p class="mt-3">50 ر.س</p>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn bg-orange btn-lg text-white px-5 mt-3" type="button" data-toggle="modal" data-target="#step-2" aria-label="Close" data-dismiss="modal">استمرار</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal promotion step-2-->
            <div class="modal fade" id="step-2" tabindex="-1" role="dialog" aria-labelledby="step-2Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-header border-0">
                            <button class="btn d-flex" data-toggle="modal" data-target="#promotion" data-dismiss="modal" aria-label="Close"> <i class="fas fa-angle-right fa-2x  mt-n1 pr-2"></i>الرجوع للخطوة السابقة</button>
                            <button type="button" class="close fs-16p text-primary" data-dismiss="modal" aria-label="Close">
                                الغاء
                            </button>
                        </div>
                        <div class="modal-body costem-h">
                            <div class="row no-gutters px-5">
                                <div class="col-4">
                                    <div class="position-relative">
                                        <i class="fas fa-check step-check"></i>
                                        <span class="step active step-1 "></span>
                                        <p class="text-light mt-3">تفاصيل </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-center">
                                        <span class="step active step-2"></span>
                                        <p class="text-light mt-3">الدفع </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-right">
                                        <span class="step step-3"></span>
                                        <p class="text-p mt-3">التاكيد </p>
                                    </div>
                                </div>
                            </div>
                            <h2 class="h5 font-weight-bold">اختيار إلية الدفع</h2>
                            <div class="row">
                                <div class="col-4">
                                    <div class="" id="headingOne">
                                        <button class="btn text-left hover-scl" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <img src="{{ asset('front_end/images/visa_logo.png') }}" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="" id="headingTwo">
                                        <button class="btn text-left hover-scl " type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <img src="{{ asset('front_end/images/mada.png') }}" alt="">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="" id="headingThree">
                                        <button class="btn text-left hover-scl" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <img src="{{ asset('front_end/images/phon-play.png') }}" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="" id="accordionExample">
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="overlay">
                                            <div class="form-group position-relative">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputnumber"><i class="fab fa-cc-visa fa-2x"></i></label>
                                                <input type="text" class="form-control form-control-lg" id="inputnumber" placeholder="رقم البطاقة">
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputname"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputname" placeholder="الاسم على البطاقة">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="expiry-date"></label>
                                                    <input type="text" class="form-control form-control-lg" id="expiry-date" placeholder="تاريخ الانتهاء">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                    <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم CVV">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم Zip Code">
                                            </div>
                                        </form>
                                        <div class="text-center">
                                            <button class="btn bg-orange btn-lg text-white px-5 mt-3 hover-scl" type="submit" data-toggle="modal" data-target="#step-3" aria-label="Close" data-dismiss="modal">استمرار</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">الدفع عن طريق مدي</h5>
                                        <form>
                                            <div class="form-group position-relative">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputnumber"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputnumber" placeholder="رقم البطاقة">
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputname"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputname" placeholder="الاسم على البطاقة">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="expiry-date"></label>
                                                    <input type="text" class="form-control form-control-lg" id="expiry-date" placeholder="تاريخ الانتهاء">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                    <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم CVV">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم Zip Code">
                                            </div>

                                            <div class="text-center">
                                                <button class="btn bg-orange btn-lg text-white px-5 mt-3 hover-scl" type="submit" data-toggle="modal" data-target="#step-3" aria-label="Close" data-dismiss="modal">استمرار</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <h5 class="font-weight-bold">الدفع عن طريق بلاي</h5>
                                        <form>
                                            <div class="form-group position-relative">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputnumber"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputnumber" placeholder="رقم البطاقة">
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputname"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputname" placeholder="الاسم على البطاقة">
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="expiry-date"></label>
                                                    <input type="text" class="form-control form-control-lg" id="expiry-date" placeholder="تاريخ الانتهاء">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                    <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم CVV">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم Zip Code">
                                            </div>

                                            <div class="text-center">
                                                <button class="btn bg-orange btn-lg text-white px-5 mt-3 hover-scl" type="submit" data-toggle="modal" data-target="#step-3" aria-label="Close" data-dismiss="modal">استمرار</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal promotion step-3-->
            <div class="modal fade" id="step-3" tabindex="-1" role="dialog" aria-labelledby="step-3Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-header border-0">
                            <button class="btn d-flex" data-toggle="modal" data-target="#step-2" aria-label="Close" data-dismiss="modal"> <i class="fas fa-angle-right fa-2x  mt-n1 pr-2"></i>الرجوع للخطوة السابقة</button>
                            <button type="button" class="close fs-16p text-primary" data-dismiss="modal" aria-label="Close">
                                الغاء
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters px-5">
                                <div class="col-4">
                                    <div class="position-relative">
                                        <i class="fas fa-check step-check"></i>
                                        <span class="step active step-1 "></span>
                                        <p class="text-light mt-3">تفاصيل </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-center">
                                        <i class="fas fa-check step-check2"></i>
                                        <span class="step active step-2"></span>
                                        <p class="text-light mt-3">الدفع </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="position-relative text-right">
                                        <span class="step active step-3"></span>
                                        <p class="text-p mt-3">التاكيد </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row font-weight-bold no-gutters mx-5 p-4 shadow rounded-lg">
                                <div class="col-6">
                                    <p>عدد ايام الترويج</p>
                                </div>
                                <div class="col-6 text-right">
                                    <p>8 ايام</p>
                                </div>
                                <div class="col-6 border-top">
                                    <p class="">السعر</p>
                                </div>
                                <div class="col-6 text-right border-top">
                                    <p>150 ر.س</p>
                                </div>

                            </div>
                            <div class="text-center">
                                <button class="btn bg-orange btn-lg text-white px-5 mt-3 hover-scl" type="submit" data-toggle="modal" data-target="#success-ads" aria-label="Close" data-dismiss="modal">تأكيد العملية</button>
                            </div>

                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal success ads-->
            <div class="modal fade" id="success-ads" tabindex="-1" role="dialog" aria-labelledby="success-adsTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-header border-0">
                            <button type="button" class="close fs-16p text-primary" data-dismiss="modal" aria-label="Close">
                                الغاء
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img height="50" src="{{ asset('front_end/images/tg-orange.png') }}" alt="">
                                <h5 class="font-weight-bold mt-2">.تم ترويج إعلانك بنجاح</h5>
                                <p>
                                    يمكنك إدارة إعلاناتك من خلال إعلاناتي <br> في القائمة الرئيسية
                                </p>
                                <a href="{{ route('home') }}" class="btn bg-orange text-white hover-scl px-5" >الرجوع للصفحة الرئيسة</a>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>


        </article>
    </main>
@endsection
