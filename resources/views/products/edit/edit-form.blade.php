<!--begin::Form-->
<form action="#" class="form mb-15" method="post" id="edit_form">
    <input type="hidden" name="id" value="{{ $product->id }}">
    <!--begin::Accordion-->
    <div class="accordion accordion-icon-collapse" id="kt_accordion_3">
        @include('products.edit.basic-info-section')

        @include('products.edit.attribute-info-section')

        @include('products.edit.price-section')

        @include('products.edit.images-section')

    </div>
    <!--end::Accordion-->

    <!--begin::Submit-->
    <div class="separator border-light my-10"></div>

    <div class="row">
        <div class="col-12">
            <!--begin::Actions-->
            <input type="hidden" id="product_id" value="{{$product->id}}">
            <div class="text-center">
                <button type="reset" id="reset_form"
                        class="btn btn-light me-3">Reset
                </button>
                <button type="submit"
                        class="btn btn-primary submit-btn" id="products-save-btn">
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
@section('products_edit_form_js')


    <script type="text/javascript">
        $(document).on('click', '#products-save-btn', function (e) {
            e.preventDefault();

            $.ajax({
                url: api_url + 'products/update',
                method: 'POST',
                data: new FormData($('#edit_form')[0]),
                dataType: "JSON",
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success: function (response) {
                    enable_submit_btn();
                    if (response.status) {
                        success_toaster(response.message);
                        return true;
                    } else {
                        error_toaster(response.message);
                    }
                }
            });
        });

    </script>

    <script>
        $(document).on('click', '#addMoreImageBtnEdit', function (e) {
            e.preventDefault();
            addImageSection();
        })

        $(document).on('click', '.remove-image-btn', function (e) {
            e.preventDefault();
            $(this).parents('.main-image-box').remove();
        });

        $(document).on('change', '.product_image', function () {
            var fileInput = $(this)[0]; // 'this' refers to the current input element
            var file = fileInput.files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    // 'this' here refers to the FileReader object, not the jQuery object
                    $(fileInput).parents('.main-image-box').find('.image-input-wrapper').css("background-image", 'url(' + e.target.result + ')');
                }

                reader.readAsDataURL(file);
            }
        });


        function addImageSection() {
            var section = `<div class="image-input image-input-outline main-image-box ms-5" data-kt-image-input="true">
            <div class="image-input-wrapper w-125px h-125px"
            style="background-image: url({{asset('assets/media/blank.png')}})"></div>
            <label
            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
            data-kt-image-input-action="change"
            data-bs-toggle="tooltip"
            data-bs-dismiss="click"
            title="Change image">
            <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
            class="path2"></span></i>

            <input type="file" name="product_images[]" class="product_image"
            accept=".png, .jpg, .jpeg"/>
            <input type="hidden" name="avatar_remove"/>
            </label>
            <span
            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow remove-image-btn"
            data-kt-image-input-action="remove"
            data-bs-toggle="tooltip"
            data-bs-dismiss="click"
            title="Remove image">
            <i class="ki-outline ki-cross fs-3"></i>
            </span>
            </div>`;

            $('#images-section').append(section);
        }

        $(document).on('click', '.remove-image-from-db', function (e) {
            e.preventDefault();
            console.log($(this).attr('attachment-id'))
            delete_attachment($(this), $(this).attr('attachment-id'));
        });

        function delete_attachment(thisElem, attachment_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: api_url + 'products/attachment-delete',
                        method: 'POST',
                        data: {'id': attachment_id},
                        dataType: "JSON",
                        success: function (response) {

                            if (response.status) {
                                $(thisElem).parents('.main-image-box').remove();
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection
