@extends('layout.default')
@section('title', trans('sidebar.orders'))
@section('breadcrumb')
    <x-breadcrumb model="{{ $model }}"></x-breadcrumb>
@endsection
@section('content')
    @include('flash-message')


    <x-datatable model="{{ $model }}" withOutCreate="true"></x-datatable>

@endsection

