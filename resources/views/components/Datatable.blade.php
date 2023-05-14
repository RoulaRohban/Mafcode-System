<link href="{{ asset('plugins/custom/datatables/datatables.bundle.rtl.css') }}" rel="stylesheet"
      type="text/css"/>

<div class="row">
    <div class="col-lg-12">
        <!--begin::List Widget 3-->
        <div class="card card-custom card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bolder text-dark">@lang("sidebar.$tableName")</h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline show">
                        @if(!$withOutCreate)
                        <a href="{{ $createRoute }}" class="btn btn-primary btn-sm font-size-sm font-weight-bolder text-light-75">
                            <i class="la la-plus"></i>
                            @lang('admin.create')
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body pt-2">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>

                        @foreach($keys as $key)
                            <th>@lang("$tableName.$key")</th>
                        @endforeach

                        <th>@lang('admin.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!--end::Body-->
        </div>
        <!--end::List Widget 3-->
    </div>
</div>






@section('scripts')

    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
    <script>

        function getColumns()
        {
            let keys = {!! json_encode($keys) !!};

            let columns = [];
            keys.forEach(function(val,key){
                let object = {data : val , name : val}
                columns.push(object);
            });

            let actionObject = {
                data: 'actions',searchable: false, name: 'actions', 'render': function (data, type, row, meta) {

                    let str = `<a href="${row.edit_url}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md text-primary" data-skin="dark"
                               data-toggle="kt-tooltip" data-placement="top" title="@lang('admin.edit')"
                               data-original-title="@lang('admin.edit')">
                                <i class="la la-edit text-primary"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md text-danger"
                               onclick="event.preventDefault();deleteItem('${row.id}','${row.delete_url}')"
                               data-skin="dark" data-toggle="kt-tooltip" data-placement="top"
                               title="@lang('admin.delete')" data-original-title="@lang('admin.delete')">
                                <i class="la la-trash text-danger"></i>
                            </a>`;
                    if (typeof row.subcategory_url !== 'undefined') {
                        str = `<a href="${row.subcategory_url}"
                               class="btn btn-sm btn-clean btn-icon btn-icon-md text-success" data-skin="dark"
                               data-toggle="kt-tooltip" data-placement="top" title="@lang('admin.show')"
                               data-original-title="@lang('admin.show')">
                                <i class="la la-address-card text-primary"></i>
                            </a>` + str;
                    }
                    return str;
                }
            };

            columns.push(actionObject);

            return columns;

        }




        let url = '{!! $ajaxRoute !!}';
        @if(request()->has('parent_id') && request()->parent_id)
            url += '?parent_id={{ request()->parent_id }}';
        @endif
        let columns =  getColumns();
        $('#kt_table_1').DataTable({
            "aaSorting": [],
            processing: true,
            searchDelay: 2000,
            serverSide: true,
            ajax: url,
            columns: columns,
            order: [[0, 'desc']]
        });



        function deleteItem(id, url) {

            swal.fire({
                title: '{!! trans('admin.are_you_sure') !!}',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "{!! trans('admin.yes'); !!}",
                cancelButtonText: "{!! trans('admin.no'); !!}",
                showLoaderOnConfirm: true
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        datatype: 'JSON',
                        data: {_token: '{!! csrf_token() !!}', _method: 'delete'}
                    })
                        .done(function () {

                            swal.fire({
                                title: "{!! trans('admin.done') !!}",
                                text: "{!! trans('admin.deleted_successfully') !!}",
                                type: "success"
                            }).then((result) => {
                                // Reload the Page
                                location.reload();
                            });
                            ;
                        })
                        .fail(function (e) {
                            swal("{!! trans('admin.fail') !!}", e.responseJSON.message, "error")
                        })
                }
            });
        }
    </script>

@endsection
