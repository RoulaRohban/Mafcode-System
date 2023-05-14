<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('users.edit'))
@section('styles')
    <style type="text/css">
        .highlighted {
            background-color: #ffff99!important;
            transition:background-color 0.1s ease;
        }
    </style>
@endsection
@section('breadcrumb')
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            @lang('admin.edit') @lang('users.single') </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
                @lang('sidebar.users') </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('admin.edit') @lang('users.single') </a>
        </div>
    </div>

@endsection
@section('content')
    @include('flash-message')

    <x-form-card title="users.edit">
        <form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update', $user->id) }}" id="main-form">
        @csrf
        @method('PUT')
        <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
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
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="first_name" class="form-control-label">@lang('users.first_name')</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" id="first_name" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="last_name" class="form-control-label">@lang('users.last_name')</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" id="last_name" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="username" class="form-control-label">@lang('users.username')</label>
                        <input type="text" name="username" value="{{ $user->username }}" id="username" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="email" class="form-control-label">@lang('users.email')</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="password" class="form-control-label">@lang('users.password')</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="password_confirmation" class="form-control-label">@lang('users.password_confirmation')</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="role" class="form-control-label">@lang('users.role')</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin" {{ ('admin' == $user->role) ? 'selected' : '' }}>@lang('users.admin')</option>
                            <option value="client" {{ ('client' == $user->role) ? 'selected' : '' }}>@lang('users.client')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('users.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes" {{ ('yes' == $user->active) ? 'selected' : '' }}>@lang('users.yes')</option>
                            <option value="no" {{ ('no' == $user->active) ? 'selected' : '' }}>@lang('users.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="phone" class="form-control-label">@lang('users.phone')</label>
                        <input class="form-control" name="phone" value="{{ $user->phone }}" type="text" id="phone">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="location" class="form-control-label">@lang('users.country')</label>
                        <select name="country_id" id="country_id" onchange="getCities()" class="form-control">
                            <option value="">@lang('users.select_country')</option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md d-none" id="city">
                        <label for="location" class="form-control-label">@lang('users.city')</label>
                        <select name="city_id" id="city_id" onchange="getRegions('region')" class="form-control">
                            <option value="">@lang('users.select_country')</option>

                        </select>
                    </div>
                    <div class="form-group col-md d-none" id="region">
                        <label for="location" class="form-control-label">@lang('users.region')</label>
                        <select name="region_id" id="region_id" class="form-control">
                            <option value="">@lang('users.select_country')</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button onclick="submitForm('#main-form')" id="submit-button" class="btn btn-primary">@lang('admin.save')</button>
                <button type="reset" onclick=""
                        class="btn btn-secondary">@lang('admin.close')</button>
            </div>
        </form>
    </x-form-card>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="{{ asset('js/pages/custom/user/edit-user.js?v=7.1.5') }}"></script>
    <script type="text/javascript">
        function submitForm (id) {
            $('#submit-button').attr('disabled', '');
            $('#submit-button').attr('onclick', '');
            $('#submit-button').addClass('kt-spinner');
            $('#submit-button').addClass('kt-spinner--right');
            $('#submit-button').addClass(' kt-spinner--md');
            $('#submit-button').addClass('kt-spinner--light');
            $(id).submit();
        }

        $(document).ready(() => {
            setLocation();
        })

        function setLocation() {
            $('#country_id').val({{ $user->getLocation()['country']->id ?? null }});

            @if($user->getLocation()['region'] !== null)
                getCities('{{ $user->getLocation()['city']->id }}');
                getRegions('{{ $user->getLocation()['region']->id }}', city_id);
            @elseif($user->getLocation()['city'] !== null)
                getCities('{{ $user->getLocation()['city']->id }}');
            @endif
        }

        function getCities(selected_id) {
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
                    $('#city_id').val(selected_id);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }

        function getRegions(selected_id) {
            let city_id = 0
            if ($('#city_id').val())
                city_id = $('#city_id').val();
            else
                city_id = '{{ $user->getLocation()['city']->id ?? null }}';
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
                    $('#region_id').val(selected_id);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }
    </script>
@endsection
