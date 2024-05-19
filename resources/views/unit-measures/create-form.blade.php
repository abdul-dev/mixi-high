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
                   placeholder="Enter name" id="unit_measure_name"/>
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-semibold mb-2">
                Is default
            </label>
            <div class="form-check form-switch form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" id="unit_measure_is_default"/>
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
            <textarea class="form-control form-control-solid" rows="6"
                      id="unit_measure_notes"
                      placeholder="Type any additional information here..."></textarea>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Submit-->
    <div class="separator border-light my-10"></div>

    <div class="row">
        <div class="col-12">
            <!--begin::Actions-->
            <div class="text-center">
                <button type="reset" id="reset_form"
                        class="btn btn-light me-3">Reset
                </button>
                <button type="submit"
                        class="btn btn-primary submit-btn" id="unit-measures-save-btn">
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

@section('unit_measures_create_form_js')
    <script type="text/javascript">
        $(document).on('click', '#unit-measures-save-btn', function (e) {
            e.preventDefault();
            do_post_ajax({
                'api_hook': 'unit-measures/store',
                'data': getUnitMeasureFormData(),
            });
        });

        function getUnitMeasureFormData() {
            return {
                'name': $('#unit_measure_name').val(),
                'is_default': getCheckboxValue('#unit_measure_is_default'),
                'notes': $('#unit_measure_notes').val(),
            }
        }
    </script>
@endsection
