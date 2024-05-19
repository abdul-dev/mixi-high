@extends('layout.master')
@section('page_title','Permissions List')
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        @yield('page_title')</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                {{--                    <span id="create-user-from-modal" class="btn btn-sm fw-bold  btn-secondary">--}}
                {{--                        <i class="bi bi-fullscreen-exit"></i>--}}
                {{--                        Create in modal--}}
                {{--                    </span>--}}
                {{--                    <a href="{{env('BASE_URL').'users/create'}}" class="btn btn-sm fw-bold btn-primary">--}}
                {{--                        <i class="bi bi-plus-square"></i>--}}
                {{--                        Create--}}
                {{--                    </a>--}}
                <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-0" id="main-content-body">
                        <!--begin::Form-->
                        <div class="card-px">
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-lg-10">
                                {{--CONTENT HERE--}}
                                <!--begin::Table-->
                                    <div class="card card-p-0 card-flush">
                                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                            <div class="card-title">
                                                <!--begin::Search-->
                                            {{--                                                <div class="d-flex align-items-center position-relative my-1">--}}
                                            {{--                                                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-4"><span--}}
                                            {{--                                                            class="path1"></span><span class="path2"></span></i>--}}
                                            {{--                                                    <input type="text" data-kt-filter="search"--}}
                                            {{--                                                           class="form-control form-control-solid w-250px ps-14"--}}
                                            {{--                                                           placeholder="Search Report"/>--}}
                                            {{--                                                </div>--}}
                                            <!--end::Search-->
                                                <!--begin::Export buttons-->
                                                <div id="kt_datatable_example_1_export" class="d-none"></div>
                                                <!--end::Export buttons-->
                                            </div>
                                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                                <!--begin::Export dropdown-->
                                            {{--                                                <button type="button" class="btn btn-light-primary"--}}
                                            {{--                                                        data-kt-menu-trigger="click"--}}
                                            {{--                                                        data-kt-menu-placement="bottom-end">--}}
                                            {{--                                                    <i class="ki-duotone ki-exit-down fs-2"><span--}}
                                            {{--                                                            class="path1"></span><span class="path2"></span></i>--}}
                                            {{--                                                    Export Report--}}
                                            {{--                                                </button>--}}
                                            <!--begin::Menu-->
                                            {{--                                                <div id="datatable_export_menu"--}}
                                            {{--                                                     class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"--}}
                                            {{--                                                     data-kt-menu="true">--}}
                                            {{--                                                    <!--begin::Menu item-->--}}
                                            {{--                                                    <div class="menu-item px-3">--}}
                                            {{--                                                        <a href="#" class="menu-link px-3" data-kt-export="copy">--}}
                                            {{--                                                            Copy to clipboard--}}
                                            {{--                                                        </a>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <!--end::Menu item-->--}}
                                            {{--                                                    <!--begin::Menu item-->--}}
                                            {{--                                                    <div class="menu-item px-3">--}}
                                            {{--                                                        <a href="#" class="menu-link px-3" data-kt-export="excel">--}}
                                            {{--                                                            Export as Excel--}}
                                            {{--                                                        </a>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <!--end::Menu item-->--}}
                                            {{--                                                    <!--begin::Menu item-->--}}
                                            {{--                                                    <div class="menu-item px-3">--}}
                                            {{--                                                        <a href="#" class="menu-link px-3" data-kt-export="csv">--}}
                                            {{--                                                            Export as CSV--}}
                                            {{--                                                        </a>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <!--end::Menu item-->--}}
                                            {{--                                                    <!--begin::Menu item-->--}}
                                            {{--                                                    <div class="menu-item px-3">--}}
                                            {{--                                                        <a href="#" class="menu-link px-3" data-kt-export="pdf">--}}
                                            {{--                                                            Export as PDF--}}
                                            {{--                                                        </a>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                    <!--end::Menu item-->--}}
                                            {{--                                                </div>--}}
                                            <!--end::Menu-->
                                                <!--end::Export dropdown-->

                                                <!--begin::Hide default export buttons-->
                                                <div id="datatable_export_buttons" class="d-none"></div>
                                                <!--end::Hide default export buttons-->
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-10">
                                                <div class="col-md-12 fv-row">
                                                    <label class="fs-6 fw-semibold mb-2">Role</label>
                                                    <select data-control="select2"
                                                            class="form-select form-select-solid" id="role">
                                                        <option value="">Select role to see its permissions..</option>
                                                        @foreach($roles as $rl)
                                                            <option @if (request()->role_id == $rl->id) selected @endif value="{{ $rl->id }}">{{ $rl->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Form-->
                                            <form id="permissions-form" class="form" action="#">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7">
                                                    <!--begin::Permissions-->
                                                    <div class="fv-row">
                                                        <!--begin::Label-->
                                                        <label class="fs-5 fw-bold form-label mb-2">Permissions</label>
                                                        <!--end::Label-->
                                                        <!--begin::Table wrapper-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table
                                                                class="table align-middle table-row-dashed fs-6 gy-5">
                                                                <!--begin::Table body-->
                                                                <tbody class="text-gray-600 fw-semibold">
                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td class="text-gray-800">Administrator Access
                                                                        <span class="ms-1" data-bs-toggle="tooltip"
                                                                              title="Allows a full access to the system">
																					<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
																				</span></td>
                                                                    <td>
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                                                            <input class="form-check-input"
                                                                                   type="checkbox" value=""
                                                                                   id="select_all_menus"/>
                                                                            <span class="form-check-label"
                                                                                  for="select_all_menus">Select all</span>
                                                                        </label>
                                                                        <!--end::Checkbox-->
                                                                    </td>
                                                                </tr>
                                                                <!--end::Table row-->
                                                                @foreach($menus as $single_menu)
                                                                    @php
                                                                        $permission = \App\Models\RolePermission::where('role_id', request()->role_id)->where('menu_id', $single_menu->id)->first();
                                                                    @endphp
                                                                    <!--begin::Table row-->
                                                                    <tr>
                                                                        <!--begin::Label-->
                                                                        <td class="text-gray-800">{{ $single_menu->title }}</td>
                                                                        <!--end::Label-->
                                                                        <!--begin::Input group-->
                                                                        <td>
                                                                            <!--begin::Wrapper-->
                                                                            <div class="d-flex">
                                                                                <!--begin::Checkbox-->
                                                                                <label
                                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                    <input class="form-check-input permission-checkbox"
                                                                                           type="checkbox" value="view"
                                                                                           @if($permission)
                                                                                               @if($permission->can_view)
                                                                                                    checked
                                                                                               @endif
                                                                                           @endif
                                                                                           name="permissions[{{$single_menu->id}}][can_view]"/>
                                                                                    <span class="form-check-label">View</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                                <!--begin::Checkbox-->
                                                                                <label
                                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                    <input class="form-check-input permission-checkbox"
                                                                                           type="checkbox" value="add"
                                                                                           @if($permission)
                                                                                               @if($permission->can_add)
                                                                                                checked
                                                                                               @endif
                                                                                           @endif
                                                                                           name="permissions[{{$single_menu->id}}][can_add]"/>
                                                                                    <span
                                                                                        class="form-check-label">Add</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                                <!--begin::Checkbox-->
                                                                                <label
                                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                    <input class="form-check-input permission-checkbox"
                                                                                           type="checkbox" value="edit"
                                                                                           @if($permission)
                                                                                               @if($permission->can_edit)
                                                                                                checked
                                                                                               @endif
                                                                                           @endif
                                                                                           name="permissions[{{$single_menu->id}}][can_edit]"/>
                                                                                    <span
                                                                                        class="form-check-label">Edit</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                                <!--begin::Checkbox-->
                                                                                <label
                                                                                    class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                                    <input class="form-check-input permission-checkbox"
                                                                                           type="checkbox" value="delete"
                                                                                           @if($permission)
                                                                                               @if($permission->can_delete)
                                                                                                checked
                                                                                               @endif
                                                                                           @endif
                                                                                           name="permissions[{{$single_menu->id}}][can_delete]"/>
                                                                                    <span
                                                                                        class="form-check-label">Delete</span>
                                                                                </label>
                                                                                <!--end::Checkbox-->
                                                                            </div>
                                                                            <!--end::Wrapper-->
                                                                        </td>
                                                                        <!--end::Input group-->
                                                                    </tr>
                                                                    <!--end::Table row-->
                                                                @endforeach

                                                                </tbody>
                                                                <!--end::Table body-->
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table wrapper-->
                                                    </div>
                                                    <!--end::Permissions-->
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                            data-kt-roles-modal-action="cancel">Discard
                                                    </button>
                                                    <input type="hidden" name="role" class="role" value="{{ request()->role_id }}">
                                                    <button type="submit" class="btn btn-primary save-permissions-btn"
                                                            data-kt-roles-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
																<span
                                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                    </div>

                                    <!--end::Table-->
                                    {{--END- CONTENT HERE--}}

                                </div>
                                <!--end::Col-->
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection

@section('page_level_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            initialize_datatable({document_title: 'Permissions List'})
        });

        $(document).on('change', '#role', function () {
            let id = $(this).val();
            window.location.assign(base_url + "permissions?role_id=" + id);
        });

        $(document).on('click', '#select_all_menus', function () {
            let checked = false;

            if ($(this).prop('checked')) {
                checked = true;
            }

            $('.permission-checkbox').each(function () {
                if (checked) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
        });

        $(document).on('click', '.save-permissions-btn', function (e) {
            e.preventDefault();
            disable_submit_btn();
            let formData = new FormData($('#permissions-form')[0]);
            $.ajax({
                url: api_url + "permissions/update",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    enable_submit_btn();

                    if (response.status) {
                        success_toaster(response.message);
                        refresh_page();
                    } else {
                        error_toaster(response.message);
                    }
                }
            });
        });
    </script>
@endsection
