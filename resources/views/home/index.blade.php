@extends('layouts.app2')
@section('page-title')
    <h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Repository system statistics</h1>



    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('
                                                        success ') }}',
                    '{{ session('
                                                                title ') }}');
            });
        </script>
    @endif




    @if (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('
                                                        error ') }}',
                    '{{ session('
                                                                title ') }}');
            });
        </script>
    @endif
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">



            <div class="row g-5 g-xl-12 mb-xl-12 ">


                <div class="col-xl-3">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #282670;background-image:url('{{ asset('assets/media/svg/shapes/wave-bg-purple.svg') }}')">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-3">
                            <!--begin::Icon-->
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #282670">
                                <!-- <i class="ki-outline ki-call text-white fs-2qx lh-0"></i> -->
                                <i class="ki-duotone ki-profile-circle text-white fs-2qx lh-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <!--end::Icon-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-3">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">{{ $Administrator }}</span>

                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Accounts</span>
                                    <span class=""> </span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->

                        <!--begin::Card footer-->
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">Administrator</span>
                                <span class="opacity-50"> Account statistics</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>

                <div class="col-xl-3">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #F1416C;background-image:url('{{ asset('assets/media/svg/shapes/wave-bg-red.svg') }}')">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-3">
                            <!--begin::Icon-->
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #F1416C">
                                <!-- <i class="ki-outline ki-call text-white fs-2qx lh-0"></i> -->
                                <i class="ki-duotone ki-people text-white fs-2qx lh-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                </i>
                            </div>
                            <!--end::Icon-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-3">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">{{ $Editor }}</span>

                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Accounts</span>
                                    <span class=""> </span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->

                        <!--begin::Card footer-->
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">Scientific affairs</span>
                                <span class="opacity-50"> Account statistics</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>

                <div class="col-xl-3">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #7239EA;background-image:url('{{ asset('assets/media/svg/shapes/wave-bg-purple.svg') }}')">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-3">
                            <!--begin::Icon-->
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #7239EA">
                                <!-- <i class="ki-outline ki-call text-white fs-2qx lh-0"></i> -->
                                <i class="ki-duotone ki-teacher text-white fs-2qx lh-0">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Icon-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-3">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">{{ $Professors }} </span>

                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Accounts </span>
                                    <span class=""> </span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->

                        <!--begin::Card footer-->
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-1 d-block">Academic Staff</span>
                                <span class="opacity-50">Account statistics </span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>




                <div class="col-xl-3">
                    <!--begin::Card widget 3-->
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-xl-100"
                        style="background-color: #6a0d74;background-image:url('{{ asset('assets/media/svg/shapes/wave-bg-purple.svg') }}')">
                        <!--begin::Header-->
                        <div class="card-header pt-5 mb-3">
                            <!--begin::Icon-->
                            <div class="d-flex flex-center rounded-circle h-80px w-80px"
                                style="border: 1px dashed rgba(255, 255, 255, 0.4);background-color: #6a0d74">
                                <!-- <i class="ki-outline ki-call text-white fs-2qx lh-0"></i> -->
                                <i class="ki-duotone ki-book-square fs-1" style="color: white; font-size: 2.65rem !important;">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </div>
                            <!--end::Icon-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end mb-3">
                            <!--begin::Info-->
                            <div class="d-flex align-items-center">
                                <span class="fs-4hx text-white fw-bold me-6">{{ $countAll }} </span>

                                <div class="fw-bold fs-6 text-white">
                                    <span class="d-block">Research </span>
                                    <span class=""> </span>
                                </div>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Card body-->

                        <!--begin::Card footer-->
                        <div class="card-footer"
                            style="border-top: 1px solid rgba(255, 255, 255, 0.3);background: rgba(0, 0, 0, 0.15);">
                            <!--begin::Progress-->
                            <div class="fw-bold text-white py-2">
                                <span class="fs-2 d-block">Departmental Research</span>
                                <span class="opacity-50">Account statistics </span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card widget 3-->
                </div>

            </div>



            <div class="row g-6 g-xl-12 mb-xl-12">

                @foreach ($Departments as $key => $value)
                    <div class="col-lg-12 col-xl-12 col-xxl-4 mb-5 mb-xl-1 " data-bs-theme="light"
                        style="xbackground: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%) ; ">
                        <!--begin::Timeline widget 3-->
                        <div class="card h-md-100 border border-secondary shadow p-3 mb-5 bg-body-tertiary rounded"
                            style="background-image:url('{{ asset('azssets/media/svg/shapes/wave-bg-purple.svg') }}'); background-repeat: no-repeat; background-size: cover;">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-900">Department of {{ $value->name }}
                                    </span>

                                    <span class="text-muted mt-1 fw-semibold fs-7">Total {{ $countDepartAll[$value->id] }}
                                        Research</span>
                                </h3>

                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!-- <a href="#" class="btn btn-sm btn-light">Report Cecnter</a> -->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body pt-7 px-0">
                                <!--begin::Tab Content (ishlamayabdi)-->
                                <div class="tab-content mb-2 px-9">
                                    <!--begin::Tap pane-->

                                    <div class="tab-pane fade show active" id="kt_timeline_widget_3_tab_content_4"
                                        role="tabpanel">
                                        @if (isset($Researchs[$value->id]))
                                            @foreach ($Researchs[$value->id] as $file_name => $count)
                                                <!--begin::Wrapper-->
                                                <div class="d-flex align-items-center mb-6">
                                                    <!--begin::Bullet-->
                                                    <span data-kt-element="bullet"
                                                        class="bullet bullet-vertical d-flex align-items-center min-h-70px mh-100 me-4 bg-info"></span>
                                                    <!--end::Bullet-->

                                                    <!--begin::Info-->
                                                    <div class="flex-grow-1 me-5">
                                                        <!--begin::Time-->
                                                        <div class="text-gray-800 fw-semibold fs-2">
                                                            {{ $file_name }}
                                                            <span class="text-gray-500 fw-semibold fs-7">
                                                            </span>
                                                        </div>
                                                        <!--end::Time-->

                                                        <!--begin::Description-->
                                                        <!-- <div class="text-gray-700 fw-semibold fs-6">
                                                        Total </div> -->
                                                        <!--end::Description-->

                                                        <!--begin::Link-->
                                                        <div class="text-gray-500 fw-semibold fs-3">
                                                            Total :
                                                            <!--begin::Name-->
                                                            <a href="#"
                                                                class="text-primary opacity-75-hover fw-semibold">
                                                                {{ $count }}
                                                            </a>
                                                            <!--end::Name-->
                                                        </div>
                                                        <!--end::Link-->
                                                    </div>
                                                    <!--end::Info-->

                                                    <!--begin::Action-->
                                                    <!-- <a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_project">View</a> -->
                                                    <!--end::Action-->
                                                </div>
                                                <!--end::Wrapper-->
                                            @endforeach
                                        @endif
                                    </div>
                                    <!--end::Tap pane-->
                                </div>
                                <!--end::Tab Content-->

                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Timeline widget 3-->
                    </div>
                @endforeach
            </div>

            <!--end::Card body-->

        </div>
        <!--end::Container-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/custom/apps/Research/file/edit.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/Research/file/delete.js') }}"></script>
@endsection
