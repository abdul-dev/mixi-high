@extends('layout.master')
@section('page_title','Products List')
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

                    <!--begin::Filter menu-->
{{--                    <div class="m-0">--}}
{{--                        <!--begin::Menu toggle-->--}}
{{--                        <a href="#"--}}
{{--                           class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"--}}
{{--                           data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">--}}
{{--                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">--}}
{{--                                <span class="path1"></span>--}}
{{--                                <span class="path2"></span>--}}
{{--                            </i>Filter</a>--}}
{{--                        <!--end::Menu toggle-->--}}
{{--                        <!--begin::Menu 1-->--}}
{{--                        <div class="menu menu-sub menu-sub-dropdown w-md-700px w-300px" data-kt-menu="true"--}}
{{--                             id="kt_menu_641ac40d84f82">--}}
{{--                            <!--begin::Header-->--}}
{{--                            <div class="px-7 py-5">--}}
{{--                                <div class="fs-5 text-dark fw-bold">Filter Options</div>--}}
{{--                            </div>--}}
{{--                            <!--end::Header-->--}}
{{--                            <!--begin::Menu separator-->--}}
{{--                            <div class="separator border-gray-200"></div>--}}
{{--                            <!--end::Menu separator-->--}}
{{--                            <!--begin::Form-->--}}
{{--                            <div class="px-7 py-5">--}}
{{--                                <form action="">--}}
{{--                                    <div class="row">--}}

{{--                                        <div class="col-md-3 col-12">--}}
{{--                                            <!--begin::Input group-->--}}
{{--                                            <div class="mb-10">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <label class="form-label fw-semibold">Unit:</label>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Input-->--}}
{{--                                                <div>--}}
{{--                                                    <select class="form-select form-select-solid" id="unit_measure_id"--}}
{{--                                                            name="unit_measure_id"--}}
{{--                                                            data-kt-select2="true" data-placeholder="Select option"--}}
{{--                                                            data-dropdown-parent="#kt_menu_641ac40d84f82"--}}
{{--                                                            data-allow-clear="true">--}}
{{--                                                        {!!getDropdownOptions(['model'=>'UnitMeasure','optional'=>1])!!}--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Input-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Input group-->--}}
{{--                                        </div><!--End of col-4-->--}}
{{--                                        <div class="col-md-3 col-12">--}}
{{--                                            <!--begin::Input group-->--}}
{{--                                            <div class="mb-10">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <label class="form-label fw-semibold">Category:</label>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Input-->--}}
{{--                                                <div>--}}
{{--                                                    <select class="form-select form-select-solid" id="category_id"--}}
{{--                                                            name="category_id"--}}
{{--                                                            data-kt-select2="true" data-placeholder="Select option"--}}
{{--                                                            data-dropdown-parent="#kt_menu_641ac40d84f82"--}}
{{--                                                            data-allow-clear="true">--}}
{{--                                                        {!!getDropdownOptions(['model'=>'Category','optional'=>1])!!}--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Input-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Input group-->--}}
{{--                                        </div><!--End of col-4-->--}}
{{--                                    </div><!--End of row-->--}}

{{--                                    <!--begin::Actions-->--}}
{{--                                    <div class="d-flex justify-content-end">--}}
{{--                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"--}}
{{--                                                data-kt-menu-dismiss="true">Close--}}
{{--                                        </button>--}}
{{--                                        <button type="submit" class="btn btn-sm btn-primary apply-search-filter"--}}
{{--                                                data-kt-menu-dismiss="true">--}}
{{--                                            Apply--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <!--end::Actions-->--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                            <!--end::Form-->--}}
{{--                        </div>--}}
{{--                        <!--end::Menu 1-->--}}
{{--                    </div>--}}
                    <!--end::Filter menu-->

                    <a href="{{env('BASE_URL').'products/create'}}" class="btn btn-sm fw-bold btn-primary">
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
                                        {{-- datatable header--}}
                                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                            <div class="card-title">
                                                <!--begin::Search-->
                                                <div class="d-flex align-items-center position-relative my-1">
                                                    <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-4"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    <input type="text" data-kt-filter="search"
                                                           class="form-control form-control-solid w-250px ps-14"
                                                           placeholder="Search Report"/>
                                                </div>
                                                <!--end::Search-->
                                                <!--begin::Export buttons-->
                                                <div id="kt_datatable_example_1_export" class="d-none"></div>
                                                <!--end::Export buttons-->
                                            </div>
                                        </div>

                                        {{-- datatable header--}}
                                        <div class="card-body">
                                            <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                                                   id="datatable">
                                                {{--                                                <thead>--}}
                                                {{--                                                <!--begin::Table row-->--}}
                                                {{--                                                <tr class="text-start text-gray-400-outed fw-bold fs-7 text-uppercase">--}}
                                                {{--                                                    <th>Item Code</th>--}}
                                                {{--                                                    <th>Product Group</th>--}}
                                                {{--                                                    <th>Item Description</th>--}}
                                                {{--                                                    <th>Strength</th>--}}
                                                {{--                                                    <th>Pack Size</th>--}}
                                                {{--                                                    <th class="text-center">Action</th>--}}
                                                {{--                                                </tr>--}}
                                                {{--                                                <!--end::Table row-->--}}
                                                {{--                                                </thead>--}}
                                                {{--                                                <tbody class="fw-semibold text-gray-600">--}}
                                                {{--                                                @foreach($products as $product)--}}
                                                {{--                                                    <tr>--}}
                                                {{--                                                        <td>--}}
                                                {{--                                                            {{$product->item_code}}--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                        <td>--}}
                                                {{--                                                            {{$product->product_group ?  $product->product_group->name : ""}}--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                        <td>--}}
                                                {{--                                                            {{$product->item_description}} @if( $product->product_tag)--}}
                                                {{--                                                                ({{ $product->product_tag->name}})--}}
                                                {{--                                                            @endif--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                        <td>--}}
                                                {{--                                                            {{$product->strength}}--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                        <td>--}}
                                                {{--                                                            {{$product->pack_size}}--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                        <td class="text-center">--}}
                                                {{--                                                            <a href="#"--}}
                                                {{--                                                               class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"--}}
                                                {{--                                                               data-kt-menu-trigger="click"--}}
                                                {{--                                                               data-kt-menu-placement="bottom-end">Actions--}}
                                                {{--                                                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>--}}
                                                {{--                                                            <!--begin::Menu-->--}}
                                                {{--                                                            <div--}}
                                                {{--                                                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"--}}
                                                {{--                                                                data-kt-menu="true">--}}
                                                {{--                                                                <!--begin::Menu item-->--}}
                                                {{--                                                                <div class="menu-item px-3">--}}
                                                {{--                                                                    <a href="{{env('BASE_URL').'products/'.$product->id.'/edit'}}"--}}
                                                {{--                                                                       class="menu-link px-3">--}}
                                                {{--                                                                        <i class="bi bi-pencil-square text-info"></i>--}}
                                                {{--                                                                        &nbsp;&nbsp;Edit </a>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                                <!--end::Menu item-->--}}
                                                {{--                                                                <!--begin::Menu item-->--}}
                                                {{--                                                                <div class="menu-item px-3 delete-record-btn"--}}
                                                {{--                                                                     api-hook="products/delete"--}}
                                                {{--                                                                     data-id="{{$product->id}}">--}}
                                                {{--                                                                    <span class="menu-link px-3">--}}
                                                {{--                                                                        <i class="bi bi-x-circle text-danger"></i>--}}
                                                {{--                                                                        &nbsp;&nbsp;Delete--}}
                                                {{--                                                                    </span>--}}
                                                {{--                                                                </div>--}}
                                                {{--                                                                <!--end::Menu item-->--}}
                                                {{--                                                            </div>--}}
                                                {{--                                                            <!--end::Menu-->--}}
                                                {{--                                                        </td>--}}
                                                {{--                                                    </tr>--}}
                                                {{--                                                @endforeach--}}
                                                {{--                                                </tbody>--}}
                                            </table>
                                        </div>
                                    </div>
                                    <div class="pagination-box">
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
    @include('products.expiry-form-modal')

@endsection

@section('page_level_scripts')
    @yield('product_expiry_modal')
    <script src="{{asset('assets/js/common_datatables.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var datatableObj = {
                'url': api_url + 'products/using-pagination',
                'cols': {
                    'name': 'Product Name',  //data_column_name : Title
                    'unit_measure.name': 'Unit',  //data_column_name : Title
                    'description': 'DESCRIPTION',  //data_column_name : Title
                },
                'editMethod': 'products', //false-if not show edit button
                'deleteMethod': 'products/delete', //false-if not show delete button
                'searchMethod': 'products/search', //false-if not show delete button
            };
            drawTable(datatableObj);
            // drawTable(1);
        });

        $(document).on('click', '#exp-csv-download', function (e) {
            e.preventDefault();
            $('#csv-filter-by-expiry-modal').find('.close-reload-icon').hide();
            $('#csv-filter-by-expiry-modal').modal('show');
        });

    </script>

@endsection

