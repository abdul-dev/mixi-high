<!--begin::Item-->
<div class="mb-5">
    <!--begin::Header-->
    <div class="accordion-header py-3 d-flex" data-bs-toggle="collapse"
         data-bs-target="#kt_accordion_3_item_1">
                                <span class="accordion-icon">
                                    <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span
                                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </span>
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Product basic information</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div id="kt_accordion_3_item_1" class="fs-6 collapse show ps-10"
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
                            <!--begin::Row-->
                            <div class="row mb-3">
                                <!--begin::Col-->
                                <div class="col-md-12 pe-lg-10">
                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">


                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                <span class="required">Product Name</span>
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid" name="product_name"
                                                   placeholder="Enter Product Name"
                                                   id="name"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Unit
                                                {{--                                                <i class="bi bi-plus-circle-fill text-primary fs-4 cursor-pointer"--}}
                                                {{--                                                   id="add-new-category"></i>--}}
                                            </label>
                                            <select
                                                id="unit_measure_id" name="unit_measure_id"
                                                data-placeholder="Select a unit..."
                                                class="form-select form-select-solid unit_measure_id jquery-select2">
                                                {!!getDropdownOptions(['model'=>'UnitMeasure','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Category
{{--                                                <i class="bi bi-plus-circle-fill text-primary fs-4 cursor-pointer"--}}
{{--                                                   id="add-new-category"></i>--}}
                                            </label>
                                            <select
                                                id="product_category_id" name="category_id"
                                                data-placeholder="Select a category..."
                                                class="form-select form-select-solid category_id jquery-select2">
                                                {!!getDropdownOptions(['model'=>'Category','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->


                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Product Tag
{{--                                                <i class="bi bi-plus-circle-fill text-primary fs-4 cursor-pointer"--}}
{{--                                                   id="add-new-product-tag"></i>--}}
                                            </label>
                                            <select id="product_tag_id" name="product_tags[]"
                                                    data-placeholder="Select a product_tag..." multiple
                                                    class="form-select form-select-solid product_tag_id jquery-select2 select2">
                                                {!!getDropdownOptions(['model'=>'Tag','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-12 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                <span class="required">Product Description</span>
                                            </label>
                                            <input type="text" name="description"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter item description"
                                                   id="item_description"/>
                                        </div>
                                        <!--end::Col-->

                                    </div>
                                    <!--end::Row-->

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
            </div><!--End of col-12-->
        </div><!--End or row-->
        <!--End::Basic Product Information-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
