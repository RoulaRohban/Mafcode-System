@extends('layout.default')


@section('content')
    @include('flash-message')
        <x-datatable model="{{ $model }}"></x-datatable>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection
