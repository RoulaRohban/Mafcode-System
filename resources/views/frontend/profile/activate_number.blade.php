@extends('frontend.layout.app')
@section('title','تفعيل الرقم')
@section('content')
    <section class="container messages py-5">
        <h1 class="title-h2 h4 position-relative pb-3 font-weight-bold">الرسائل</h1>
        <div class="row no-gutters rounded-lg border">
            <div class="col-lg-3 border-right">
                <div class="border-bottom">
                    <form class="form-inline  py-3">
                        <button class="btn my-2 my-sm-0" type="submit">البحث</button>
                        <i class="fas fa-search position-absolute text-light right-70p"></i>
                        <input class="form-control mr-sm-1 pl-4 fs-13p w-75" type="search" placeholder="اكتب كلمة البحث" aria-label="Search">
                    </form>
                </div>
                <div class="overflow-auto mh-520p" dir="ltr">
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <div class="position-relative">
                                <i class="fas fa-circle text-success dot-active"></i>
                                <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av1.png') }}" alt="">
                            </div>
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av2.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av3.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av4.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av5.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/img-per.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <img width="70" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av3.png') }}" alt="">
                            <p class="font-weight-bold ws-nr float-left mt-4 px-2">محمد احمد</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="border-bottom">
                    <div class="clearfix px-3 py-2">
                        <a class="text-black" href="#">
                            <div class="position-relative">
                                <i class="fas fa-circle text-success dot-active-s"></i>
                                <img width="54" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av1.png') }}" alt="">
                            </div>
                            <p class="font-weight-bold ws-nr float-left mt-2 px-2">محمد احمد</p>
                        </a>
                    </div>
                </div>
                <div class="h-435p overflow-auto border-bottom">
                    <div class="clearfix px-3 ">
                        <div class="position-relative">
                            <i class="fas fa-circle text-success dot-active-s"></i>
                            <img width="54" class="rounded-circle mr-2 float-left" src="{{ asset('front_end/images/av1.png') }}" alt="">
                        </div>
                        <p class="font-weight-bold float-left mt-2 content-msqbl rounded-xl p-2 px-3">مرحبا يعطيك العافية</p>
                    </div>
                    <div class="clearfix px-3">
                        <div class="position-relative">
                            <i class="fas fa-circle text-success dot-active-left"></i>
                            <img width="54" class="rounded-circle mr-2 float-right" src="{{ asset('front_end/images/img-per.png') }}" alt="">
                        </div>
                        <p class="font-weight-bold float-right mt-2 mr-2 bg-primary text-white rounded-xl p-2 px-3 content-mrsl">مراحب كيق فيني ساعدك</p>
                    </div>
                </div>
                <div class="">
                    <form class="form-inline p-3 position-relative" >
                        <a href="#"><i class="fas fa-camera fa-2x position-absolute text-light left-120p top-30p"></i></a>
                        <input class="form-control form-control-lg mr-sm-1 pl-4 w-85 rounded-lg" type="text" placeholder="اكتب رسالتك..." aria-label="Search">
                        <button class="btn btn-primary m-2 my-sm-0 send " type="submit"><img class="ml-1" width="30" src="{{ asset('front_end/images/send.png') }}" alt=""></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 border-left">
                <div class="clearfix px-3 py-2">
                    <div class="d-flex justify-content-around text-center flex-column">
                        <div class="position-relative">
                            <i class="fas fa-circle text-success dot-active-center"></i>
                            <img width="120" class="rounded-circle mx-auto" src="{{ asset('front_end/images/av1.png') }}" alt="">
                        </div>
                        <p class="font-weight-bold ws-nr mt-2 px-2 mb-0">محمد احمد</p>
                        <div class="text-muted pr-2 fs-14p"><i class="fas fa-map-marker-alt"></i> السعودية - مكة المكرمة</div>
                    </div>
                    <div class="mt-3">
                        <h2 class="font-weight-bold h6">الاعلان</h2>
                        <p class="text-p fs-12p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة</p>
                    </div>
                    <div class="mt-3">
                        <h2 class="font-weight-bold h6">التفاصيل</h2>
                        <p class="text-p fs-12p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس
                            المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث
                            يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى
                            .إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                            إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص
                        </p>
                        <div class="row no-gutters pb-3">
                            <div class="col-4 px-1">
                                <img class="img-fluid rounded-lg" src="{{ asset('front_end/images/img-1.png') }}" alt="">
                            </div>
                            <div class="col-4 px-1">
                                <img class="img-fluid rounded-lg" src="{{ asset('front_end/images/img-1.png') }}" alt="">
                            </div>
                            <div class="col-4 px-1">
                                <img class="img-fluid rounded-lg" src="{{ asset('front_end/images/img-1.png') }}" alt="">
                            </div>
                        </div>
                        <a class="d-block btn btn-primary mt-3 hover-scl" href="#"> زيارة الاعلان</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
