<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('countries.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="countries.create">
        <form class="kt-form" method="POST" action="{{ route('admin.countries.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('countries.name')</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
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
