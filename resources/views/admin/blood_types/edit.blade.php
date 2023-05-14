<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('blood_types.edit'))
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
    <x-form-card title="blood_types.edit">
        <form class="kt-form" method="POST" action="{{ route('admin.blood_types.update', $type->id) }}" id="main-form">
            @csrf
            @method('PUT')
            <x-form-card-body>
                <div class="row">
                    <div class="form-group col-md">
                        <label for="name" class="form-control-label">@lang('blood_types.name')</label>
                        <input type="text" name="name" value="{{ $type->name }}" id="name" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="active" class="form-control-label">@lang('blood_types.active')</label>
                        <select name="active" id="active" class="form-control">
                            <option value="yes" {{ ('yes' == $type->active) ? 'selected' : '' }}>@lang('blood_types.yes')</option>
                            <option value="no" {{ ('no' == $type->active) ? 'selected' : '' }}>@lang('blood_types.no')</option>
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
