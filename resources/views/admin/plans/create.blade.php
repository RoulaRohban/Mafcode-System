<?php //dd($errors) ?>
@extends('layout.default')


@section('title',trans('plans.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="plans.create">
        <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.plans.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="title" class="form-control-label">@lang('plans.title')</label>
                        <input class="form-control" name="title" type="text" id="title">
                    </div>
                    <div class="form-group col-md">
                        <label for="title_en" class="form-control-label">@lang('plans.title_en')</label>
                        <input type="text" name="translations[title][1][value]" value="" class="form-control">
                        <input type="hidden" name="translations[title][1][local]" value="en" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="price" class="form-control-label">@lang('plans.price')</label>
                        <input class="form-control" name="price" type="number" step="0.01" id="price" min="0">
                    </div>
                    <div class="form-group col-md">
                        <label for="days_number" class="form-control-label">@lang('plans.days_number')</label>
                        <input class="form-control" name="days_number" type="number" id="days_number" min="0">
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
