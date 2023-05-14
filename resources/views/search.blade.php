@extends('layout.default')
@section('title',trans('admin.search'))
@section('breadcrumb')
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            @lang('admin.search')</h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="{{ route('home') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>

            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="#" class="kt-subheader__breadcrumbs-link">
                @lang('admin.search') </a>

            <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
        </div>
    </div>
@endsection
@section('styles')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    @lang('admin.search')
                </h3>
            </div>
        </div>

        <!--begin::Form-->

        <div class="kt-portlet__body">

            <!--begin: Datatable -->

            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('advertisers.name')</th>
                    <th>@lang('admin.type')</th>
                    <th>@lang('admin.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($searchResults->groupByType() as $type => $modelSearchResults)
                    @foreach($modelSearchResults as $searchResult)
                        <tr>
                            <td>{{ $searchResult->searchable->id }}</td>
                            <td><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></td>
                            <td>
                                @if($type == 'agencies')
                                    <span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">@lang('agencies.single')</span>
                                @elseif($type == 'advertisers')
                                    @if($searchResult->searchable->is_direct == 'no')
                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">@lang('advertisers.single')</span>
                                    @else
                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-dark">@lang('advertisers.directClient')</span>
                                    @endif
                                @elseif($type == 'brands')
                                    <span class="btn btn-bold btn-sm btn-font-sm  btn-label-primary">@lang('brands.single')</span>
                                @elseif($type == 'contacts')
                                    <span class="btn btn-bold btn-sm btn-font-sm  btn-label-warning">@lang('contacts.single')</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ $searchResult->url }}" target="_blank" class="btn btn-sm btn-clean btn-icon btn-icon-md text-primary" data-skin="dark" data-toggle="kt-tooltip" data-placement="top" title="Edit" data-original-title="Edit">
                                    <i class="la la-edit text-primary"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>


            <!--end: Datatable -->
        </div>
        <!--end::Form-->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#kt_table_1').DataTable({
            processing: true,
            order: [[2, 'asc']],
            columnDefs: [
                {
                    targets: 0,
                    width: '20px',
                }, {
                    targets: -1,
                    orderable: false,
                    width: '75px',
                },
            ]

        });
    </script>
@endsection
