<?php //dd($errors) ?>
@extends('layout.default')


@section('title',trans('products.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="products.create">
        <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('admin.products.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                <div class="form-group col-md">
                    <label for="name" class="form-control-label">@lang('products.name')</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group col-md">
                    <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                    <input type="text" name="translations[name][1][value]" value="" class="form-control">
                    <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                </div>
                <div class="form-group col-md">
                    <label for="price" class="form-control-label">@lang('products.price')</label>
                    <input class="form-control" name="price" type="number" step="0.01" id="price" min="0">
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="price" class="form-control-label">@lang('products.image')</label>
                        <input class="form-control" name="image" type="file" id="image">
                    </div>
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('products.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">@lang('products.yes')</option>
                            <option value="no">@lang('products.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="taxable" class="form-control-label">@lang('products.taxable')</label>
                        <select name="taxable" id="taxable" class="form-control">
                            <option value="1">@lang('products.yes')</option>
                            <option value="0">@lang('products.no')</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="description" class="form-control-label">@lang('products.description')</label>
                        <textarea class="form-control" rows="6" name="description" id="description"></textarea>
                    </div>
                    <div class="form-group col-md">
                        <label for="description_en" class="form-control-label">@lang('admin.description_en')</label>
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
