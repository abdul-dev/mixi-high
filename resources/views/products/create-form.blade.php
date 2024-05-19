<!--begin::Form-->
<form action="{{env('WEB_URL')}}products/stock-report"target="_blank" class="form" id="exp-stock-form" method="get">
    <!--begin::Row-->
    <div class="row ">
        <!--begin::Col-->
        <div class="col-md-12">
            <label class="fs-5 fw-semibold mb-2">
                <span class="required">From date</span><span id="start_required"style="display: none;color: red;"> (Required)</span>
            </label>
            <!--begin::Datepicker-->
            <input type="text"  name="start_date"required="true"
                class="form-control form-control-solid ps-12 date_picker"
                placeholder="Select a date" id="start_date"/>
            <!--end::Datepicker-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-md-12 pt-3">
            <label class="fs-5 fw-semibold mb-2">
                <span class="required">To date</span><span id="end_required"style="display: none;color: red;"> (Required)</span>
            </label>
            <!--begin::Datepicker-->
            <input type="text" name="end_date"
                class="form-control form-control-solid ps-12 date_picker"
                placeholder="Select a date" required="true" id="end_date"/>
            <!--end::Datepicker-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</form>
<!--end::Form-->


