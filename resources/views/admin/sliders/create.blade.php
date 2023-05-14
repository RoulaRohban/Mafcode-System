@extends('layout.default')


@section('content')
    @include('flash-message')

    <div class="row">
        <div class="col-lg-12">
            <!--begin::List Widget 3-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0">
                    <h3 class="card-title font-weight-bolder text-dark">@lang('admin.create') @lang('sliders.single')</h3>

                </div>
                <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.sliders.store') }}" id="main-form">
                @csrf
                <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-2">
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label"></label>
                            <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url('{{ $slider->image->image_url ?? asset('media/sliders/blank.png') }}')">
                                <div class="image-input-wrapper"></div>
                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="profile_avatar_remove">
                                </label>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="title" class="form-control-label">@lang('sliders.title')</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group col-md">
                                <label for="title_en" class="form-control-label">@lang('sliders.title_en')</label>
                                <input type="text" class="form-control" name="translations[title][1][value]" id="title_en">
                                <input type="hidden" name="translations[title][1][local]" value="en" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md">
                                <label for="caption" class="form-control-label">@lang('sliders.caption')</label>
                                <textarea class="form-control" rows="6" name="caption" id="caption"></textarea>
                            </div>
                            <div class="form-group col-md">
                                <label for="caption_en" class="form-control-label">@lang('sliders.caption_en')</label>
                                <textarea class="form-control" rows="6" name="translations[caption][1][value]" id="caption_en"></textarea>
                                <input type="hidden" name="translations[caption][1][local]" value="en" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button onclick="submitForm('#main-form')" id="submit-button"
                                class="btn btn-primary">@lang('admin.save')</button>
                        <button type="reset" onclick="" class="btn btn-secondary">@lang('admin.close')</button>
                    </div>
                </form>
                <!--end::Body-->
            </div>
            <!--end::List Widget 3-->
        </div>
    </div>



@endsection

@section('styles')
    <style type="text/css">
        .kt-notification .kt-notification__item:after {
            display: none;
        }
    </style>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/custom/user/edit-user.js?v=7.1.5') }}"></script>
    <script>
        function getCities() {
            let country_id = $('#country_id').val();
            let url = '{{ route('admin.countries.get.cities') }}';
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                data: {_token: '{{ csrf_token() }}', country_id: country_id}
            }).done(function (data) {
                $('#region').addClass('d-none');
                $('#city').addClass('d-none');
                $('#city_id').html('');
                if (data) {
                    $('#city').removeClass('d-none');
                    $('#city_id').html(data);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }

        function getRegions() {
            let city_id = $('#city_id').val();
            let url = '{{ route('admin.cities.get.regions') }}';
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                data: {_token: '{{ csrf_token() }}', city_id: city_id}
            }).done(function (data) {
                $('#region').addClass('d-none');
                $('#region_id').html('');
                if (data) {
                    $('#region').removeClass('d-none');
                    $('#region_id').html(data);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }
    </script>
@endsection
