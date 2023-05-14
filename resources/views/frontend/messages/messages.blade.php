@extends('frontend.layout.app')
@section('title','الرسائل')
@section('content')
    <main>
        <article class="complete-payment my-5 container">
            <h1 class="h4 font-weight-bold">إكمال عملية الدفع</h1>
            <div class="row my-4">
                <div class="col-lg-6">
                    <div class="min-h450p h-100 mx-4 border border-left shadow rounded-lg">
                        <div class="row">
                            <div class="col-6">
                                <div class="" id="headingOne">
                                    <button class="btn hover-scl pt-3" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h6 class="border-bottom border-primary pb-2 font-weight-bold">الدفع عن طريق بطاقة ائتمانية</h6>
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="" id="headingTwo">
                                    <button class="btn text-left hover-scl pt-3 collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h6 class="border-bottom border-primary pb-2 font-weight-bold">الدفع عن طريق مدى</h6>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="" id="accordionExample">
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form class="overlay">
                                        <div class="form-group mb-4 position-relative">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputnumber"><i class="fab fa-cc-visa fa-2x"></i></label>
                                            <input type="text" class="form-control form-control-lg" id="inputnumber" placeholder="رقم البطاقة">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputname"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputname" placeholder="الاسم على البطاقة">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group mb-4 col-md-6">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="expiry-date"></label>
                                                <input type="text" class="form-control form-control-lg" id="expiry-date" placeholder="تاريخ الانتهاء">
                                            </div>
                                            <div class="form-group mb-4 col-md-6">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم CVV">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم Zip Code">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputtitle"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputtitle" placeholder="العنوان كاملاً">
                                        </div>

                                        <div class="text-center">
                                            <button class="btn bg-primary btn-lg text-white d-block w-100 mt-3 " type="submit" data-toggle="modal" data-target="#step-3">تأكيد عملية الشراء</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <h5 class="font-weight-bold">الدفع عن طريق مدي</h5>
                                    <form>
                                        <div class="form-group mb-4 position-relative">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputnumber"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputnumber" placeholder="رقم البطاقة">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputname"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputname" placeholder="الاسم على البطاقة">
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group mb-4 col-md-6">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="expiry-date"></label>
                                                <input type="text" class="form-control form-control-lg" id="expiry-date" placeholder="تاريخ الانتهاء">
                                            </div>
                                            <div class="form-group mb-4 col-md-6">
                                                <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                                <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم CVV">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputCVV"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputCVV" placeholder="رقم Zip Code">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="position-absolute left-0 mr-3 mt-2 text-primary " for="inputtitle"></label>
                                            <input type="text" class="form-control form-control-lg" id="inputtitle" placeholder="العنوان كاملاً">
                                        </div>

                                        <div class="text-center">
                                            <button class="btn bg-primary btn-lg text-white d-block w-100 mt-3 " type="button" data-toggle="modal" data-target="#purchase">تأكيد عملية الشراء</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="border shadow mx-4 p-3 rounded-lg h-100">
                        <h5 class="title-h2 position-relative pb-3 font-weight-bold">تفاصيل المنتج</h5>
                        <div class="mt-4">
                            <div class="clearfix shadow-sm m-3 px-3 py-2 border-light border rounded-lg">
                                <img width="105" class="rounded-lg mr-2 float-left" src="{{ asset('front_end/images/ojo.png') }}" alt="">
                                <div class="float-left mt-4 px-2">
                                    <p class="font-weight-bold mb-0">ساعة اليد مع جهاز تتبع</p>
                                    <small>الكمية 2 قطعة</small>
                                    <div class="text-primary"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</div>
                                </div>
                                <a class="btn btn-outline-primary  mt-4 ml-3 px-2 float-right hover-scl" href="#">تعديل</a>
                            </div>
                        </div>

                        <h5 class="title-h2 position-relative pb-3 font-weight-bold">تفاصيل المنتج</h5>
                        <div class="row mx-3 rounded-lg shadow-sm mt-3 border-light border p-2">
                            <div class="col-6">
                                <p>سعر المنتج</p>
                            </div>
                            <div class="col-6 text-right">
                                <p>250$</p>
                            </div>
                            <div class="col-6">
                                <p>الضريبة</p>
                            </div>
                            <div class="col-6 text-right">
                                <p>5$</p>
                            </div>
                            <div class="col-6">
                                <p>التوصيل</p>
                            </div>
                            <div class="col-6 text-right">
                                <p>8$</p>
                            </div>
                            <div class="col-6 border-top">
                                <p class="font-weight-bold mt-3 mb-0">الإجمالي</p>
                            </div>
                            <div class="col-6 text-right border-top">
                                <p class="mt-3 mb-0">263$</p>
                            </div>
                        </div>
                        <button class="btn btn-outline-primary btn-lg d-block w-100 mt-3 ">الغاء عملية الشراء</button>
                    </div>
                </div>
            </div>


            <!-- Modal success ads-->
            <div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="purchaseTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-body">
                            <div class="text-center pt-3">
                                <img height="50" src="{{ asset('front_end/images/warning.png') }}" alt="">
                                <h5 class="font-weight-bold my-4">هل تريد تاكيد عملية الشراء؟</h5>
                                <button class="btn btn-primary mx-2" data-toggle="modal" data-target="#ok-success" aria-label="Close" data-dismiss="modal">تأكيد</button>
                                <button class="btn btn-outline-primary mx-2" data-dismiss="modal" aria-label="Close">الغاء</button>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ok-success" tabindex="-1" role="dialog" aria-labelledby="ok-successTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content rounded-xl">
                        <div class="modal-body">
                            <div class="text-center pt-3">
                                <img height="50" src="{{ asset('front_end/images/check.png') }}" alt="">
                                <h5 class="font-weight-bold mt-4">تم عملية الشراء بنجاح</h5>
                                <p class="text-light">سيتم التواصل معكم في اقرب وقت</p>
                                <a href="{{ route('home') }}" class="btn btn-primary mx-4">الرجوع للصفحة الرئيسية</a>
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
