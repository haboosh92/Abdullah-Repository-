<div class="modal fade" id="ars_modal_Update_Paper_Metadata" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_upload_file_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Paper Metadata</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-Departments-modal-action="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="kt_modal_upload_file_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('cmetadata') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-yzzzx px-5 px-lg-10" id="kt_modal_upload_file_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_upload_file_header"
                        data-kt-scroll-wrappers="#kt_modal_upload_file_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 59px;">

                        <input type="hidden" name="id" class="form-control form-control-solid" value="{{$research->id}}"
                            readonly>

                        <!--begin::Input group-->
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Doi for paper </label>



                            <div class="input-group flex-nowrap">
                                <span class="input-group-text">
                                    <i class="ki-duotone ki-notepad-bookmark fs-3"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span></i>
                                </span>
                                <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id">

                                    <input type="text" name="doi" class="form-control form-control-solid"
                                        value="@if($metadata){{$metadata->doi}}@endif">

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




                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-Departments-modal-action="cancel">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-Departments-modal-action="submit">
                            <span class="indicator-label">
                                Update
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
    <! --end::Modal dialog-->
</div>