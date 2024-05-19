<!--begin::Item-->
<div class="mb-5">
    <!--begin::Header-->
    <div class="accordion-header py-3 d-flex" data-bs-toggle="collapse"
         data-bs-target="#kt_accordion_4_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span
                                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Product Images</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div id="kt_accordion_4_item_1" class="fs-6 collapse ps-10"
         data-bs-parent="#kt_accordion_3">
        <!--Start::Basic Product Information-->
        <div class="row">
            <div class="col-12 col-md-12">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-0" id="main-content-body">
                        <!--begin::Form-->
                        <div class="card-px py-5 my-5">
                            <!--begin::Image input-->
                            <div id="images-section">
                                @foreach($product->attachments as $attachment)
                                    <div class="image-input image-input-outline main-image-box ms-5"
                                         data-kt-image-input="true">
                                        <div class="image-input-wrapper w-125px h-125px"
                                             style="background-image: url({{ $attachment->file_name_url }})"></div>
                                        <label
                                            class=""
                                            data-kt-image-input-action="change"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Change image">
                                            {{--                                            <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span--}}
                                            {{--                                                    class="path2"></span></i>--}}

                                            <input type="file" name="product_images[]" class="product_image"
                                                   accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="avatar_remove"/>
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow remove-image-from-db"
                                            data-kt-image-input-action="remove"
                                            data-bs-toggle="tooltip"
                                            data-bs-dismiss="click"
                                            title="Remove image" attachment-id="{{ $attachment->id }}">
            <i class="ki-outline ki-cross fs-3" ></i>
            </span>
                                    </div>
                                @endforeach
                            </div>
                            <!--end::Image input-->
                            <div class="mt-4">
                                <span class="btn btn-primary addMoreImageBtnEdit" type="button" id="addMoreImageBtnEdit">
                                    Add More Images
                                </span>
                            </div>
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div><!--End of col-12-->
        </div><!--End or row-->
        <!--End::Basic Product Information-->
    </div>
    <!--end::Body-->
</div>


<!--end::Item-->
