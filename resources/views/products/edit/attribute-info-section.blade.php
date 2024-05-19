<!--begin::Item-->
<div class="mb-5">
    <!--begin::Header-->
    <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
         data-bs-target="#kt_accordion_3_item_4">
                                    <span class="accordion-icon">
                                    <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span
                                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    </span>
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Product information</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div id="kt_accordion_3_item_4" class="collapse fs-6 ps-10"
         data-bs-parent="#kt_accordion_3">
        <!--Start::Last Section-->
        <div class="row mt-3">
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
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[0]->title }}"
                                                   id=""/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[1]->title }}"
                                                   id=""/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[2]->title }}"
                                                   id=""/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[3]->title }}"
                                                   id=""/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[4]->title }}"
                                                   id=""/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <input type="text" step="any" name="attributes[]"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Information"
                                                   value="{{ $product->product_attributes[5]->title }}"
                                                   id=""/>
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
        <!--END::Last Section-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
