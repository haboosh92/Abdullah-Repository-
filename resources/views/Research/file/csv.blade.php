@extends('layouts.app2')
@section('page-title')
    <h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Files List </h1>
    <ul class="breadcrumb fw-semibold fs-8 my-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ route('files') }}" class="text-muted text-hover-primary">
                Files </a>
        </li>

        <li class="breadcrumb-item text-muted">
            Department: {{ $file->department->name }} - Yera: {{ $file->name }}
        </li>

    </ul>
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
                             <input type="text" id="filterInput"
                                data-kt-user-table-filter="search" class="form-control form-control-solid w-450px ps-13"
                                placeholder="Search file">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">


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

                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="" style="width: 29.9px;">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                #
                                            </div>
                                        </th>

                                        @foreach ($csvHeader as $columnName)
                                            <th class="min-w-125px sorting fs-2" tabindex="0"
                                                aria-controls="kt_table_users" rowspan="1" colspan="1"
                                                aria-label="User: activate to sort column ascending"
                                                style="width: 277.375px;">
                                                {{ $columnName }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">

                                    @foreach ($csvData as $i => $row)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    {{ $i + 1 }}
                                                </div>
                                            </td>
                                            @if (!empty(array_filter($row)))
                                                @foreach ($row as $value)
                                                    <td>{{ $value }}</td>
                                                @endforeach
                                            @else
                                            @break
                                        @endif
                                    </tr>
                                @endforeach
                                {{-- @foreach ($csvData as $i => $row)
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                {{ $i + 1 }}
                    </div>
                    </td>

                    @foreach ($row as $index2 => $value)
                    <tr class="even" id="row-{{ $i}}">


                        <td>
                            {{ $value }}
                        </td>
                    </tr>
                    @endforeach
                    @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">

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
