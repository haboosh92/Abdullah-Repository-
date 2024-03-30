<div class="modal fade" id="ars_modal_add_Department" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_Department_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add Department</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close"
                    data-kt-Departments-modal-action="close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_Department_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('cdepart') }}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_Department_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_Department_header"
                        data-kt-scroll-wrappers="#kt_modal_add_Department_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 59px;">


                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="required fw-semibold fs-6 mb-2">Department Name</label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="" value="" required>
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                @error('name')
                                <strong>{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-Departments-modal-action="cancel">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-Departments-modal-action="submit">
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