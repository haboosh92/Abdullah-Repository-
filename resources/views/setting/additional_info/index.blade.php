@extends('layouts.app2')
@section('page-title')
    <h1 class="text-gray-900 fw-bold my-1 fs-3 lh-1"> Researcher information</h1>
    <!-- @if (session('success'))
    <script>
        $(document).ready(function() {
            toastr.success('{{ session('title') }}',
                '{{ session('success') }}');
        });
    </script>
    @endif -->
@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class=" container-xxl " id="kt_content_container">
            <form action="{{route("updateInfo")}}" method="POST"  
                class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework"                
                data-select2-id="select2-data-kt_ecommerce_add_category_form"> 
                @csrf

                <!--begin::Main column-->
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Full Name
                                    <i>Note: Only the name must be written without the scientific title</i>
                                </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="name" class="form-control mb-2"
                                    placeholder="" value="{{$RInfo->name}}" required>
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">
                                </div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->

                            
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Full Name (باللغة العربية) 
                                    <i>ملاحظة: يجب كتابة الاسم فقط بدون  اللقب العلمي</i> </label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <input type="text" name="name_ar" class="form-control mb-2"
                                    placeholder="" value="{{$RInfo->name_ar}}" required>
                                <!--end::Input-->

                                <!--begin::Description-->
                                <div class="text-muted fs-7">
                                </div>
                                <!--end::Description-->
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <!--end::Input group-->

                           
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->
                        <!--begin::Automation-->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Certification </h2>
                                </div>
                            </div>
                            <!--end::Card header-->
    
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label mb-5">Choose the last certificate you obtained</label>
                                    <!--end::Label-->
    
                                    <!--begin::Methods-->
                                    @foreach ($Certification as $i=>$value)
                                        
                                     <!--begin::Input row-->
                                    <div class="d-flex fv-row">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="certificate" type="radio"
                                                value="{{$i}}" id="ars_{{$value}}" required 
                                                @if ($RInfo->certificate ==$i)
                                                checked="checked"
                                                @endif>
                                            <!--end::Input-->
    
                                            <!--begin::Label-->
                                            <label class="form-check-label" for="ars_{{$value}}">
                                                <div class="fw-bold text-gray-800">{{$value}}</div>
                                                <div class="text-gray-600"> </div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                    <!--end::Input row-->
                                    <div class="separator separator-dashed my-5"></div>
                                    @endforeach
                                   
    
                                    <!--end::certificate-->
                                </div>
                                <!--end::Input group-->
     
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Automation-->


                            <!--begin::The scientific title-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>The Scientific Title</h2>
                            </div>
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class="form-label mb-5">Choose your Scientific Title</label>
                                <!--end::Label-->

                                <!--begin::Scientific Title-->
 

                                
                                    <!--begin::Methods-->
                                    @foreach ($scientificTitle as $i=>$value)
                                        
                                     <!--begin::Input row-->
                                    <div class="d-flex fv-row">
                                        <!--begin::Radio-->
                                        <div class="form-check form-check-custom form-check-solid">
                                            <!--begin::Input-->
                                            <input class="form-check-input me-3" name="scientificTitle" type="radio"
                                                value="{{$i}}" id="ars_{{$value}}" required
                                                @if ($RInfo->scientificTitle ==$i)
                                                checked="checked"
                                                @endif>
                                            <!--end::Input-->
    
                                            <!--begin::Label-->
                                            <label class="form-check-label" for="ars_{{$value}}">
                                                <div class="fw-bold text-gray-800">{{$value}}</div>
                                                <div class="text-gray-600"> </div>
                                            </label>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Radio-->
                                    </div>
                                    <!--end::Input row-->
                                    <div class="separator separator-dashed my-5"></div>
                                    @endforeach
 

                                <!--end::Methods-->
                            </div>
                            <!--end::Input group-->
 
                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::Automation-->


                
                
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <button type="reset" href  class="btn btn-light me-5">
                            Cancel
                        </button>
                        <!--end::Button-->

                        <!--begin::Button-->
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">
                                Save Information
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Main column-->
            </form>
        </div>
        <!--end::Container-->
    </div>


    
@endsection
 
