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
                   placeholder="Enter name" id="category_name"/>
        </div>
        <!--end::Col-->

    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-3 mb-8">
        <!--begin::Col-->
        <div class="col-md-12 fv-row">
            <label class="fs-5 fw-semibold mb-2">
                Notes
            </label>
            <textarea class="form-control form-control-solid" rows="6"
                      id="category_notes"
                      placeholder="Type any additional information here..."></textarea>
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-3 mb-8">
        <div class="col-md-12 fv-row">
            <label class="fs-5 fw-semibold mb-2">
                Upload category photo
            </label>
            <br/>
            <!--begin::Image input-->
            <div class="image-input image-input-outline" data-kt-image-input="true">
                <!--begin::Image preview wrapper-->
                <div class="image-input-wrapper w-125px h-125px"
                     style="background-image: url({{asset('assets/media/blank.png')}})"></div>
                <!--end::Image preview wrapper-->

                <!--begin::Edit button-->
                <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Change image">
                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                    <!--begin::Inputs-->
                    <input type="file" name="category_image" id="category_image" accept=".png, .jpg, .jpeg"/>
                    <input type="hidden" name="avatar_remove"/>
                    <!--end::Inputs-->
                </label>
                <!--end::Edit button-->

                <!--begin::Remove button-->
                <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow remove-image-btn"
                    data-kt-image-input-action="remove"
                    data-bs-toggle="tooltip"
                    data-bs-dismiss="click"
                    title="Remove image">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
                <!--end::Remove button-->
            </div>
            <!--end::Image input-->
        </div>
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
                        class="btn btn-primary submit-btn" id="categories-save-btn">
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

@section('categories_create_form_js')
    <script type="text/javascript">
        $(document).on('click', '#categories-save-btn', function (e) {
            e.preventDefault();
            do_post_ajax({
                'api_hook': 'categories/store',
                'data': getCategoryFormData(),
            });
        });

        function getCategoryFormData() {
            return {
                'image': category_image_base64,
                'name': $('#category_name').val(),
                'notes': $('#category_notes').val(),
            }
        }


        /**
         * @IMAGE- RELATED FUNCTIONS
         * */
        var category_image_base64;

        function convertImageToBase64(selector) {
            var reader = new FileReader();
            var f = $(selector)[0].files;
            reader.onloadend = function () {
                category_image_base64 = reader.result;
            };
            reader.readAsDataURL(f[0]);
        }

        $(document).on('change', '#category_image', function () {
            convertImageToBase64(this);
        });

        $(document).on('click', '.remove-image-btn', function () {
            category_image_base64 = '';
        });

        /**
         * @END-IMAGE- RELATED FUNCTIONS
         * */

    </script>
@endsection
