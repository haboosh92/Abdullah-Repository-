@extends('layouts.app2')
@section('page-title')


<h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Department List </h1>
<!-- @if (session('success'))
<script>
$(document).ready(function() {
    toastr.success('{{ session('
        title ') }}', '{{ session('
        success ') }}');
});
</script>
@endif -->
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
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i> <input type="text"
                            data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13"
                            placeholder="Search Department">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">


                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ars_modal_add_Department">
                            <i class="ki-outline ki-plus fs-2"></i> Add Department
                        </button>
                        <!--end::Add user-->
                    </div>
                    <!--end::Toolbar-->

                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none"
                        data-kt-user-table-toolbar="selected">
                        <div class="fw-bold me-5">
                            <span class="me-2" data-kt-user-table-select="selected_count"></span> Selected
                        </div>

                        <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
                            Delete Selected
                        </button>
                    </div>
                    <!--end::Group actions-->


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
                            id="kt_table_users">
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
                                        style="width: 277.375px;">
                                        Name</th>


                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1"
                                        aria-label="Joined Date: activate to sort column ascending"
                                        style="width: 209.95px;">Joined Date</th>

                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 130.475px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">


                                @foreach ($Departments as $i => $depart)
                                <tr class="even" id="row-{{ $depart->id }}">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            {{ $i + 1 }}
                                        </div>
                                    </td>

                                    <td>
                                        {{ $depart->name }}
                                    </td>

                                    <td data-order=" {{ $depart->updated_at }}">
                                        <div class="badge badge-light fw-bold"> {{ $depart->updated_at }}</div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-outline ki-down fs-5 ms-1"></i> </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 ars_modal_edit_Department"
                                                    data-bs-toggle="modal" data-bs-target="#ars_modal_edit_Department"
                                                    data-id="{{ $depart->id }}" data-name="{{ $depart->name }}"
                                                    data-url="{{ route('edepart') }}">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->



                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 ars_modal_delete"
                                                    data-id="{{ $depart->id }}" data-name="{{ $depart->name }}"
                                                    data-url="{{ route('delete_depart') }}">
                                                    Delete
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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


@include('department.modal.add')
@include('department.modal.edit')
@endsection
@section('javascript')
<script src="{{ asset('assets/js/custom/apps/department/edit.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/department/delete.js') }}"></script>
@endsection