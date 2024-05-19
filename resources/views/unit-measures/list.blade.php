@extends('layout.master')
@section('page_title','Unit of Measures List')
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
                    <span id="create-unit-measure-from-modal" class="btn btn-sm fw-bold  btn-secondary">
                        <i class="bi bi-fullscreen-exit"></i>
                        Quick Create
                    </span>
                    <a href="{{env('BASE_URL').'unit-measures/create'}}" class="btn btn-sm fw-bold btn-primary">
                        <i class="bi bi-plus-square"></i>
                        Create
                    </a>
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
                        <!--begin::Card-->
                        <div class="card-px">
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-lg-10">
                                {{--CONTENT HERE--}}
                                <!--begin::Table-->

                                    <div class="card card-p-0 card-flush">
                                        @include('layout.components.datatable-header')
                                        <div class="card-body">
                                            <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                                                   id="datatable">
                                                <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-400-outed fw-bold fs-7 text-uppercase">
                                                    <th class="min-w-100px">Name</th>
                                                    <th class="min-w-100px">Default</th>
                                                    <th class="min-w-100px">Notes</th>
                                                    <th class="text-center min-w-100px">Action</th>
                                                </tr>
                                                <!--end::Table row-->
                                                </thead>
                                                <tbody class="fw-semibold text-gray-600">
                                                @foreach($unit_measures as $unit_measures)
                                                    <tr>
                                                        <td>
                                                            {{$unit_measures->name}}
                                                        </td>
                                                        <td>
                                                            {!! getYesNoLabel($unit_measures->is_default) !!}
                                                        </td>
                                                        <td>
                                                            {{$unit_measures->notes}}
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#"
                                                               class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                               data-kt-menu-trigger="click"
                                                               data-kt-menu-placement="bottom-end">Actions
                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                            <!--begin::Menu-->
                                                            <div
                                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="{{env('BASE_URL').'unit-measures/'.$unit_measures->id.'/edit'}}"
                                                                       class="menu-link px-3">
                                                                        <i class="bi bi-pencil-square text-info"></i>
                                                                        &nbsp;&nbsp;Edit </a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3 delete-record-btn"
                                                                     api-hook="unit-measures/delete"
                                                                     data-id="{{$unit_measures->id}}">
                                                                    <span class="menu-link px-3">
                                                                        <i class="bi bi-x-circle text-danger"></i>
                                                                        &nbsp;&nbsp;Delete
                                                                    </span>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
                        <!--end::Card-->
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
    @include('unit-measures.create-form-modal')
@endsection

@section('page_level_scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            initialize_datatable({document_title: 'Unit Measures List'})
        });

        $(document).on('click', '#create-unit-measure-from-modal', function () {
            $('#create-unit-measure-modal').modal('show');
        });
    </script>

    @yield('unit_measures_create_form_js')
@endsection
