<div class="modal fade " id="kt_modal_enabled_user" tabindex="-1" aria-modal="true" role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold" id="en_dis_title">Enabled / deactivated User</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_enabled_user_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="#">
                    @csrf

                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <h3 id="name-v" style="color: blue;">Abdullah ARS</h3>
                    </div>

                    <div class="fv-row mb-7">
                        <input type="text" name="en_user_id" id="en_user_id">
                        <input type="text" name="en_user_status" id="en_user_status">
                    </div>
                    <!--begin::Input group-->
                    {{-- <div class="fv-row mb-7">
                        <!--begin::Checkbox-->
                        <label class="form-check form-check-custom form-check-solid me-9">
                            <input class="form-check-input" type="checkbox" value="" name="status"
                                id="kt_status">
                            <span class="form-check-label" for="kt_status">
                                activate the account
                            </span>
                        </label>
                        <!--end::Checkbox-->
                    </div> --}}
                    <!--end::Input group-->

                    <!--begin::Disclaimer-->
                    <div class="text-gray-600">
                        When the account is<strong class="me-1"> deactivated </strong>, it cannot enter the system
                    </div>
                    <!--end::Disclaimer-->

                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-permissions-modal-action="cancel">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-permissions-modal-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
