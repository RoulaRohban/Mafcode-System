<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('categories.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="categories.create">
        <form class="kt-form" method="POST" action="{{ route('admin.categories.store') }}" id="main-form">
            @csrf
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('categories.name')</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('categories.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes">@lang('categories.yes')</option>
                            <option value="no">@lang('categories.no')</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="has_id" class="form-control-label">@lang('categories.has_id')</label>
                        <select name="has_id" id="has_id" class="form-control">
                            <option value="no">@lang('categories.no')</option>
                            <option value="yes">@lang('categories.yes')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="parent_id" class="form-control-label">@lang('categories.parent_id')</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">@lang('categories.no_parent')</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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

@section('scripts')
    <script>
        $('#parent_id').select2();
        $('#has_id').select2();
        $('#active').select2();
    </script>
@endsection
