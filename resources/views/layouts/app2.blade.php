<!DOCTYPE html>
<!--
Author: AbdullahArs
Product Name: EES Version: 1.0.1
Purchase:
Website: http://www.AbdullahArs.com
Contact: support@AbdullahArs.com
Follow: www.twitter.com/AbdullahArs
Dribbble: www.dribbble.com/AbdullahArs
Like: www.facebook.com/AbdullahArs
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
@include('layouts.structure.head')
<!--end::Head-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            @include('layouts.structure.aside')
            <!--end::Aside-->

            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('layouts.structure.header')
                <!--end::Header-->


                <!--begin::Content-->
                @yield('content')
                {{-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class=" container-xxl " id="kt_content_container">

                        <!--begin::Card-->
                        <div class="card card-flush ">
                            <!--begin::Card header-->
                            <div class="card-header mt-6">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <!--begin::Search-->
                                    <div class="d-flex align-items-center position-relative my-1 me-5">
                                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i> <input
                                            type="text" data-kt-permissions-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-13"
                                            placeholder="Search Permissions" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Card title-->

                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Button-->
                                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_permission">
                                        <i class="ki-outline ki-plus-square fs-3"></i> Add Permission
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0"
                                    id="kt_permissions_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Name</th>
                                            <th class="min-w-250px">Assigned to</th>
                                            <th class="min-w-125px">Created Date</th>
                                            <th class="text-end min-w-100px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        <tr>
                                            <td>User Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                            </td>
                                            <td>
                                                05 May 2024, 10:30 am </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Content Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-danger fs-7 m-1">Developer</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-success fs-7 m-1">Analyst</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-info fs-7 m-1">Support</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-warning fs-7 m-1">Trial</a>
                                            </td>
                                            <td>
                                                21 Feb 2024, 2:40 pm </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Financial Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-success fs-7 m-1">Analyst</a>
                                            </td>
                                            <td>
                                                24 Jun 2024, 10:30 am </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Reporting</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-success fs-7 m-1">Analyst</a>
                                            </td>
                                            <td>
                                                19 Aug 2024, 11:30 am </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Payroll</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-success fs-7 m-1">Analyst</a>
                                            </td>
                                            <td>
                                                20 Dec 2024, 5:30 pm </td>
                                            <td class="text-end">
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Disputes Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-danger fs-7 m-1">Developer</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-info fs-7 m-1">Support</a>
                                            </td>
                                            <td>
                                                25 Jul 2024, 10:10 pm </td>
                                            <td class="text-end">
                                                <button
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>API Controls</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-danger fs-7 m-1">Developer</a>
                                            </td>
                                            <td>
                                                21 Feb 2024, 11:05 am </td>
                                            <td class="text-end">
                                                <button
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Database Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-danger fs-7 m-1">Developer</a>
                                            </td>
                                            <td>
                                                25 Oct 2024, 11:30 am </td>
                                            <td class="text-end">
                                                <button
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Repository Management</td>
                                            <td>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-primary fs-7 m-1">Administrator</a>
                                                <a href="?page=apps/user-management/roles/view"
                                                    class="badge badge-light-danger fs-7 m-1">Developer</a>
                                            </td>
                                            <td>
                                                20 Dec 2024, 10:30 am </td>
                                            <td class="text-end">
                                                <button
                                                    class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_update_permission">
                                                    <i class="ki-outline ki-setting-3 fs-3"></i> </button>
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px"
                                                    data-kt-permissions-table-filter="delete_row">
                                                    <i class="ki-outline ki-trash fs-3"></i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                        <!--begin::Modals-->
                        <!--begin::Modal - Add permissions-->
                        <div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Add a Permission</h2>
                                        <!--end::Modal title-->

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-permissions-modal-action="close">
                                            <i class="ki-outline ki-cross fs-1"></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->

                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Form-->
                                        <form id="kt_modal_add_permission_form" class="form" action="#">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Permission Name</span>

                                                    <span class="ms-2" data-bs-toggle="popover"
                                                        data-bs-trigger="hover" data-bs-html="true"
                                                        data-bs-content="Permission names is required to be unique.">
                                                        <i class="ki-outline ki-information fs-7"></i> </span>
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    placeholder="Enter a permission name" name="permission_name" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="permissions_core" id="kt_permissions_core" />
                                                    <span class="form-check-label" for="kt_permissions_core">
                                                        Set as core permission
                                                    </span>
                                                </label>
                                                <!--end::Checkbox-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Disclaimer-->
                                            <div class="text-gray-600">Permission set as a <strong class="me-1">Core
                                                    Permission</strong> will be locked and <strong class="me-1">not
                                                    editable</strong> in future</div>
                                            <!--end::Disclaimer-->

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-permissions-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-permissions-modal-action="submit">
                                                    <span class="indicator-label">
                                                        Submit
                                                    </span>
                                                    <span class="indicator-progress">
                                                        Please wait... <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Add permissions-->
                        <!--begin::Modal - Update permissions-->
                        <div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
                            <!--begin::Modal dialog-->
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                    <!--begin::Modal header-->
                                    <div class="modal-header">
                                        <!--begin::Modal title-->
                                        <h2 class="fw-bold">Update Permission</h2>
                                        <!--end::Modal title-->

                                        <!--begin::Close-->
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-permissions-modal-action="close">
                                            <i class="ki-outline ki-cross fs-1"></i>
                                        </div>
                                        <!--end::Close-->
                                    </div>
                                    <!--end::Modal header-->

                                    <!--begin::Modal body-->
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        <!--begin::Notice-->

                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                                            <!--end::Icon-->

                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1 ">
                                                <!--begin::Content-->
                                                <div class=" fw-semibold">

                                                    <div class="fs-6 text-gray-700 "><strong
                                                            class="me-1">Warning!</strong> By editing the permission
                                                        name, you might break the system permissions functionality.
                                                        Please ensure you're absolutely certain before proceeding.</div>
                                                </div>
                                                <!--end::Content-->

                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--end::Notice-->

                                        <!--begin::Form-->
                                        <form id="kt_modal_update_permission_form" class="form" action="#">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mb-2">
                                                    <span class="required">Permission Name</span>

                                                    <span class="ms-2" data-bs-toggle="popover"
                                                        data-bs-trigger="hover" data-bs-html="true"
                                                        data-bs-content="Permission names is required to be unique.">
                                                        <i class="ki-outline ki-information fs-7"></i> </span>
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid"
                                                    placeholder="Enter a permission name" name="permission_name" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-permissions-modal-action="cancel">
                                                    Discard
                                                </button>

                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-permissions-modal-action="submit">
                                                    <span class="indicator-label">
                                                        Submit
                                                    </span>
                                                    <span class="indicator-progress">
                                                        Please wait... <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                    </span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Modal body-->
                                </div>
                                <!--end::Modal content-->
                            </div>
                            <!--end::Modal dialog-->
                        </div>
                        <!--end::Modal - Update permissions-->
                        <!--end::Modals-->
                    </div>
                    <!--end::Container-->
                </div> --}}
                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
                    <!--begin::Container-->
                    <div class=" container-xxl  d-flex flex-column flex-md-row flex-stack">
                        <!--begin::Copyright-->
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-gray-500 fw-semibold me-1">Created by</span>
                            <a href="https://www.facebook.com/Abduliah.A.94/" target="_blank"
                                class="text-muted text-hover-primary fw-semibold me-2 fs-6">Abdullah ARs</a>
                        </div>
                        <!--end::Copyright-->

                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item"><a href="https://www.facebook.com/Abduliah.A.94/" target="_blank"
                                    class="menu-link px-2">About</a></li>

                            <li class="menu-item"><a href="https://www.facebook.com/Abduliah.A.94/" target="_blank"
                                    class="menu-link px-2">Support</a></li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Drawers-->
    <!--begin::Activities drawer-->

    <!--end::Activities drawer-->

    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->

    <!--begin::Chat drawer-->

    <!--end::Chat drawer-->
    <!--end::Drawers-->
    <!--end::Main-->

    <!--begin::Engage-->

    <!--end::Engage-->

    <!--begin::Engage modals-->
    <!--begin::Modal - Sitemap-->

    <!--end::Modal - Sitemap-->
    <!--end::Engage modals-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Modals-->
    <!--begin::Modal - Upgrade plan-->

    <!--end::Modal - Upgrade plan-->
    <!--begin::Modal - Users Search-->

    <!--end::Modal - Users Search-->
    <!--begin::Modal - Invite Friends-->

    <!--end::Modal - Invite Friend-->
    <!--end::Modals-->

    <!--begin::Javascript-->
    @include('layouts.structure.javascript')

    @yield('javascript')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
