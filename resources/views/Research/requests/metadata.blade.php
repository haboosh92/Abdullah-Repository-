@extends('layouts.app2')
@section('page-title')
<h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1">Paper Metadata</h1>
<ul class="breadcrumb fw-semibold fs-8 my-1">


    <li class="breadcrumb-item text-muted">
        {{$research->title}}
    </li>

</ul>


<!-- @if (session('success'))
<script>
$(document).ready(function() {
    toastr.success('{{ session('
        success ') }}', '{{ session('
        title ') }}');
});
</script>
@endif -->


<!-- 

@if (session('error'))
<script>
$(document).ready(function() {
    toastr.error('{{ session('
        error ') }}', '{{ session('
        title ') }}');
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
                    <!-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i> <input type="text"
                            data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13"
                            placeholder="Search file">
                    </div> -->
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->

                <!--begin::Card toolbar-->
                <div class="card-toolbar">


                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        @if(Auth::user()->role !='Professor')

                        <!--begin::Add user-->
                        <button type="button"
                            class="btn btn-primary mx-3 ars_modal_request_accept @if($requests->status==1) d-none @endif"
                            data-bs-toggle="modal" data-bs-target="#xars_modal_request_accept" id="Accept"
                            data-status="Accept" data-id="{{$requests->id}}" data-name="{{$research->title }}"
                            data-url="{{route('acceptrequest')}}">
                            <i class="ki-outline ki-plus fs-2"></i> Request Accept
                        </button>
                        <!--end::Add user-->


                        <!--begin::Add user-->
                        <button type="button"
                            class="btn btn-danger ars_modal_request_accept @if($requests->status==2) d-none @endif"
                            data-bs-toggle="modal" data-bs-target="#xars_modal_request_accept" id="Reject"
                            data-status="Reject" data-id="{{$requests->id}}" data-name="{{$research->title }}"
                            data-url="{{route('rejectrequest')}}">
                            <i class="ki-outline ki-plus fs-2"></i> Request Reject
                        </button>
                        <!--end::Add user-->

                        @endif
                    </div>
                    <!--end::Toolbar-->



                    <!--begin::Modal - Add task-->

                    <!--end::Modal - Add task-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body py-4">


                <div class="d-flex flex-column flex-lg-row">
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                        <!--begin::Card-->
                        <div class="card">
                            <!--begin::Card body-->
                            <div class="card-body p-12">
                                <!--begin::Form-->
                                <form action="" id="kt_invoice_form">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column align-items-start flex-xxl-row">


                                        <!--begin::Input group-->
                                        <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                            data-bs-original-title="Enter invoice number" data-kt-initialized="1">
                                            <span class="fs-1 fw-bold text-gray-800">Paper Metadata</span>

                                        </div>
                                        <!--end::Input group-->

                                    </div>
                                    <!--end::Top-->

                                    <!--begin::Separator-->
                                    <div class="separator separator-dashed my-10"></div>
                                    <!--end::Separator-->

                                    <!--begin::Wrapper-->
                                    <div class="mb-0">
                                        <!--begin::Row-->
                                        <div class="row gx-10 mb-5">
                                            <!--begin::Col-->
                                            <div class="col-lg-12">
                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Title </label>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid"
                                                        rows="3" placeholder="title"
                                                        readonly>@if($metadata){{$metadata->title}}@endif</textarea>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Type</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="@if($metadata){{$metadata->type}}@endif" readonly>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Abstract </label>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid"
                                                        rows="10" placeholder="Abstract "
                                                        readonly>@if($metadata){{$metadata->abstract}}@endif</textarea>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Journal name </label>
                                                <div class="mb-5">
                                                    <textarea name="notes" class="form-control form-control-solid"
                                                        rows="4" placeholder="journal name "
                                                        readonly>@if($metadata){{$metadata->journal_name}}@endif</textarea>
                                                </div>
                                                <!--end::Input group-->



                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Journal ISSN</label>
                                                <div class="mb-5">
                                                    <ul>
                                                        @if($metadata && !empty($metadata['ISSN']))
                                                        @foreach (json_decode($metadata['ISSN']) as $ISSN)
                                                        <li>
                                                            <strong> {{ $ISSN }}</strong>
                                                        </li>
                                                        <br>
                                                        @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                                <!--end::Input group-->

                                            </div>
                                            <!--end::Col-->



                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Volume</label>
                                                <div class="mb-5">
                                                    <input type="text" class="form-control form-control-solid"
                                                        value="@if($metadata){{$metadata->volume}}@endif" readonly>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Input group-->
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">
                                                    Issue</label>
                                                <div class="mb-5">


                                                    <input type="text" class="form-control form-control-solid"
                                                        value="@if($metadata){{$metadata->issue}}@endif" readonly>

                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Wrapper-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->

                    <!--begin::Sidebar-->
                    <div class="flex-lg-auto min-w-lg-300px">
                        <!--begin::Card-->
                        <div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice"
                            data-kt-sticky-offset="{default: false, lg: '200px'}"
                            data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto"
                            data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95"
                            style="">

                            <!--begin::Card body-->
                            <div class="card-body p-10">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bold fs-2 text-gray-700">
                                        <b>Authors Information</b>
                                    </label>
                                    <!--end::Label-->
                                    <ul>
                                        @if($metadata && !empty($metadata['authors']))
                                        @foreach ($metadata['authors'] as $author)
                                        <li>
                                            <strong>Author Name:</strong> {{ $author['given'] }} {{ $author['family'] }}
                                            <br>
                                            @if(isset($author['ORCID']) && $author['ORCID'])
                                            <strong>ORCID:</strong>

                                            <a href="{{ $author['ORCID'] }}">{{ $author['ORCID'] }}</a>

                                            <br>
                                            @endif
                                            <!-- Add more details if needed -->
                                        </li>
                                        <br>
                                        @endforeach
                                        @endif
                                    </ul>


                                </div>
                                <!--end::Input group-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed mb-8"></div>
                                <!--end::Separator-->

                                <!--begin::Input group-->
                                <div class="mb-8">
                                    <!--begin::Option-->
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                        <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                            DOI: <a href=" @if($metadata){{$metadata->doi}}@endif">
                                                @if($metadata){{$metadata->doi}}@endif </a>
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class="mb-8">
                                    <!--begin::Option-->
                                    <label
                                        class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
                                        <span class="form-check-label ms-0 fw-bold fs-6 text-gray-700">
                                            <b>Publication Date : </b>
                                            @if($metadata)
                                            {{$metadata->publication_date}}
                                            @endif
                                        </span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <!--end::Input group-->


                                <!--begin::Separator-->
                                <div class="separator separator-dashed mb-8"></div>
                                <!--end::Separator-->

                                <!--begin::Actions-->
                                <div class="mb-0">
                                    <!--begin::Row-->
                                    <div class="row mb-5">
                                        <!--begin::Col-->
                                        <!-- <div class="col">
                                            <a href="#" class="btn btn-light btn-active-light-primary w-100">Preview
                                                site</a>
                                        </div> -->
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col">
                                            @if($metadata)
                                            <a href="{{$metadata->pdf_link}}"
                                                class="btn btn-light btn-active-light-primary w-100"
                                                target="_blank">Download
                                            </a>
                                            @endif
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    @if(!$is_auther && Auth::user()->role=='Professor')
                                    <!-- <button type=" submit" href="#" class="btn btn-primary w-100 "
                                        id="ars_is_my_research"
                                        data-id=" @if($metadata){{$metadata->research_id}}@endif"
                                        data-url="{{route('request')}}">
                                        <i class="ki-outline ki-triangle fs-3 "></i>
                                        This is my research x
                                    </button> -->
                                    @endif
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Sidebar-->
                </div>


            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>


@include('Research.paper.modal.add')
@endsection
@section('javascript')
<script src="{{ asset('assets/js/custom/apps/Research/requests/main.js') }}"></script>
<!-- {{-- <script src="{{ asset('assets/js/custom/apps/Research/file/delete.js') }}"></script> --}} -->
@endsection