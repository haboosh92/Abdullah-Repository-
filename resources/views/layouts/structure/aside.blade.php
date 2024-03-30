<div id="kt_aside" class="aside overflow-visible overflow-lg-auto " data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

    <!--begin::Logo-->
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-8" id="kt_aside_logo">
        <a href="">
            <img alt="Logo" src="{{asset('assets/media/logos/college.png')}}" class="h-55px" />
        </a>
    </div>
    <!--end::Logo-->

    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column align-lg-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
        <!--begin::Primary menu-->
        <div class="hover-scroll-y scroll-ms my-2 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div id="kt_aside_menu"
                class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6"
                data-kt-menu="true">


                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item py-2">
                    <!--begin:Menu link--><span class="menu-link menu-center"><span class="menu-icon me-0"><i
                                class="ki-outline ki-home-2 fs-2x"></i></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <!--begin:Menu item-->
                        <div class="menu-item active">
                            <!--begin:Menu content-->
                            <div class="menu-content "><span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        @if(in_array(Auth::user()->role ,['Administrator','Editor']))
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('home') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Statistics</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        @endif
                        <!--begin:Menu item-->
                        <div class="menu-item ">
                            <!--begin:Menu link-->
                            <a class="menu-link " href="{{ route('research') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Research</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('myresearch') }}"><span
                                    class="menu-bullet">
                                    <span class="bullet bullet-dot"></span></span><span class="menu-title">My
                                    Research</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                @if(in_array(Auth::user()->role ,['Professor']))
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item py-2">
                    <!--begin:Menu link--><span class="menu-link menu-center"><span class="menu-icon me-0"><i
                                class="ki-outline ki-notification-status fs-2x"></i></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content "><span class="menu-section fs-5 fw-bolder ps-1 py-1">
                                    Notifications</span></div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('requests') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Research Requests</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                @endif
                @if(in_array(Auth::user()->role ,['Administrator','Editor']))
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item py-2">
                    <!--begin:Menu link--><span class="menu-link menu-center"><span class="menu-icon me-0"><i
                                class="ki-outline ki-notification-status fs-2x"></i></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content "><span class="menu-section fs-5 fw-bolder ps-1 py-1">
                                    Research Management</span></div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('files') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Upload Research</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->


                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('requests') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Research Requests</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->


                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item here-x x-show py-2">
                    <!--begin:Menu link-->
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-abstract-26 fs-2x"></i>
                        </span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content "><span class="menu-section fs-5 fw-bolder ps-1 py-1">
                                    Management</span></div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('users') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Users List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->



                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('departs') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Department List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ route('yearRs') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot">
                                    </span></span><span class="menu-title">Year of Research  List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                @endif



                <!--begin:Menu item-->
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
                    class="menu-item py-2">
                    <!--begin:Menu link--><span class="menu-link menu-center"><span class="menu-icon me-0"><i
                                class="ki-outline ki-briefcase fs-2x"></i></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-200px w-lg-225px mh-75 overflow-auto">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu content-->
                            <div class="menu-content "><span class="menu-section fs-5 fw-bolder ps-1 py-1">Help</span>
                            </div>
                            <!--end:Menu content-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="#" title="" data-bs-toggle="tooltip"
                                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title">Documentation</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Primary menu-->
    </div>
    <!--end::Nav-->

    <!--begin::Footer-->
    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="mb-7">
            <button type="button" class="btn btm-sm btn-custom btn-icon" data-kt-menu-trigger="click"
                data-kt-menu-overflow="true" data-kt-menu-placement="top-start" title="Quick actions">

                <i class="ki-outline ki-notification-status fs-1"></i> </button>

            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
                </div>
                <!--end::Menu item-->


                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->

                @if(in_array(Auth::user()->role ,['Administrator','Editor']))
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('users') }}" class="menu-link px-3">
                        New user
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('files') }}" class="menu-link px-3">
                        New uplaod file
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('research') }}" class="menu-link px-3">
                        Research
                    </a>
                </div>
                <!--end::Menu item-->
                @endif
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="{{ route('dashboard') }}" class="menu-link px-3">
                        About the IHCOEDU
                    </a>
                </div>
                <!--end::Menu item-->

                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->

                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary  btn-sm px-4" href="{{ route('Developer') }}">
                            Developer information
                        </a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>