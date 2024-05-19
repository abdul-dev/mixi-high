<!--begin::Item-->
<div class="mb-5">
    <!--begin::Header-->
    <div class="accordion-header py-3 d-flex collapsed" data-bs-toggle="collapse"
         data-bs-target="#kt_accordion_3_item_2">
                                <span class="accordion-icon">
                                <i class="ki-duotone ki-plus-square fs-3 accordion-icon-off"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                                <i class="ki-duotone ki-minus-square fs-3 accordion-icon-on"><span class="path1"></span><span
                                        class="path2"></span></i>
                                </span>
        <h3 class="fs-4 fw-semibold mb-0 ms-4">Product prices</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div id="kt_accordion_3_item_2" class="collapse fs-6 ps-10"
         data-bs-parent="#kt_accordion_3">
        <!--Start::Product Info 2-->
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
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[0]"
                                                   class="form-control form-control-solid"
                                                   placeholder="0" value="{{ $product->details[0]->quantity ?? ''  }}"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[0]"
                                                   class="form-control form-control-solid" value="{{ $product->details[0]->unit_price ?? ''  }}"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->


                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[1]"
                                                   class="form-control form-control-solid" value="{{ $product->details[1]->quantity ?? ''  }}"
                                                   placeholder="0"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[1]"
                                                   class="form-control form-control-solid" value="{{ $product->details[1]->unit_price ?? ''  }}"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->


                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[2]"
                                                   class="form-control form-control-solid" value="{{ $product->details[2]->quantity ?? ''  }}"
                                                   placeholder="0"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[2]" value="{{ $product->details[2]->unit_price ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->


                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[3]" value="{{ $product->details[3]->quantity ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[3]" value="{{ $product->details[3]->unit_price ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->


                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[4]" value="{{ $product->details[4]->quantity ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[4]" value="{{ $product->details[4]->unit_price ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->


                                    </div>
                                    <!--end::Row-->

                                    <!--begin::Row-->
                                    <div class="row g-3 mb-8">

                                        <!--begin::Col-->
                                        <div class="col-md-6 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Quantity:
                                            </label>
                                            <input type="number" step="any" name="quantity[5]" value="{{ $product->details[5]->quantity ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0"
                                                   id="avg_net_price"/>
                                        </div>
                                        <!--end::Col-->

                                        <!--begin::Col-->
                                        <div class="col-md-3 fv-row">
                                            <label class="fs-5 fw-semibold mb-2">
                                                Price:
                                            </label>
                                            <input type="number" step="any" name="price[5]" value="{{ $product->details[5]->unit_price ?? ''  }}"
                                                   class="form-control form-control-solid"
                                                   placeholder="0.00"
                                                   id="avg_net_price"/>
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
        <!--END::Product Info 2-->
    </div>
    <!--end::Body-->
</div>
<!--end::Item-->
