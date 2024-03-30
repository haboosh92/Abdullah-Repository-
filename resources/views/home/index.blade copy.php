@extends('layouts.app2')
@section('page-title')
<h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Repository system statistics</h1>



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



        <div class="row g-5 g-xl-12 mb-xl-12">
            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                <!--begin::Engage widget 8-->
                <div class="card border-0 h-md-100" data-bs-theme="light"
                    style="background: linear-gradient(112.14deg, #00D2FF 0%, #3A7BD5 100%)">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Row-->
                        <div class="row align-items-center h-100">
                            <!--begin::Col-->
                            <div class="col-7 ps-xl-13">
                                <!--begin::Title-->
                                <div class="text-white mb-6 pt-6">
                                    <span class="fs-4 fw-semibold me-2 d-block lh-1 pb-2 opacity-75"> </span>

                                    <span class="fs-2qx fw-bold">Account statistics</span>
                                </div>
                                <!--end::Title-->

                                <!--begin::Text-->
                                <span class="fw-semibold text-white fs-6 mb-8 d-block opacity-75">

                                </span>
                                <!--end::Text-->

                                <!--begin::Items-->
                                <div class="d-flex align-items-center flex-wrap d-grid gap-2 mb-10 mb-xl-20">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <span class="symbol-label" style="background: #35C7FF">
                                                <i class="ki-outline ki-abstract-41 fs-5 text-white"></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="text-white">
                                            <span class="fw-semibold d-block fs-8 opacity-75">Editor</span>
                                            <span class="fw-bold fs-7">Total: {{$Editor}}</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-30px symbol-circle me-3">
                                            <span class="symbol-label" style="background: #35C7FF">
                                                <i class="ki-outline ki-abstract-26 fs-5 text-white"></i> </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Info-->
                                        <div class="text-white">
                                            <span class="fw-semibold opacity-75 d-block fs-8">Professors</span>
                                            <span class="fw-bold fs-7">Total: {{$Professors}}</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->

                                <!--begin::Action-->
                                <div class="d-flex flex-column flex-sm-row d-grid gap-2">
                                    <!-- <a href="#" class="btn btn-success flex-shrink-0 me-lg-2" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_upgrade_plan">Upgrade Plan</a> -->
                                    <!-- <a href="#" class="btn btn-primary flex-shrink-0"
                                        style="background: rgba(255, 255, 255, 0.2)" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_create_app"> Guides</a> -->
                                </div>
                                <!--end::Action-->
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-5 pt-10">
                                <!--begin::Illustration-->
                                <div class="bgi-no-repeat bgi-size-contain bgi-position-x-end h-225px"
                                    style="background-image:url('/metronic8/demo4/assets/media/svg/illustrations/easy/5.svg">
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Engage widget 8-->
            </div>

            @foreach ($Departments as $key => $value)
            <div class="col-lg-12 col-xl-12 col-xxl-6 mb-5 mb-xl-0">
                <!--begin::Timeline widget 3-->
                <div class="card h-md-100">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">Department of {{$value->name}} </span>

                            <span class="text-muted mt-1 fw-semibold fs-7">Total 424,567 Research</span>
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
                                @if(isset($Researchs[$value->id]))
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
                                            {{$file_name}}
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
                                            <a href="#" class="text-primary opacity-75-hover fw-semibold">
                                                {{$count}}
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