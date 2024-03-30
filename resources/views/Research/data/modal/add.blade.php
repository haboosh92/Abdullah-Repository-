<div class="modal fade" id="ars_modal_add_research" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered xmw-650px modal-fullscreenX modal-xl">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="ars_modal_add_research_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">New Research</h2>
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
                <form id="ars_modal_add_research_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('cresearch') }}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="ars_modal_add_research_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#ars_modal_add_research_header"
                        data-kt-scroll-wrappers="#ars_modal_add_research_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 59px;">

                        <div class="containerx">
                            <div class="row">
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2"
                                            id="select2-ars-departments_id2">Department
                                            Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <select name=" departments_id2"
                                            data-dropdown-parent="#select2-ars-departments_id2"
                                            class="form-select rounded-start-0" data-control="select2"
                                            data-placeholder="Select a department name" tabindex="-1" size="3"
                                            data-allow-clear="true" data-dropdown-css-class="dropdown-max-height"
                                            required>
                                            <option></option>
                                            @foreach ($Departments as $Department)
                                            <option value="{{ $Department->id }}">{{ $Department->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('departments_id2')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col-6">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2" id="select2-ars-name2">Year of
                                            research</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->

                                        <select name="year" data-dropdown-parent="#select2-ars-name2"
                                            class="form-select rounded-start-0" data-control="select2"
                                            data-placeholder="Select a year of research" tabindex="-1" size="3"
                                            data-allow-clear="true" data-dropdown-css-class="dropdown-max-height"
                                            required>
                                            <option></option>
                                            @for ($year = 2010; $year < 2030; $year++) <option
                                                value="{{ $year . '/' . $year + 1 }}">
                                                {{ $year . '/' . $year + 1 }}
                                                </option>
                                                @endfor
                                        </select>
                                        <!--end::Input-->
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('year')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>


                                <!--begin::Input group-->
                                <div class="col-6">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">
                                            Full Name</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="text" name="aouthername"
                                            class="form-control form-control-solidx mb-3 mb-lg-0" placeholder=""
                                            value="" required>
                                        <!--end::Input-->
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('aouthername')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->

                                <div class="col-6">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <input type="email" name="email"
                                            class="form-control form-control-solidx mb-3 mb-lg-0 " placeholder=""
                                            value="" required>
                                        <!--end::Input-->
                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('email')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->


                                <div class="col-12">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <!--begin::Label-->
                                        <label class="required fw-semibold fs-6 mb-2">
                                            Research title
                                        </label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <textarea class="form-control" name="title" placeholder="Research title here"
                                            id="floatingTextarea" row="7" style="min-height: 150px;"></textarea>
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