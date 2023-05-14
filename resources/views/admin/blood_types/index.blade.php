@extends('layout.default')
@section('title', trans('sidebar.blood_types'))
@section('breadcrumb')
    <x-breadcrumb model="{{ $model }}"></x-breadcrumb>
@endsection
@section('content')
    @include('flash-message')


    <x-datatable model="{{ $model }}"></x-datatable>

@endsection

