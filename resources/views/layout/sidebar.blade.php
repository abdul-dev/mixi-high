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
        <a href="{{ env('BASE_URL') }}">
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
                {{--            @php--}}
                {{--                $Menus = \App\Models\Menu::get();--}}
                {{--            @endphp--}}
                {{--            @foreach($Menus as $module)--}}
                {{--                @if (\App\Helpers\SiteHelper::checkMenuPermission($module->id, 'view'))--}}
                {{--                    <!--begin:Menu item-->--}}
                {{--                        <div class="menu-item">--}}
                {{--                            <!--begin:Menu link-->--}}
                {{--                            <a class="menu-link {{ isset($menu) && $menu == $module->code ? 'active' : '' }}"--}}
                {{--                               href="{{env('BASE_URL'). $module->slug}}">--}}
                {{--                                <i class="{{ $module->icon }} fs-3 mx-2"></i>--}}
                {{--                                <span class="menu-title">{{ $module->title }}</span>--}}
                {{--                            </a>--}}
                {{--                            <!--end:Menu link-->--}}
                {{--                        </div>--}}
                {{--                        <!--end:Menu item-->--}}
                {{--                @endif--}}
                {{--            @endforeach--}}

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{env('BASE_URL').'users'}}">
                                            <span class="menu-bullet">
                                                <span class="fas fa-user"></span>
                                            </span>
                        <span class="menu-title">Users List</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{env('BASE_URL').'orders'}}">
                                            <span class="menu-bullet">
                                                <span class="fas fa-user"></span>
                                            </span>
                        <span class="menu-title">Orders</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-chart-pie-3 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Category</span>
                                    <span class="menu-arrow"></span>
                                </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'categories'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Categories List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'categories/create'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Create Category</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-chart-pie-3 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Unit</span>
                                    <span class="menu-arrow"></span>
                                </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'unit-measures'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Unit List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'unit-measures/create'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Create Unit</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-duotone ki-chart-pie-3 fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                    <span class="menu-title">Product</span>
                                    <span class="menu-arrow"></span>
                                </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'tags'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Product Tag List</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'products/create'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Create Product</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{env('BASE_URL').'products'}}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                <span class="menu-title">Product Listx</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                         
                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->

                <!--begin:Menu item-->
            {{--                <div class="menu-item">--}}
            {{--                    <!--begin:Menu link-->--}}
            {{--                    <a class="menu-link" href="{{env('BASE_URL').'users'}}">--}}
            {{--                        <i class="bi bi-person-lines-fill fs-3 mx-2"></i>--}}
            {{--                        <span class="menu-title">Product Management</span>--}}
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