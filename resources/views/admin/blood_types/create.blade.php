<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('blood_types.create'))
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
   <x-form-card title="blood_types.create">
       <form class="kt-form" method="POST" action="{{ route('admin.blood_types.store') }}" id="main-form">
           @csrf
          <x-form-card-body>
              <div class="row">
                  <div class="form-group col-md">
                      <label for="name" class="form-control-label">@lang('blood_types.name')</label>
                      <input type="text" name="name" id="name" class="form-control">
                  </div>
                  <div class="form-group col-md">
                      <label for="active" class="form-control-label">@lang('blood_types.active')</label>
                      <select name="active" id="active" class="form-control">
                          <option value="yes">@lang('blood_types.yes')</option>
                          <option value="no">@lang('blood_types.no')</option>
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
