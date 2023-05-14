@extends('frontend.layout.app')
@section('title','المتجر')
@section('content')
    <main>
        <article class="store">
            <div class="container">
                <div class="clearfix">
                    <h1 class="title-h2 h4 position-relative pb-3 font-weight-bold">منتجات متجر مفقود</h1>
                    <form class="form-inline position-relative float-right mt-md-n4">
                        <i class="fas fa-search position-absolute text-light right-75p"></i>
                        <img class="position-absolute left-0 pr-1" src="{{ asset('front_end/images/filter.png') }}" alt="">
                        <button class="btn btn-search form-control-lg my-2 my-sm-0" type="submit"> البحث</button>
                        <input class="form-control form-control-lg fs-13p px-4 ml-2" type="search" placeholder="قم بالبحث عن منتجات " aria-label="Search">
                    </form>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-11.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}"  class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-12.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-13.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-14.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.pn') }}g" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-11.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-12.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-13.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-14.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-11.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-12.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-13.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4 aos-init aos-animate" data-aos="fade-right">
                        <div class="card border-light mb-3 shadow rounded-xl overflow-hidden fs-14p">
                            <a class="favorite-costem" href="#"><span class="text-muted hover-scl mx-3 rounded-circle float-right"><i class="far fa-heart"></i></span></a>
                            <div class="position-relative">
                                <div class="px-5 pb-2 bg-light h-185p">
                                    <img src="{{ asset('front_end/images/img-14.png') }}" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body mb-3 pt-3">
                                    <p class="text-light mb-0">قسم المفقودات</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p font-weight-bold">ساعة اليد مع جهاز تتبع</h5>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-82p">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد
                                        تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد
                                        مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق...</p>
                                    <a href="{{ route('store_single') }}" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-2 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-primary font-weight-bold"><img class="mr-2" src="{{ asset('front_end/images/md-pricetags.png') }}" alt="">250$</span>
                                <a class="text-muted rounded-cosem bg-primary hover-scl float-right position-absolute btm-0 left-0 px-4 p-2" href="#">
                                    <img width="30" src="{{ asset('front_end/images/buy-white.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="text-center" aria-label="Page navigation example">
                <ul class="pagination d-inline-flex">
                    <li class="page-item">
                        <a class="page-link border-0 px-2" href="#" aria-label="Previous">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link border-0 px-2" href="#">9</a></li>
                    <li class="page-item"><span class="border-0 px-0" >....</span></li>
                    <li class="page-item"><a class="page-link border-0 px-2" href="#">4</a></li>
                    <li class="page-item"><a class="page-link border-0 px-2" href="#">3</a></li>
                    <li class="page-item"><a class="page-link border-0 px-2" href="#">2</a></li>
                    <li class="page-item"><a class="page-link border-0 px-2" href="#">1</a></li>
                    <li class="page-item">
                        <a class="page-link border-0 px-2" href="#" aria-label="Next">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </article>
    </main>
@endsection
