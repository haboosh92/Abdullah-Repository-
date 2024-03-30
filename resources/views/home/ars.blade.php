@extends('layouts.app2')
@section('page-title')
    <h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> System Developer</h1>



    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}',
                    '{{ session('title ') }}');
            });
        </script>
    @endif




    @if (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}',
                    '{{ session('title') }}');
            });
        </script>
    @endif
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">



            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-450px w-xl-450px mb-10">

                    <!--begin::Card-->
                    <div class="card mb-6 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->


                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset('assets/media/avatars/300-1.jpg') }}" alt="image"
                                        style="width: 200px;height: 200px;">
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Name-->
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                    Abdullah Adel Rashed
                                </a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Administrator</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->

                            </div>
                            <!--end::User Info--> <!--end::Summary-->

                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible active" data-bs-toggle="collapse"
                                    href="#kt_user_view_details" role="button" aria-expanded="true"
                                    aria-controls="kt_user_view_details">
                                    Details
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-outline ki-down fs-3"></i> </span>
                                </div>

                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-original-title="Edit customer details" data-kt-initialized="1">

                                </span>
                            </div>
                            <!--end::Details toggle-->

                            <div class="separator"></div>

                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show" style="">
                                <div class="pb-5 fs-6">
                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">

                                        <i class="ki-duotone ki-slack fs-1" style="color: blue">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                            <span class="path4"></span>
                                            <span class="path5"></span>
                                            <span class="path6"></span>
                                            <span class="path7"></span>
                                            <span class="path8"></span>
                                        </i>
                                        Certificate
                                    </div>
                                    <div class="text-gray-600 p-3 px-10">
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                            <!--begin::Content-->
                                            <div class=" fw-semibold">

                                                <div class="fs-6 text-gray-700 ">
                                                    Master's degree in Computer Science
                                                    <a href="#" class="me-1">
                                                        Information Security
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end::Content-->

                                        </div>

                                    </div>
                                    <!--begin::Details item-->


                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">
                                        <i class="ki-duotone ki-information fs-1 " style="color: blue">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        About
                                    </div>
                                    <div class="text-gray-600 p-3 px-10">
                                        <div class="d-flex flex-stack flex-grow-1 ">
                                            <!--begin::Content-->
                                            <div class=" fw-semibold">

                                                <div class="fs-6 text-gray-700 text-justify ">
                                                    Responsible for the Systems and Software Unit
                                                    <br>
                                                    Specializing in the development of websites,
                                                    desktop applications, and mobile applications.
                                                </div>
                                            </div>
                                            <!--end::Content-->

                                        </div>

                                    </div>
                                    <!--begin::Details item-->


                                    <!--begin::Details item-->
                                    <div class="fw-bold mt-5">
                                        <i class="ki-duotone ki-geolocation fs-1" style="color: blue">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>

                                        Address
                                    </div>
                                    <div class="text-gray-600 p-3 px-10">Baghdad, Iraq </div>
                                    <!--begin::Details item-->
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Sidebar-->


                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin::Developer Accounts-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h3 class="fw-bold m-0">Developer Accounts</h3>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-2">



                            <!--begin::Items-->
                            <div class="py-2">

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <i class="ki-duotone ki-whatsapp w-30px me-6"
                                            style="font-size: 3rem !important;color: green;">
                                            <span class="path1" style="color: rgb(123, 167, 123)"></span>
                                            <span class="path2"></span>
                                        </i>

                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Phone</a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="tel:07519657702">
                                                    +964 07519657702
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/media/svg/brand-logos/email.png') }}" 
                                        class="w-40px h-30px me-6"
                                            alt="">

                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Email</a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="mailto:abdullah.adil@ihcoedu.uobaghdad.edu.iq">
                                                    abdullah.adil@ihcoedu.uobaghdad.edu.iq
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>

                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="{{ asset('assets/media/svg/brand-logos/github.svg') }}"
                                            class="w-30px me-6" alt="">

                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Github</a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://github.com/abduliaharsm" target="_blank"
                                                    rel="noopener noreferrer">
                                                    https://github.com/abduliaharsm
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Item-->

                                <div class="separator separator-dashed my-5"></div>



                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <i class="ki-duotone ki-facebook w-30px me-6"
                                            style="font-size: 3rem !important;color: blue;">
                                            <span class="path1" style="color: rgb(135, 162, 231);"></span>
                                            <span class="path2"></span>
                                        </i>

                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Facebook</a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://www.facebook.com/Abduliah.A.94/" target="_blank"
                                                    rel="noopener noreferrer">
                                                    https://www.facebook.com/Abduliah.A.94
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>



                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">
 
                                        {{-- <i class="ki-duotone ki-instagram w-30px me-6"
                                        style="font-size: 3rem !important;color: rgb(221, 0, 255);">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i> --}}
                                        
                                        <img src="{{ asset('assets/media/svg/brand-logos/instagram.png') }}" 
                                        class="w-40px h-40px me-6"
                                        alt="">

                                        
                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Instagram</a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://www.instagram.com/ars_a94" target="_blank"
                                                    rel="noopener noreferrer">
                                                    https://www.instagram.com/ars_a94
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>




                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <img src="{{ asset('assets/media/svg/brand-logos/orcid.png') }}"
                                            class="w-35px h-35px me-6" alt="">


                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">
                                                ORCID
                                            </a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://orcid.org/0000-0002-3280-3305" target="_blank"
                                                    rel="noopener noreferrer">
                                                    https://orcid.org/0000-0002-3280-3305
                                                </a>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>



                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <img src="{{ asset('assets/media/svg/brand-logos/sc.ico') }}"
                                            class="w-35px h-35px me-6" alt="">


                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">
                                                SCOPUS
                                            </a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://www.scopus.com/authid/detail.uri?authorId=57222344422"
                                                    target="_blank" rel="noopener noreferrer">
                                                    https://www.scopus.com/authid/detail.uri?authorId=57222344422
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>



                                <!--begin::Item-->
                                <div class="d-flex flex-stack">
                                    <div class="d-flex">

                                        <img src="{{ asset('assets/media/svg/brand-logos/gsc.png') }}"
                                            class="w-35px h-35px me-6" alt="">


                                        <div class="d-flex flex-column">
                                            <a href="#" class="fs-5 text-gray-900 text-hover-primary fw-bold">
                                                Google Scholar
                                            </a>
                                            <div class="fs-6 fw-semibold text-muted">
                                                <a href="https://scholar.google.com/citations?user=EsHgyZwAAAAJ&hl=ar&authuser=1"
                                                    target="_blank" rel="noopener noreferrer">
                                                    https://scholar.google.com/citations?user=EsHgyZwAAAAJ&hl=ar&authuser=1
                                                </a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--begin::Item-->
                                {{-- <div class="d-flex flex-stack">
                                    <div class="d-flex">
                                        <img src="/metronic8/demo4/assets/media/svg/brand-logos/slack-icon.svg"
                                            class="w-30px me-6" alt="">

                                        <div class="d-flex flex-column">
                                            <a href="#"
                                                class="fs-5 text-gray-900 text-hover-primary fw-bold">Slack</a>
                                            <div class="fs-6 fw-semibold text-muted">Integrate Projects Discussions</div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Switch-->
                                        <label
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input" name="slack" type="checkbox"
                                                value="1" id="kt_modal_connected_accounts_slack">
                                            <!--end::Input-->

                                            <!--begin::Label-->
                                            <span class="form-check-label fw-semibold text-muted"
                                                for="kt_modal_connected_accounts_slack"></span>
                                            <!--end::Label-->
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                </div> --}}
                                <!--end::Item-->
                            </div>
                            <!--end::Items-->
                        </div>
                        <!--end::Card body-->

                        <!--begin::Card footer-->
                        <div class="card-footer border-0 d-flex justify-content-center pt-0">

                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Connected Accounts-->
                </div>
            </div>

        </div>
        <!--end::Container-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/js/custom/apps/Research/file/edit.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/Research/file/delete.js') }}"></script>
@endsection
