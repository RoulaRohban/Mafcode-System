<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('cities.edit'))
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
    <x-form-card title="cities.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.cities.update', $city->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('cities.name')</label>
                        <input type="text" name="name" value="{{ $city->name }}" id="name" class="form-control">
{{--                        @if($city->isTranslatable('name') && app()->getLocale() == 'en')--}}
{{--                            <x-translate id="name"></x-translate>--}}
{{--                        @endif--}}
                    </div>
                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="{{ $city->trans('name', 'en') }}" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="active" class="form-control-label">@lang('cities.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes" {{ ('yes' == $city->active) ? 'selected' : '' }}>@lang('cities.yes')</option>
                            <option value="no" {{ ('no' == $city->active) ? 'selected' : '' }}>@lang('cities.no')</option>
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label for="country_id" class="form-control-label">@lang('cities.country_id')</label>
                        <select name="country_id" id="country_id" class="form-control">
                            @foreach($countries as $country)
                                <option value='{{ $country->id }}' {{ ($country->id == $city->country_id) ? 'selected' : '' }}>
                                    {{ $country->name }}
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
