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
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Miscellaneous product information</h3>
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
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Delivery Period
                                            </label>
                                            <select
                                                id="delivery_period_id"
                                                data-control="select2"
                                                data-placeholder="Select a delivery period..."
                                                class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'DeliveryPeriod','optional'=>1, 'selected_option'=>$product->delivery_period_id])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Psize And Price Per Psize Type
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter Psize and price per psize type"
                                                   id="price_per_psize_type"
                                                   value="{{$product->price_per_psize_type}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                PSize Type
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter psize type"
                                                   id="psize_type"
                                                   value="{{$product->psize_type}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Manf Notes
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter manf notes"
                                                   id="manf_notes"
                                                   value="{{$product->manf_notes}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Formulations
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter formulation"
                                                   id="formulation"
                                                   value="{{$product->formulation}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Special Container
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter special container"
                                                   id="special_container"
                                                   value="{{$product->special_container}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                MA Holder
                                            </label>
                                            <input type="text"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter MA Holder"
                                                   id="ma_holder"
                                                   value="{{$product->ma_holder}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Case Size
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter case size"
                                                   id="case_size"
                                                   value="{{$product->case_size}}"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Web Order
                                            </label>
                                            <div
                                                class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                       id="web_order" {{isChecked($product->web_order)}}/>
                                                <label class="form-check-label" for="web_order">
                                                    Yes / No
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-9 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Notes
                                            </label>
                                            <textarea id="product_notes"
                                                      class="form-control form-control-solid"
                                                      placeholder="Enter notes">{{$product->notes}}</textarea>
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
