<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('users.show'))
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
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{ route('admin.users.index') }}" class="kt-subheader__breadcrumbs-link">
                @lang('sidebar.users') </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
        </div>
    </div>

@endsection
@section('content')
    @include('flash-message')

    <x-form-card title="users.single">
    <div class="row">
        <div class="col-xl-10">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="card-body pt-2">@lang('users.personal_info')</h3>
                    </div>
                </div>
                <form class="kt-form">
                    <div class="kt-portlet__body">
                        <div class="card-body pt-2">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">@lang('users.customer_info')</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.image')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                            <img src="{{ $user->image->image_url ?? asset('media/users/blank.png') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.first_name')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" name="first_name" value="{{ $user->first_name }}" id="first_name" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.last_name')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" name="last_name" value="{{ $user->last_name }}" id="last_name" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.username')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="text" name="username" value="{{ $user->username }}" id="username" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">@lang('users.contact_info')</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.phone')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                            <input class="form-control" name="phone" value="{{ $user->phone }}" type="text" id="phone" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.email')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.role')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Role" value="{{ $user->role }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('users.active')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Active" value="{{ $user->active }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
    </script>
@endsection