<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('plans.edit'))
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
            @lang('admin.edit') @lang('plans.single') </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="{{ route('admin.plans.index') }}" class="kt-subheader__breadcrumbs-link">
                @lang('sidebar.plans') </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('admin.edit') @lang('plans.single') </a>
        </div>
    </div>

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="plans.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.plans.update', $plan->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="title" class="form-control-label">@lang('plans.title')</label>
                        <input type="text" name="title" value="{{ $plan->title }}" id="title" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="price" class="form-control-label">@lang('plans.price')</label>
                        <input type="number" step="0.01" name="price" value="{{ $plan->price }}" id="price" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="days_number" class="form-control-label">@lang('plans.days_number')</label>
                        <input type="number" name="days_number" value="{{ $plan->days_number }}" id="days_number" class="form-control">
                    </div>
                </div>
            </x-form-card-body>
        </form>
    </x-form-card>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/functions.js') }}"></script>
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
