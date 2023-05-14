@extends('frontend.layout.app')
@section('title','مفقود')
@section('content')

    <section class="container search-o position-relative py-5 mb-5">
        <span class="star right-n200p top-n20p"></span>
        <span class="star btm-items-center left-n100p"></span>
        <span class="star btm-0 right-380p"></span>

        <div class="row">
            <div class="col-lg-6 order-lg-1 order-2" data-aos="zoom-in-up">
                <h2 class="h5 font-weight-bold mb-3">{{ $slider->title }}</h2>
                <p class="text-p mw-600p">
                    {{ $slider->caption }}
                </p>
                <div>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control border-primary" type="search" placeholder="@lang('site.search_word')" aria-label="Search">
                        <div class="btn-group">
                            <button type="button" class="btn falter">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>

                        <button class="btn btn-search btn-primary my-2 my-sm-0 px-3 border-left-0" type="submit"><i class="fas fa-search fa-2x"></i></button>
                        <div class="bg-primary alayd-o py-2">
                            <div class="form-group">
                                <label class="text-white px-2" for="inputState">حدد القسم</label>
                                <select id="inputState" class="form-control ">
                                    <option selected>اختيار..</option>
                                    <option>...</option>
                                </select>
                                <label class="text-white px-2" for="inputState2">حدد المنطقة</label>
                                <select id="inputState2" class="form-control ">
                                    <option selected>اختيار..</option>
                                    <option>...</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 order-lg-2 order-1" data-aos="fade-right" data-aos-delay="500">
                <img class="img-fluid" src="{{ $slider->image->image_url }}" alt="">
            </div>
        </div>
        <a class="btn btn-outline-light btn-dun d-none d-lg-flex" data-aos-easing="ease-in-out" href="#"><i class="fas fa-arrow-circle-down text-primary fa-3x"></i></a>

    </section>
    <section id="adds" class=" adds py-5 position-relative">
        <span class="star right-0 btm-0"></span>
        <div class="container">
            <span class="star left-0"></span>

            <h2 class="title-h2 h4 position-relative pb-3 ">@lang('site.added_advertisements')</h2>
            <div class="py-4 row">
                @php $data_aos_delay = 0 @endphp
                @foreach($advertisements as $advertisement)
                    <div class="col-lg-3 col-sm-6 mb-4" data-aos="fade-right" @php echo $data_aos_delay > 0 ? 'data-aos-delay="' . $data_aos_delay . '"' : ''; $data_aos_delay < 400 ? $data_aos_delay += 100 : $data_aos_delay = 0 @endphp>
                        <div class="card rounded-xl overflow-hidden fs-14p shadow border-0">
                            <a class="bg-orange hover-scl position-absolute top-0 right-0 p-2 z-in-2 crown" href="#1"><img src="images/crown.png" alt=""></a>
                            <div class="position-relative">
                                <img src="{{ $advertisement->primaryImage()->image_url ?? '' }}" class="card-img-top" alt="...">
                                <div class="card-body mb-3">
                                    <p class="text-light mb-0">{{ $advertisement->category->name ?? '' }}</p>
                                    <div class="clearfix">
                                        <h5 class="card-title float-left fs-14p">{{ $advertisement->title }}</h5>
                                        <small class="float-right text-light">{{ $advertisement->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="card-text text-p overflow-hidden h-130p">{{ $advertisement->description }}</p>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                            <div class="p-3 position-absolute btm-0 w-100 z-in-1">
                                <span class="text-muted"><img width="20" src="{{ asset('front_end/images/map-pin.png')}}" alt="">{{ $advertisement->getLocation()['country']->name . ($advertisement->getLocation()['city'] ? " - " . $advertisement->getLocation()['city']->name ?? '' : '') . ($advertisement->getLocation()['region'] ? " - " . $advertisement->getLocation()['region']->name ?? '' : '') }}</span>
                                <a class="favorite " href="#"><span class="text-muted hover-scl float-right"><i class="far fa-heart"></i></span></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a class="btn btn-primary hover-scl px-5 py-2" href="{{ route('added_advertisement') }}">@lang('site.more_advertisements')</a>
            </div>
        </div>
    </section>
    <section class="container who-we py-5 mt-3 position-relative">
        <span class="star top-n20p"></span>
        <span class="star btm-0 left-n100p"></span>
        <span class="star top-n60p left-300p"></span>

        <div class="row">
            <div class="col-lg-6" data-aos="zoom-in"  data-aos-duration="1000">
                <img class="img-fluid" src="{{ asset('front_end/images/img-4.png')}}" alt="">
            </div>
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="700">
                <h2 class="title-h2 h4 position-relative pb-3 font-weight-bold">@lang('site.about_us')</h2>
                <p class="text-p">{{ $about_us }}</p>
            </div>

        </div>

    </section>
    <section class="container application py-5 mt-3">
        <div class="row">
            <div class="col-lg-8 order-lg-1 order-2" data-aos="fade-down">
                <h2 class="title-h2 h4 position-relative pb-3 font-weight-bold">@lang('site.about_app')</h2>
                <div class="py-3 text-p fs-12p">
                </div>
                <p class="text-p">{{ $about_app }}</p>
                <div class="text-center app-iqn">
                    <a class="px-md-4 px-2" href="#"><img class="hover-scl" width="220" src="{{ asset('front_end/images/g-play.png')}}" alt=""></a>
                    <a class="px-md-4 px-2" href="#"><img class="hover-scl" width="220" src="{{ asset('front_end/images/app-stote.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 order-lg-2 order-1" data-aos="fade-right" data-aos-delay="300">
                <img class="img-fluid" src="{{ asset('front_end/images/img-5.png')}}" alt="">
            </div>
        </div>

    </section>
    <section class="container who-we py-5 mt-3">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-left">
                <img class="img-fluid" src="{{ asset('front_end/images/img-6.png')}}" alt="">
            </div>
            <div class="col-lg-6" data-aos="zoom-in-down" data-aos-delay="300">
                <h2 class="title-h2 h4 position-relative pb-3 font-weight-bold">إتصل بنا</h2>
                <p class="text-p">من خلال الفورم التالي يمكنك التواصل معنا او الابلاغ عن اعلانات غير ملائمة</p>
                <form class="form-signin">
                    <div class="form-label-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="الاسم الكامل" required="">
                    </div>
                    <div class="form-label-group mb-3">
                        <input type="text" class="form-control form-control-lg" placeholder="رقم الهاتف" required="">
                    </div>
                    <div class="form-label-group mb-3">
                        <input type="email" class="form-control form-control-lg" placeholder="البريد الالكتروني" required="">
                    </div>
                    <div class="form-label-group mb-3">
                        <input type="text"  class="form-control form-control-lg" placeholder="عنوان الرسالة">
                    </div>
                    <div class="form-label-group mb-3">
                        <textarea rows="4" class="form-control form-control-lg" placeholder="الرسالة"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="File1" class="btn btn-outline-primary border-moted rounded-lg py-5 w-100"><img src="{{ asset('front_end/images/iqn-cam.png')}}"class="img-fluid" alt=""></label>
                            <input type="file" class="d-none" id="File1">
                        </div>
                        <div class="col-4">
                            <label for="File2" class="btn btn-outline-primary border-moted rounded-lg py-5 w-100"><img src="{{ asset('front_end/images/iqn-cam.png')}}" class="img-fluid" alt=""></label>
                            <input type="file" class="d-none" id="File2">
                        </div>
                        <div class="col-4">
                            <label for="File3" class="btn btn-outline-primary border-moted rounded-lg py-5 w-100"><img src="{{ asset('front_end/images/iqn-cam.png')}}" class="img-fluid" alt=""></label>
                            <input type="file" class="d-none" id="File3">
                        </div>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">إرسال</button>
                </form>
            </div>
        </div>

    </section>
@endsection
