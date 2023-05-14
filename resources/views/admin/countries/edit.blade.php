<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('countries.edit'))
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
    <x-form-card title="countries.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.countries.update', $country->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('countries.name')</label>
                        <input type="text" name="name" value="{{ $country->name }}" id="name" class="form-control">
{{--                        @if($country->isTranslatable('name') && app()->getLocale() == 'en')--}}
{{--                            <x-translate id="name"></x-translate>--}}
{{--                        @endif--}}

                    </div>
                    <div class="form-group col-md">
                        <label for="name_en" class="form-control-label">@lang('admin.name_en')</label>
                        <input type="text" name="translations[name][1][value]" value="{{ $country->trans('name', 'en') }}" class="form-control">
                        <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
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
