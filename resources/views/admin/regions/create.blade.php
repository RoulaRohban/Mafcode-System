<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('regions.create'))
@section('breadcrumb')
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            @lang('admin.create') @lang('regions.single') </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('sidebar.regions') </a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('admin.create') @lang('regions.single') </a>
        </div>
    </div>
@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="regions.create">
        <form class="kt-form" method="POST" action="{{ route('admin.regions.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('regions.name')</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('regions.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">@lang('regions.yes')</option>
                            <option value="no">@lang('regions.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="city_id" class="form-control-label">@lang('regions.city_id')</label>
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
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
