<!--begin::Sidebar-->
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <img alt="Logo" src="{{asset('assets/media/logo.png')}}"
             class="h-20px app-sidebar-logo-minimize"/>
        <a href="#">
            <img alt="Logo" src="{{asset('assets/media/logo.png')}}"
                 class="h-25px app-sidebar-logo-default"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-double-left fs-2 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">

                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ isset($menu) && $menu == 'dashboard' ? 'active' : '' }}"
                       href="{{env('BASE_URL').'dashboard'}}">
                        <i class="bi bi-bar-chart-line fs-3 mx-2"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

            @if (session()->get('role')->code == 'student')
                <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'student' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'student'}}">
                            <i class="bi bi-info-circle fs-3 mx-2"></i>
                            <span class="menu-title">Profile Details</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
            @endif

            @if (session()->get('role')->code == 'admin' || session()->get('role')->code == 'local_coordinator')

                <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'students' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'students'}}">
                            <i class="bi bi-person-vcard fs-3 mx-2"></i>
                            <span class="menu-title">Students</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'host_families' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'host-families'}}">
                            <i class="bi bi-people fs-3 mx-2"></i>
                            <span class="menu-title">Host Families</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'schools' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'schools'}}">
                            <i class="bi bi-building fs-3 mx-2"></i>
                            <span class="menu-title">Schools</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
            @endif
            @if (session()->get('role')->code == 'admin')

                <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'offices' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'offices'}}">
                            <i class="bi bi-briefcase fs-3 mx-2"></i>
                            <span class="menu-title">Offices</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'airports' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'airports'}}">
                            <i class="bi bi-airplane fs-3 mx-2"></i>
                            <span class="menu-title">Airports</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'programs' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'programs'}}">
                            <i class="bi bi-journal-text fs-3 mx-2"></i>
                            <span class="menu-title">Programs</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'local_coordinators' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'local-coordinators'}}">
                            <i class="bi bi-person-badge fs-3 mx-2"></i>
                            <span class="menu-title">Local Coordinators</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'partner_abroad' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'partner-abroad'}}">
                            <i class="bi bi-globe-americas fs-3 mx-2"></i>
                            <span class="menu-title">Partner Abroad</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ isset($menu) && $menu == 'permissions' ? 'active' : '' }}"
                           href="{{env('BASE_URL').'permissions'}}">
                            <i class="bi bi-gear fs-3 mx-2"></i>
                            <span class="menu-title">Permissions</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

            @endif

            <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ isset($menu) && $menu == 'change_password' ? 'active' : '' }}"
                       href="{{env('BASE_URL').'auth/change-password'}}">
                        <i class="bi bi-lock fs-3 mx-2"></i>
                        <span class="menu-title">Change Password</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
            {{--                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
            {{--                    <!--begin:Menu link-->--}}
            {{--                    <span class="menu-link">--}}
            {{--                        <span class="menu-icon">--}}
            {{--                            <i class="ki-duotone ki-chart-pie-3 fs-2">--}}
            {{--                                <span class="path1"></span>--}}
            {{--                                <span class="path2"></span>--}}
            {{--                                <span class="path3"></span>--}}
            {{--                            </i>--}}
            {{--                        </span>--}}
            {{--                        <span class="menu-title">Default</span>--}}
            {{--                        <span class="menu-arrow"></span>--}}
            {{--                    </span>--}}
            {{--                    <!--end:Menu link-->--}}
            {{--                    <!--begin:Menu sub-->--}}
            {{--                    <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
            {{--                        <!--begin:Menu item-->--}}
            {{--                        <div class="menu-item">--}}
            {{--                            <!--begin:Menu link-->--}}
            {{--                            <a class="menu-link" href="{{env('BASE_URL').'default/create'}}">--}}
            {{--                                <span class="menu-bullet">--}}
            {{--                                    <span class="bullet bullet-dot"></span>--}}
            {{--                                </span>--}}
            {{--                                <span class="menu-title">Create Form Extended</span>--}}
            {{--                            </a>--}}
            {{--                            <!--end:Menu link-->--}}
            {{--                        </div>--}}
            {{--                        <!--end:Menu item-->--}}
            {{--                        <!--begin:Menu item-->--}}
            {{--                        <div class="menu-item">--}}
            {{--                            <!--begin:Menu link-->--}}
            {{--                            <a class="menu-link" href="{{env('BASE_URL').'default/list'}}">--}}
            {{--                                <span class="menu-bullet">--}}
            {{--                                    <span class="bullet bullet-dot"></span>--}}
            {{--                                </span>--}}
            {{--                                <span class="menu-title">Form List</span>--}}
            {{--                            </a>--}}
            {{--                            <!--end:Menu link-->--}}
            {{--                        </div>--}}
            {{--                        <!--end:Menu item-->--}}
            {{--                    </div>--}}
            {{--                    <!--end:Menu sub-->--}}
            {{--                </div>--}}
            <!--end:Menu item-->

                <!--begin:Menu item-->
            {{--                <div class="menu-item">--}}
            {{--                    <!--begin:Menu link-->--}}
            {{--                    <a class="menu-link" href="{{env('BASE_URL').'users'}}">--}}
            {{--                        <i class="bi bi-person-lines-fill fs-3 mx-2"></i>--}}
            {{--                        <span class="menu-title">Users Management</span>--}}
            {{--                    </a>--}}
            {{--                    <!--end:Menu link-->--}}
            {{--                </div>--}}
            <!--end:Menu item-->

            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <a href="#"
           class="logout btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
           data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
           title="Click here to Logout">
            <span class="btn-label">Logout</span>
            <i class="ki-duotone ki-document btn-icon fs-2 m-0">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Sidebar-->
