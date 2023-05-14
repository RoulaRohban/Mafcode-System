<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('regions.edit'))
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
    <x-form-card title="regions.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.regions.update', $region->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('regions.name')</label>
                        <input type="text" name="name" value="{{ $region->name }}" id="name" class="form-control">
                    </div>

                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="{{ $region->trans('name', 'en') }}" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('regions.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes" {{ ('yes' == $region->active) ? 'selected' : '' }}>@lang('regions.yes')</option>
                            <option value="no" {{ ('no' == $region->active) ? 'selected' : '' }}>@lang('regions.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="city_id" class="form-control-label">@lang('regions.city_id')</label>
                        <select name="city_id" id="city_id" class="form-control">
                            @foreach($cities as $city)
                                <option value='{{ $city->id }}' {{ ($city->id == $region->city_id) ? 'selected' : '' }}>
                                    {{ $city->name }}
                                </option>
                            @endforeach
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
