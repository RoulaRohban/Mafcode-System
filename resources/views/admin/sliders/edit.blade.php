<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('sliders.edit'))
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
            @lang('admin.edit') @lang('sliders.single') </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{ route('admin.sliders.index') }}" class="kt-subheader__breadcrumbs-link">
                @lang('sidebar.sliders') </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('admin.edit') @lang('sliders.single') </a>
        </div>
    </div>

@endsection
@section('content')
    @include('flash-message')

    <x-form-card title="sliders.edit">
        <form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.sliders.update', $slider->id) }}" id="main-form">
        @csrf
        @method('PUT')
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
                        <input type="text" class="form-control" value="{{ $slider->title }}" name="title" id="title">
                    </div>
                    <div class="form-group col-md">
                        <label for="title_en" class="form-control-label">@lang('sliders.title_en')</label>
                        <input type="text" class="form-control" value="{{ $slider->trans('title', 'en') }}" name="translations[title][1][value]" id="title_en">
                        <input type="hidden" name="translations[title][1][local]" value="en" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="caption" class="form-control-label">@lang('sliders.caption')</label>
                        <textarea class="form-control" rows="6" name="caption" id="caption">{{ $slider->caption }}</textarea>
                    </div>
                </div>
                <div class="form-group col-md">
                    <label for="caption_en" class="form-control-label">@lang('sliders.caption_en')</label>
                    <textarea class="form-control" rows="6" name="translations[caption][1][value]" id="caption_en">{{ $slider->trans('caption', 'en') }}</textarea>
                    <input type="hidden" name="translations[caption][1][local]" value="en" class="form-control">
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
    </script>
@endsection
