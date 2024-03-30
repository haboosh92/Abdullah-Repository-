@extends('layouts.app2')
@section('page-title')
<h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Requests List </h1>



@if (session('success'))
<script>
$(document).ready(function() {
    toastr.success('{{ session('
        success ') }}', '{{ session('
        title ') }}');
});
</script>
@endif




@if (session('error'))
<script>
$(document).ready(function() {
    toastr.error('{{ session('
        error ') }}', '{{ session('
        title ') }}');
});
</script>
@endif
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Container-->
    <div class=" container-xxl " id="kt_content_container">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                        <input type="text" id="filterInput" data-kt-user-table-filter="search"
                            class="form-control form-control-solid w-450px ps-13" placeholder="Search requsests">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">


                    <!--begin::Modal - Add task-->

                    <!--end::Modal - Add task-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body py-4">

                <!--begin::Table-->
                <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="myTable">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                        style="width: 29.9px;">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_table_users .form-check-input" value="1">
                                        </div>
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 45%;">
                                        Research Name
                                    </th>


                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 35%;">
                                        Auther Name
                                    </th>


                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="User: activate to sort column ascending"
                                        style="width: 10%;">
                                        Request Status
                                    </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1"
                                        aria-label="Joined Date: activate to sort column ascending" style="width: 10%;">
                                        Joined Date</th>

                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($requests as $i => $row)
                                <tr class="even" id="row-{{ $row->id }}">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ $i + 1 }}
                                        </div>
                                    </td>

                                    <td>
                                        <a href="{{ route('rmetadata', ['id' => $row->id]) }}">
                                            {{ $row->Research->title }}</a>
                                    </td>
                                    <td>

                                        <div class="d-flex flex-column">
                                            <a href="#" class="text-gray-800 text-hover-primary mb-1">
                                                {{ $row->User->name }}
                                            </a>
                                            <span>email: {{ $row->User->email }}</span>
                                        </div>
                                    </td>


                                    <td>
                                        @if($row->status==0)
                                        <div class="badge badge-light-warning  fw-bold">In process</div>
                                        @elseif($row->status==1)
                                        <div class="badge badge-light-success fw-bold">Accepted</div>
                                        @elseif($row->status==2)
                                        <div class="badge badge-light-danger  fw-bold">Rejected</div>
                                        @endif
                                    </td>


                                    <td data-order=" {{ $row->updated_at }}">
                                        <div class="badge badge-light fw-bold"> {{ $row->updated_at }}</div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            {{-- <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled"
                                            id="kt_table_users_previous">
                                            <a href="#" aria-controls="kt_table_users" data-dt-idx="0"
                                                tabindex="0" class="page-link"><i class="previous"></i></a>
                                        </li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="2" tabindex="0"
                                                class="page-link">2</a></li>
                                        <li class="paginate_button page-item "><a href="#"
                                                aria-controls="kt_table_users" data-dt-idx="3" tabindex="0"
                                                class="page-link">3</a></li>
                                        <li class="paginate_button page-item next" id="kt_table_users_next"><a
                                                href="#" aria-controls="kt_table_users" data-dt-idx="4"
                                                tabindex="0" class="page-link"><i class="next"></i></a></li>
                                    </ul>
                                </div> --}}
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>

@endsection
@section('javascript')
<script src="{{ asset('assets/js/custom/apps/Research/file/edit.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/Research/file/delete.js') }}"></script>
@endsection