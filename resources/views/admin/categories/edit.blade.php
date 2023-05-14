<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('categories.edit'))
@section('styles')
    <style type="text/css">
        .highlighted {
            background-color: #ffff99!important;
            transition:background-color 0.1s ease;
        }
    </style>
@endsection
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <x-form-card title="categories.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.categories.update', $category->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('categories.name')</label>
                        <input type="text" name="name" value="{{ $category->name }}" id="name" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="{{ $category->trans('name', 'en') }}" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                    </div>
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('categories.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes" {{ ('yes' == $category->active) ? 'selected' : '' }}>@lang('categories.yes')</option>
                            <option value="no" {{ ('no' == $category->active) ? 'selected' : '' }}>@lang('categories.no')</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="parent_id" class="form-control-label">@lang('categories.parent_id')</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="">@lang('categories.no_parent')</option>
                            @foreach($categories as $category)
                                <option value='{{ $category->id }}' {{ ($category->id == $category->parent_id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="has_id" class="form-control-label">@lang('categories.has_id')</label>
                        <select name="has_id" id="has_id" class="form-control">
                            <option value="no" {{ 'no' == $category->has_id ? 'selected' : '' }}>@lang('categories.no')</option>
                            <option value="yes" {{ 'yes' == $category->has_id ? 'selected' : '' }}>@lang('categories.yes')</option>
                        </select>
                    </div>
                </div>
            </x-form-card-body>
        </form>
    </x-form-card>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script type="text/javascript">
        $('#parent_id').select2();
        $('#has_id').select2();
        $('#active').select2();
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
