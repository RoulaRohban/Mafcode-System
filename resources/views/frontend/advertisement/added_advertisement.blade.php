@extends('frontend.layout.app')
@section('title','إضافة إعلان')
@section('content')
    <section class="adds py-5 position-relative">
    <div class="container">
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
        <nav class="text-center" aria-label="Page navigation example">
            {{ $advertisements->links() }}
{{--            <ul class="pagination d-inline-flex">--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link border-0 px-2" href="#" aria-label="Previous">--}}
{{--                        <i class="fas fa-angle-right"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="page-item"><a class="page-link border-0 px-2" href="#">9</a></li>--}}
{{--                <li class="page-item"><span class="border-0 px-0" >....</span></li>--}}
{{--                <li class="page-item"><a class="page-link border-0 px-2" href="#">4</a></li>--}}
{{--                <li class="page-item"><a class="page-link border-0 px-2" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link border-0 px-2" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link border-0 px-2" href="#">1</a></li>--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link border-0 px-2" href="#" aria-label="Next">--}}
{{--                        <i class="fas fa-angle-left"></i>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
        </nav>
    </div>
</section>
@endsection
