<div class="modal fade" id="ars_modal_add_research" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-fullscreen xxmw-650pxx">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="ars_modal_add_research_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Add new Research </h2>
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
                <form id="ars_modal_add_research_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('cresearch') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="research_id">
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-yzzzx px-5 px-lg-10" id="kt_modal_upload_file_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#ars_modal_add_research_header"
                        data-kt-scroll-wrappers="#kt_modal_upload_file_scroll" data-kt-scroll-offset="300px"
                        style="xmax-height: 59px;">


                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Department Name </label>

                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-square-brackets ">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id2">

                                                {{-- <select name="departments_id" data-dropdown-parent="#select2-ars-departments_id2"
                                            class="form-select rounded-start-0" data-control="select2"
                                            data-hide-search="true" data-placeholder="Select a Department Name"
                                            tabindex="99" aria-hidden="true" data-kt-initialized="1"> --}}

                                                <select name="departments_id2"
                                                    data-dropdown-parent="#select2-ars-departments_id2"
                                                    class="form-select rounded-start-0" data-control="select2"
                                                    data-placeholder="Select a department name" tabindex="-1" size="3"
                                                    data-allow-clear="true"
                                                    data-dropdown-css-class="dropdown-max-height" required>
                                                    <option></option>
                                                    @foreach ($Departments as $Department)
                                                    <option value="{{ $Department->id }}">{{ $Department->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
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
                                <div class="col">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Year of research </label>



                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-square-brackets">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                </i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-name2">


                                                <select name="name2" data-dropdown-parent="#select2-ars-name2"
                                                    class="form-select rounded-start-0" data-control="select2"
                                                    data-placeholder="Select a year of research" tabindex="-1" size="3"
                                                    data-allow-clear="true"
                                                    data-dropdown-css-class="dropdown-max-height" required>
                                                    <option></option>
                                                    @for ($year = 2010; $year < 2030; $year++) <option
                                                        value="{{ $year . '/' . $year + 1 }}">
                                                        {{ $year . '/' . $year + 1 }}
                                                        </option>
                                                        @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div
                                            class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            @error('name')
                                            <strong>{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Email</label>


                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-notepad-bookmark fs-3"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span><span class="path6"></span></i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        name="email" placeholder="" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <div class="col">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Full Name</label>

                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-notepad-bookmark fs-3"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span><span class="path6"></span></i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id">
                                                <div class="form-floating">
                                                    <input type="text"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        name="aouthername" placeholder="Email" id="floatingTextarea">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>

                            </div>
                        </div>


                        <div class="container ">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Research title </label>


                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text">
                                                <i class="ki-duotone ki-notepad-bookmark fs-3"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span><span class="path4"></span><span
                                                        class="path5"></span><span class="path6"></span></i>
                                            </span>
                                            <div class="overflow-hidden flex-grow-1" id="select2-ars-departments_id">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="title" id="research_title"
                                                        placeholder="Research title here" id="floatingTextarea" row="5"
                                                        style="height: 100px;"></textarea>
                                                    <label for="floatingTextarea">Research title here </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>



                    </div>
                    <!--end::Scroll-->


                    <div class="container text-center">
                        <div class="row align-items-center">
                            <div class="col">
                                <!--begin::Actions-->
                                <div class="text-center pt-10">
                                    <button type="reset" class="btn btn-light me-3"
                                        data-kt-Departments-modal-action="cancel">
                                        Discard
                                    </button>

                                    <button type="submit" class="btn btn-primary"
                                        data-kt-Departments-modal-action="submit">
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
                            </div>
                        </div>
                    </div>

                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <! --end::Modal dialog-->
</div>