@extends('frontend.layout.app')
@section('title','إضافة إعلان')
@section('content')
    <main>
        <article class="container back-ads py-5">
            <h2 class="h4 d-flex mb-5"> <i class="fas fa-angle-right fa-2x  mt-n1 pr-2"></i>الرجوع للاعلانات</h2>
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
                    <a class="text-light fs-12p" href="#">قسم المفقودات</a>
                    <h1 class="h5 font-weight-bold mb-0">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</h1>
                    <div class="py-3 text-p fs-12p">
                        <span class="text-muted pr-2"><i class="fas fa-map-marker-alt text-primary"></i> السعودية - مكة المكرمة</span>
                        <span class="text-muted pr-2"><i class="far fa-clock text-primary mr-2"></i>بتاريخ 9/8/2021 الساعة 5 مساءً</span>
                    </div>
                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                        .يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما
                        ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير
                        من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة،
                        لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
                        .إلى زيادة عدد الحروف التى يولدها التطبيق
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما
                        ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير
                        .من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما
                        ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير
                        .من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع
                    </p>
                    <div class="clearfix">
                        <a class="btn float-right bg-orange text-white font-weight-bold hover-scl" href="#">ترويج الاعلان</a>
                        <a class="btn btn-outline-primary text-black float-left" href="#">English translation</a>
                    </div>
                    <div class="mt-4">
                        <div class="clearfix shadow-sm d-inline-block px-3 py-2 border-light border rounded-lg">
                            <img width="105" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/img-per.png') }}" alt="">
                            <div class="float-left mt-4 px-2">
                                <small>تم النشر بواسطة</small>
                                <p class="font-weight-bold">محمد محمود احمد</p>
                            </div>
                            <a class="btn btn-primary mt-4-5 ml-3 px-sm-5 px-4 d-inline-block hover-scl" href="#">الرسائل</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <img width="691" class="img-fluid rounded-xl" src="{{ asset('front_end/images/img-1.png') }}" alt="">
                    <div class="row no-gutters mt-4 px-5 text-center">
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center opacity-50">
                                <img height="130" class="" src="{{ asset('front_end/images/img-8.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center opacity-50">
                                <img height="130" class="" src="{{ asset('front_end/images/img-7.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="border hover-scl border-light rounded-xl overflow-hidden mx-2 d-flex align-items-center justify-content-center">
                                <img height="130" class="" src="{{ asset('front_end/images/img-1.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </article>
    </main>
@endsection
