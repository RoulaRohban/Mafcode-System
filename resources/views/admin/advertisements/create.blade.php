<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('advertisements.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="advertisements.create">
        <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.advertisements.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="form-group row">
                    <label class="col-xl-5 col-lg-3 col-form-label"></label>
                    <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url('{{ $user->image->image_url ?? asset('media/users/blank.png') }}')">
                        <div class="image-input-wrapper"></div>
                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="profile_avatar_remove">
                        </label>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i></span>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i></span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="type" class="form-control-label">@lang('advertisements.type')</label>
                        <select name="type" id="type" class="form-control">
                            <option value="found">@lang('advertisements.found')</option>
                            <option value="lost">@lang('advertisements.lost')</option>
                            <option value="need">@lang('advertisements.need')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="title" class="form-control-label">@lang('advertisements.title')</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group col-md">
                        <label for="title_en" class="form-control-label">@lang('advertisements.title_en')</label>
                        <input type="text" name="translations[title][1][value]" value="" class="form-control">
                        <input type="hidden" name="translations[title][1][local]" value="en" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('advertisements.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">@lang('advertisements.yes')</option>
                            <option value="no">@lang('advertisements.no')</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="user_id" class="form-control-label">@lang('advertisements.user_id')</label>
                        <select name="user_id" id="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->email }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="category_id" class="form-control-label">@lang('advertisements.category_id')</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="status" class="form-control-label">@lang('advertisements.status')</label>
                        <select name="status" id="status" class="form-control">
                            <option value="found">@lang('advertisements.found')</option>
                            <option value="not_found">@lang('advertisements.not_found')</option>
                        </select>
                    </div>
{{--                    <div class="form-group col-md">--}}
{{--                        <label for="image" class="form-control-label">@lang('advertisements.image')</label>--}}
{{--                        <input class="form-control" name="image" type="file" id="image">--}}
{{--                    </div>--}}
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="location" class="form-control-label">@lang('advertisements.country')</label>
                        <select name="country_id" id="country_id" onchange="getCities()" class="form-control">
                            <option value="">@lang('advertisements.select_country')</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md d-none" id="city">
                        <label for="location" class="form-control-label">@lang('advertisements.city')</label>
                        <select name="city_id" id="city_id" onchange="getRegions('region')" class="form-control">
                            <option value="">@lang('advertisements.select_city')</option>

                        </select>
                    </div>
                    <div class="form-group col-md d-none" id="region">
                        <label for="location" class="form-control-label">@lang('advertisements.region')</label>
                        <select name="region_id" id="region_id" class="form-control">
                            <option value="">@lang('advertisements.select_region')</option>

                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="description" class="form-control-label">@lang('advertisements.description')</label>
                        <textarea class="form-control" rows="6" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group col-md">
                        <label for="description_en" class="form-control-label">@lang('advertisements.description_en')</label>
                        <textarea class="form-control" rows="6" name="translations[description][1][value]" id="description_en"></textarea>
                        <input type="hidden" name="translations[description][1][local]" value="en" class="form-control">
                    </div>
                </div>
            </x-form-card-body>
        </form>
    </x-form-card>
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
