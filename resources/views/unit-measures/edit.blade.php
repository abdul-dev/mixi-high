@extends('layout.master')
@section('page_title','Edit Unit of Measure')
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
                    <a href="{{env('BASE_URL').'unit-measures'}}" class="btn btn-sm fw-bold btn-primary">
                        <i class="bi bi-list-check"></i>
                        Unit of Measures List
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
                        <!--begin::Form-->
                        <div class="card-px py-5 my-5">
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-lg-10">
                                    <!--begin::Form-->
                                    <form action="#" class="form mb-15" method="post">
                                        <!--begin::Row-->
                                        <div class="row g-3 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-5 fw-semibold mb-2">
                                                    <span class="required">Name</span>
                                                </label>
                                                <input type="text" class="form-control form-control-solid"
                                                       placeholder="Enter name"  id="unit_measure_name"
                                                       value="{{$unit_measure->name}}"/>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-5 fw-semibold mb-2">
                                                    Is default
                                                </label>
                                                <div class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" id="unit_measure_is_default"
                                                        {{isChecked($unit_measure->is_default)}}/>
                                                    <label class="form-check-label" for="unit_measure_is_default">
                                                        Yes / No
                                                    </label>
                                                </div>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Row-->
                                        <div class="row g-3 mb-8">
                                            <!--begin::Col-->
                                            <div class="col-md-6 fv-row">
                                                <label class="fs-5 fw-semibold mb-2">
                                                    Notes
                                                </label>
                                                <textarea class="form-control form-control-solid" rows="6" id="unit_measure_notes"
                                                          placeholder="Type any additional information here...">{{$unit_measure->notes}}</textarea>
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Submit-->
                                        <div class="separator border-light my-10"></div>

                                        <div class="row">
                                            <div class="col-12">
                                                <!--begin::Actions-->
                                                <input type="hidden" id="id" value="{{$unit_measure->id}}">
                                                <div class="text-center">
                                                    <button type="reset" id="reset_form"
                                                            class="btn btn-light me-3">Reset
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-primary submit-btn"
                                                            id="unit-measures-save-btn">
                                                        <span class="indicator-label submit-btn-label">Submit</span>
                                                        <span class="indicator-progress  submitted-processing-label">Please wait...
									                        <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                        </div>
                                        <!--end::Submit-->
                                    </form>
                                    <!--end::Form-->
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
        $(document).on('click', '#unit-measures-save-btn', function (e) {
            e.preventDefault();
            do_post_ajax({
                'api_hook': 'unit-measures/update',
                'data': getUnitMeasureFormData(),
            });
        });

        function getUnitMeasureFormData() {
            return {
                'id': $('#id').val(),
                'name': $('#unit_measure_name').val(),
                'is_default': getCheckboxValue('#unit_measure_is_default'),
                'notes': $('#unit_measure_notes').val(),
            }
        }
    </script>
@endsection
