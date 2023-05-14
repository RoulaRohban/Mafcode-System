<?php //dd($errors) ?>
@extends('layout.default')


@section('title',trans('settings.edit'))
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
    <x-form-card title="admin.settings">
        <form class="kt-form kt-form--fit kt-form--label-right" method="POST" action="{{ route('admin.settings.update', $setting->id) }}" id="main-form">
            @csrf
            @method('PUT')

            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="value" class="form-control-label">@lang('settings.value')</label>
                        <textarea class="form-control" rows="6" name="value" id="value">{{ $setting->value }}</textarea>
                    </div>
                    @if($setting->key != "vat_value")
                    <div class="form-group col-md">
                        <label for="value_en" class="form-control-label">@lang('settings.value_en')</label>
                        <textarea class="form-control" rows="6" name="translations[value][1][value]" id="value_en">{{ $setting->trans('value', 'en') }}</textarea>
                        <input type="hidden" name="translations[value][1][local]" value="en" class="form-control">
                    </div>
                    @endif
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
