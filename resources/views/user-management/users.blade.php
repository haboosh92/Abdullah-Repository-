@extends('layouts.app2')
@section('page-title')
<h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Users List </h1>
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
                        <input type="text"  id="filterInput"
                            data-kt-user-table-filter="search" class="form-control form-control-solid w-450px ps-13"
                            placeholder="Search user">
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-filter fs-2"></i> Filter
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->

                            <!--begin::Content-->
                            <form action="{{ route('filter_users') }}" method="POST">
                                @csrf
                                <div class="px-7 py-5" data-kt-user-table-filter="form">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Role </label>

                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-square-brackets ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-users-id">

                                                <select name="role" data-dropdown-parent="#select2-ars-users-id"
                                                    class="form-select rounded-start-0" data-control="select2"
                                                    data-placeholder="Select a role for users" tabindex="-1" size="3"
                                                    data-allow-clear="true"
                                                    data-dropdown-css-class="dropdown-max-height" required>
                                                    <option></option>
                                                    @if (Auth::user()->is_primary == 1)
                                                    <option value="Administrator">Administrator</option>
                                                    @endif
                                                    @if (Auth::user()->role == 'Administrator' ||
                                                    Auth::user()->is_primary == 1)
                                                    <option value="Editor">Editor</option>
                                                    @endif
                                                    <option value="Professor">Professor</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('departments_id')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->

                                    {{--
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-semibold">Role:</label>
                                        <select name="role" class="form-select form-select-solid fw-bold xselect2-hidden-accessible">
                                            <option data-select2-id="select2-data-9-5njt"></option>
                                            @if (Auth::user()->is_primary == 1)
                                            <option value="Administrator">Administrator</option>
                                            @endif
                                            @if (Auth::user()->role == 'Administrator' || Auth::user()->is_primary == 1)
                                            <option value="Editor">Editor</option>
                                            @endif
                                            <option value="Professor">Professor</option>
                                        </select>
                                    </div>
                                    <!--end::Input group--> --}}


                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                            data-kt-menu-dismiss="true"
                                            data-kt-user-table-filter="filter">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                            </form>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Filter-->

                        <!--begin::Export-->

                        <!--end::Export-->

                        <!--begin::Add user-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_add_user">
                            <i class="ki-outline ki-plus fs-2"></i> Add User
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
                                        style="width: 277.375px;">
                                        User</th>
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending"
                                        style="width: 162.4px;">
                                        Role</th>

                                    {{-- <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1"
                                            aria-label="Last login: activate to sort column ascending"
                                            style="width: 162.4px;">Last login</th>
                                             <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                            rowspan="1" colspan="1"
                                            aria-label="Two-step : activate to sort column ascending"
                                            style="width: 162.4px;">Two-step </th>
                                        --}}
                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1" aria-label="Status : activate to sort column ascending"
                                        style="width: 162.4px;">
                                        Status </th>

                                    <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                        rowspan="1" colspan="1"
                                        aria-label="Joined Date: activate to sort column ascending"
                                        style="width: 209.95px;">Joined Date</th>

                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 130.475px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">


                                @foreach ($users as $user)
                                <tr class="even" id="row-{{ $user->id }}">
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                                class="rounded-full h-20 w-20 object-cover">
                                            {{-- <a href="#">
                                                            <div class="symbol-label fs-3 bg-light-danger text-danger">
                                                                {{ $user->name }}
                                        </div>
                                        </a> --}}
                    </div>
                    <!--end::Avatar-->
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">
                            {{ $user->name }}
                        </a>
                        <span> {{ $user->email }}</span>
                    </div>
                    <!--begin::User details-->
                    </td>
                    <td>
                        {{ $user->role }}
                    </td>
                    <td>
                        <div id="en_{{ $user->id }}"
                            class="badge badge-light-success fw-bold @if ($user->status == 1) d-none @endif">
                            Enabled</div>

                        <div id="dis_{{ $user->id }}"
                            class="badge badge-light-danger fw-bold @if ($user->status == 0) d-none @endif">
                            Disabled</div>

                    </td>
                    <td data-order=" {{ $user->updated_at }}">
                        <div class="badge badge-light fw-bold"> {{ $user->updated_at }}</div>
                    </td>
                    <td class="text-end">
                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            Actions
                            <i class="ki-outline ki-down fs-5 ms-1"></i> </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 ars_modal_edit_user" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" data-email="{{ $user->email }}"
                                    data-role="{{ $user->role }}" data-bs-toggle="modal"
                                    data-bs-target="#ars_modal_edit_user">
                                    Edit
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" id="btn-en_{{ $user->id }}"
                                    class="menu-link px-3 kt_modal_enabled_user @if ($user->status == 0) d-none @endif"
                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-status="0"
                                    data-title="Enabled" data-url="{{ route('ESuser') }}" data-bs-toggle="modalxx"
                                    data-bs-target="#kt_modal_enabled_userxx">
                                    Enabled
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" id="btn-dis_{{ $user->id }}"
                                    class="menu-link px-3 kt_modal_enabled_user @if ($user->status == 1) d-none @endif"
                                    data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-status="1"
                                    data-title="Disabled" data-url="{{ route('DSuser') }}" data-bs-toggle="modalxx"
                                    data-bs-target="#kt_modal_enabled_userxx">
                                    Disabled
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3 kt_modal_delete_user" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" data-status="{{ $user->status }}"
                                    data-title="Disabled User" data-url="{{ route('duser') }}" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_delete_user">
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


@include('user-management.modal.add')
@include('user-management.modal.edit')
@include('user-management.modal.enabled')
@endsection
@section('javascript')
<script src="{{ asset('assets/js/custom/apps/user-management/users/enabled-user.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/users/delete-user.js') }}"></script>
<script src="{{ asset('assets/js/custom/apps/user-management/users/edit-user.js') }}"></script>
@endsection