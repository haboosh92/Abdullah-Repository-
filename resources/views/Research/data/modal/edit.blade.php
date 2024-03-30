<div class="modal fade" id="ars_modal_edit_research" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered xmw-650px modal-fullscreenX modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="ars_modal_edit_research_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Research title</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="ars_modal_edit_research_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('eresearch') }}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="ars_modal_edit_research_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#ars_modal_edit_research_header"
                        data-kt-scroll-wrappers="#ars_modal_edit_research_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 59px;">

                        <input type="hidden" name="id" id="research_id">
                        <div class="containerx">
                            <div class="row">

                                <div class="col-12">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">
                                            Research title
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <textarea class="form-control" name="title" id="research_title"
                                            placeholder="Research title here" id="floatingTextarea" row="10"
                                            style="min-height: 200px;"></textarea>
                                        <!--end::Input-->
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('title')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--end::Scroll-->

                    <!--begin::Actions-->
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">
                            Discard
                        </button>

                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
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