@extends('frontend.layout.app')
@section('title','المتجر')
@section('content')
    <main>
        <article class="container store-single back-ads py-5">
            <h2 class="h4 d-flex mb-5"> <i class="fas fa-angle-right fa-2x  mt-n1 pr-2"></i>الرجوع للمنتجات</h2>
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
                    <a class="text-light fs-12p" href="#">قسم المتجر</a>
                    <h1 class="h5 font-weight-bold mb-0">ساعة اليد مع جهاز تتبع</h1>
                    <div class="p-3 clearfix">
                        <p class="float-left mr-2 font-weight-bold pt-2">الكمية</p>
                        <div class="quantity border border-light shadow-sm rounded-lg float-left">
                            <button class="btn hover-scl"><img src="{{ asset('front_end/images/minus.png') }}" alt=""></button>
                            <input class="w-30p text-center border-0" type="text"value="1">
                            <button class="btn hover-scl"><img src="{{ asset('front_end/images/plus.png') }}" alt=""></button>
                        </div>
                        <a href="#" class="text-primary float-right mr-md-5"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</a>
                    </div>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                    </p>
                    <div class="mt-4">
                        <div class="w-75 float-left">
                            <a href="#" class="btn btn-primary py-3 d-block mr-3">طلب المنتج</a>
                        </div>
                        <div class="float-left w-25 cart-o">
                            <a href="complete-payment.html" class="btn btn-outline-primary py-3 px-0 d-block"><img class="mr-2" width="30" src="{{ asset('front_end/images/cart.png') }}" alt="">إضافة للسلة </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <img width="691" class="img-fluid rounded-xl" src="{{ asset('front_end/images/img-11-xl.png') }}" alt="">
                    <div class="row no-gutters mt-4 px-5 text-center">
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center opacity-50">
                                <img height="130" class="" src="{{ asset('front_end/images/ojo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center opacity-50">
                                <img height="130" class="" src="{{ asset('front_end/images/ojo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center">
                                <img height="130" class="" src="{{ asset('front_end/images/img-11-xl.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </article>

    </main>
@endsection
