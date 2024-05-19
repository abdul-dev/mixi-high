<form action="#" class="form mb-15" method="post">
    <!--begin::Row-->
    <div class="row g-3 mb-8">
        <!--begin::Col-->
        <div class="col-md-6 fv-row">
            <label class="fs-5 fw-semibold mb-2">
                <span class="required">Name</span>
            </label>
            <input type="text" class="form-control form-control-solid"
                   placeholder="Enter name" name="name" id="product_tag_name"/>
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
                      name="notes" id="product_tag_notes"
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
                        class="btn btn-primary submit-btn" id="product-tags-save-btn">
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

@section('product_tags_create_form_js')
    <script type="text/javascript">
        $(document).on('click', '#product-tags-save-btn', function (e) {
            e.preventDefault();
            do_post_ajax({
                'api_hook': 'tags/store',
                'data': getProductTagFormData(),
            });
        });

        function getProductTagFormData() {
            return {
                'name': $('#product_tag_name').val(),
                'notes': $('#product_tag_notes').val(),
            }
        }
    </script>
@endsection
