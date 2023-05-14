<?php //dd($errors) ?>
@extends('layout.default')


@section('title',trans('cities.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')

    <x-form-card title="cities.create">
        <form class="kt-form" method="POST" action="{{ route('admin.cities.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('cities.name')</label>
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
                        <label for="active" class="form-control-label">@lang('cities.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">@lang('cities.yes')</option>
                            <option value="no">@lang('cities.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="country_id" class="form-control-label">@lang('cities.country_id')</label>
                        <select name="country_id" id="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
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
