<!--begin::Item-->
<div class="mb-5">
    <!--begin::Header-->
    <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
         data-bs-target="#kt_accordion_3_item_3">
                                    <span class="accordion-icon">
                                    <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span
                                            class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    </span>
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Product settings</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div id="kt_accordion_3_item_3" class="collapse fs-6 ps-10"
         data-bs-parent="#kt_accordion_3">
        <!--Start::Product Prices-->
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
                                                Trade Price
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter trade price"
                                                   id="trade_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Trade Discount
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter trade discount"
                                                   id="trade_disc"/>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Net Price
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter net price"
                                                   id="net_price"/>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Sell Price
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="Enter sell price"
                                                   id="sell_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price Source
                                            </label>
                                            <select id="price_source_id"
                                                    data-control="select2"
                                                    data-placeholder="Select a price source..."
                                                    class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'PriceSource','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Profit Type
                                            </label>
                                            <select id="profit_type_id"
                                                    data-control="select2"
                                                    data-placeholder="Select a profit type..."
                                                    class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'ProfitType','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Profit Amount
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="profit_amount" readonly/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Profit Percentage
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="profit_percentage" readonly/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                <span class="required">VAT</span>
                                            </label>
                                            <select id="vat_id"
                                                    data-control="select2"
                                                    data-placeholder="Select a VAT..."
                                                    class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'Vat','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                VAT Amount
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="vat_amount" readonly/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Sell Price Inc VAT
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="sell_price_inc_vat" readonly/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Currency
                                            </label>
                                            <select id="product_currency_id"
                                                    data-control="select2"
                                                    data-placeholder="Select a currency..."
                                                    class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'Currency','selected_value'=>33])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Drug Direction
                                            </label>
                                            <select
                                                    id="drug_direction_id"
                                                    data-control="select2"
                                                    data-placeholder="Select a drug direction..."
                                                    class="form-select form-select-solid">
                                                {!!getDropdownOptions(['model'=>'DrugDirection','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Stock in Hand
                                            </label>
                                            <input type="number" step="any"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="stock_in_hand" readonly/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Location Type
                                                <i class="bi bi-plus-circle-fill text-primary fs-4 cursor-pointer"
                                                   id="add-new-location-type"></i>
                                            </label>
                                            <select
                                                id="product_location_type_id"
                                                data-placeholder="Select a location type..."
                                                class="form-select form-select-solid location_type_id jquery-select2">
                                                {!!getDropdownOptions(['model'=>'LocationType','optional'=>1])!!}
                                            </select>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Location
                                                <i class="bi bi-plus-circle-fill text-primary fs-4 cursor-pointer"
                                                   id="add-new-location"></i>
                                            </label>
                                            <select id="product_location_id"
                                                    data-placeholder="Select a location..."
                                                    class="form-select form-select-solid location_id jquery-select2">
                                                {!!getDropdownOptions(['model'=>'Location','optional'=>1])!!}
                                            </select>
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
        <!--END::Product Prices-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
