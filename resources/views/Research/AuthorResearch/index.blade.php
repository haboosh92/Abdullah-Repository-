@extends('layouts.app2')
@section('page-title')
    <h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> My Research List </h1>

    @if (!empty($fileInfo))
        <ul class="breadcrumb fw-semibold fs-8 my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('research') }}" class="text-muted text-hover-primary">
                    Research </a>
            </li>

            <li class="breadcrumb-item text-muted">
                Department: {{ $fileInfo->department->name }} - Yera: {{ $fileInfo->YearResearch->name }}
            </li>

        </ul>
    @endif


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
                    <div class="card-title" style="width: 75%;">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1" style="width: 100%;">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text" id="filterInput" data-kt-user-table-filter="search"
                                class="form-control form-control-solid xw-450px ps-13" style="width: 100%;"
                                placeholder="Search Research ">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar" style="xwidth: 20%;">


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
                                <form action="{{ route('myresearch') }}" method="POST">
                                    @csrf
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">


                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="required fw-semibold fs-6 mb-2">Department Name </label>



                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">
                                                    <i class="ki-duotone ki-square-brackets ">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </span>
                                                <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id">

                                                    {{-- <select name="departments_id" data-dropdown-parent="#select2-ars-departments_id"
                                            class="form-select rounded-start-0" data-control="select2"
                                            data-hide-search="true" data-placeholder="Select a Department Name"
                                            tabindex="99" aria-hidden="true" data-kt-initialized="1"> --}}

                                                    <select name="departments_id"
                                                        data-dropdown-parent="#select2-ars-departments_id"
                                                        class="form-select rounded-start-0" data-control="select2"
                                                        data-placeholder="Select a department name" tabindex="-1"
                                                        size="3" data-allow-clear="true"
                                                        data-dropdown-css-class="dropdown-max-height" required>
                                                        <option></option>
                                                        @foreach ($Departments as $Department)
                                                            <option value="{{ $Department->id }}">{{ $Department->name }}
                                                            </option>
                                                        @endforeach
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







                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="required fw-semibold fs-6 mb-2">Year of research </label>



                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text">
                                                    <i class="ki-duotone ki-square-brackets">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                        <span class="path4"></span>
                                                    </i>
                                                </span>
                                                <div class="overflow-hidden flex-grow-1" id="select2-ars-name">


                                                    <select name="year_research_id" data-dropdown-parent="#select2-ars-name"
                                                        class="form-select rounded-start-0" data-control="select2"
                                                        data-placeholder="Select a year of research" tabindex="-1"
                                                        size="3" data-allow-clear="true"
                                                        data-dropdown-css-class="dropdown-max-height" required>
                                                        <option></option>
                                                        @foreach ($YearResearch as $row)
                                                            <option value="{{ $row->id }}">
                                                                {{ $row->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                                @error('name')
                                                    <strong>{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Input group-->







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
                            <table  class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                id="myTable">
                                <thead>
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="" style="width: 29.9px;">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                    data-kt-check-target="#kt_table_users .form-check-input"
                                                    value="1">
                                            </div>
                                        </th>
                                        <th class="min-w-125px sorting" style="width: 40%;" tabindex="0"
                                            aria-controls="kt_table_users" rowspan="1" colspan="1"
                                            aria-label="User: activate to sort column ascending">
                                            Researcher's title</th>


                                        <th class="min-w-125px sorting align-items-center text-center" style="width: 40%;"
                                            tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1"
                                            aria-label="User: activate to sort column ascending">
                                            Researcher's name</th>


                                        <th class="min-w-125px sorting text-center" style="width: 10%;" tabindex="0"
                                            aria-controls="kt_table_users" rowspan="1" colspan="1"
                                            aria-label="Joined Date: activate to sort column ascending">Joined Date</th>

                                        <th class="text-center min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Actions" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 fw-semibold">

                                    @foreach ($file as $i => $research)
                                        <tr class="even" id="row-{{ $research->id }}">
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    {{ $i + 1 }}
                                                </div>
                                            </td>

                                            <td class="d-flex align-items-center">

                                                <!--begin::User details-->
                                                <div class="d-flex flex-column">
                                                    <a href="{{ route('metadata', ['id' => $research->id]) }}"
                                                        class="text-gray-800 text-hover-primary mb-1"
                                                        id="research_id-{{ $research->id }}">
                                                        {{ $research->title }}
                                                    </a> <span> {{ $research->type }}</span>
                                                </div>
                                                <!--begin::User details-->
                                            </td>

                                            <td class="align-items-center text-center">
                                                @foreach ($research->scientificResearch as $scientificResearch)
                                                    {{-- {{ $researcherInformation = $scientificResearch->researcherInformation; }}
                                        --}}

                                                    <!--begin::User details-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-gray-800 text-hover-primary mb-1 fs-4">
                                                            @if (!empty( $scientificResearch->researcherInformation->scientificTitle))
                                                    
                                                            {{$scientificTitle[$scientificResearch->researcherInformation->scientificTitle]}} 
                                                            {{$Certification[$scientificResearch->researcherInformation->certificate]}}
                                                            
                                                            @endif
                                                            @if (!empty( $scientificResearch->researcherInformation->name_ar ))
                                                            {{ $scientificResearch->researcherInformation->name_ar }}
                                                            @else                                                
                                                            {{ $scientificResearch->researcherInformation->name }}
                                                            @endif
                                                        </a>
                                                        <span>email:
                                                            {{ $scientificResearch->researcherInformation->email }}</span>
                                                    </div>
                                                @endforeach
                                                @if (!empty($research->otherResearchers))
                                                    <div class="d-flex flex-column font-italic fs-7"
                                                        style="font-style:italic">
                                                        <b>Other Researchers</b>
                                                        <?php
                                                        $names = explode(', ', $research->otherResearchers);
                                                        ?>
                                                        @foreach ($names as $name)
                                                            <a href="#"
                                                                class="text-gray-800 text-hover-primary mb-1">
                                                                {{ $name }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </td>


                                            <td class="text-center" data-order=" {{ $research->updated_at }}">
                                                <div class="badge badge-light fw-bold"> {{ $research->updated_at }}</div>
                                            </td> 
                                            <td class="text-center">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-outline ki-down fs-5 ms-1"></i> </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
         
                                                    @if(in_array(Auth::user()->role ,['Professor']))
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 text-center">
                                                        <a href="{{ route('metadata', ['id' => $research->id]) }}" class="menu-link px-3 ars_modal_X">
                                                           Research Metadata
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    @endif
        
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
    @include('Research.data.modal.edit')
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/custom/apps/Research/data/edit.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/Research/data/delete.js') }}"></script>
@endsection
