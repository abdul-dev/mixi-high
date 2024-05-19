@extends('layout.master')
@section('page_title','Account Settings')
@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        @yield('page_title')</h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card body-->
                    <div class="card-body p-0" id="main-content-body">
                        <!--begin::Form-->
                        <div class="card-px py-5 my-5">
                            <!--begin::Row-->
                            <form id="general_settings" class="form mb-15" method="post">

                                <div class="row mb-3">

                                    <div class="col-md-3">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-7">

                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline image-input-placeholder"
                                                 data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-200px h-200px"
                                                     style="background-image: url('{{ asset('uploads/company/images/'.get_settings_option('business_thumbnail','profile.png'))}}'); width: 150px !important; height: 150px !important;"></div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change thumbnail">
                                                    <i class="ki-outline ki-pencil fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="business_thumbnail"
                                                           id="business_thumbnail"/>
                                                    <input type="hidden" name="thumbnail_remove"/>
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel thumbnail">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove thumbnail">
                        <i class="ki-outline ki-cross fs-2"></i>
                    </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Update Profile Photo</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Col-->
                                    <div class="col-md-9">
                                        <!--begin::Form-->
                                        <!--begin::Row-->
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
                                                                                Business Name
                                                                            </label>
                                                                            <input type="text"
                                                                                   class="form-control form-control-solid"
                                                                                   placeholder="Enter business name"
                                                                                   value="{{get_settings_option('business_name','Britpharma')}}"
                                                                                   id="business_name"
                                                                                   name="business_name"/>
                                                                        </div>
                                                                        <!--end::Col-->

                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Email
                                                                            </label>
                                                                            <input type="email"
                                                                                   class="form-control form-control-solid"
                                                                                   placeholder="Enter email"
                                                                                   value="{{get_settings_option('business_email','sumsolstechnologies@gmail.com')}}"
                                                                                   name="business_email"
                                                                                   id="business_email"/>
                                                                        </div>
                                                                        <!--end::Col-->

                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Business Phone
                                                                            </label>
                                                                            <input type="phone"
                                                                                   class="form-control form-control-solid"
                                                                                   placeholder="Enter phone"
                                                                                   value="{{get_settings_option('business_phone','03333333333')}}"
                                                                                   id="business_phone"
                                                                                   name="business_phone"/>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Business Website
                                                                            </label>
                                                                            <input type="text"
                                                                                   class="form-control form-control-solid"
                                                                                   placeholder="Enter website"
                                                                                   value="{{get_settings_option('business_website','03333333333')}}"
                                                                                   id="business_website"
                                                                                   name="business_website"/>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Industry
                                                                            </label>
                                                                            <select name="business_industry"
                                                                                    id="business_industry  "
                                                                                    data-control="select2"
                                                                                    class="form-select form-select-solid">
                                                                                <option value="" disabled selected>
                                                                                    Select
                                                                                </option>
                                                                                <option
                                                                                    value="cleaning"{{get_settings_option('business_industry',"cleaning") === "cleaning" ? "selected" : ""}}>
                                                                                    Cleaning
                                                                                </option>
                                                                                <option
                                                                                    value="fashion"{{get_settings_option('business_industry',"cleaning") === "fashion" ? "selected" : ""}}>
                                                                                    Fashion
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Col-->
                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Business Currency
                                                                            </label>
                                                                            {{--                                                                            <select id="business_currency_id"name="business_currency_id"--}}
                                                                            {{--                                                                                    data-placeholder="Select a currency..."data-control="select2"--}}
                                                                            {{--                                                                                    class="form-select form-select-solid currency_id jquery-select2">--}}
                                                                            {{--                                                                                {!!getDropdownOptions(['model'=>'Currency','optional'=>1,'column_name'=>'code','selected_value'=> get_settings_option('business_currency_id',1)])!!}--}}
                                                                            {{--                                                                            </select>--}}
                                                                        </div>
                                                                        <!--end::Col-->  <!--begin::Col-->
                                                                    {{--                                                                        <div class="col-md-6 fv-row">--}}
                                                                    {{--                                                                            <label class="fs-5 fw-semibold mb-2">--}}
                                                                    {{--                                                                                Business Timezone--}}
                                                                    {{--                                                                            </label>--}}
                                                                    {{--                                                                            <select id="business_timezone_id"name="business_timezone_id"--}}
                                                                    {{--                                                                                    data-placeholder="Select a timezone..." data-control="select2"--}}
                                                                    {{--                                                                                    class="form-select form-select-solid currency_id jquery-select2">--}}
                                                                    {{--                                                                                {!!getDropdownOptions(['model'=>'Timezone','optional'=>1,'column_name'=>'display_name','selected_value'=> get_settings_option('business_timezone_id',1)])!!}--}}
                                                                    {{--                                                                            </select>--}}
                                                                    {{--                                                                        </div>--}}
                                                                    <!--end::Col-->

                                                                        <!--begin::Col-->
                                                                        <div class="col-md-6 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Business Country
                                                                            </label>
                                                                            <select id="business_country_id"
                                                                                    name="business_country_id"
                                                                                    data-placeholder="Select a currency..."
                                                                                    data-control="select2"
                                                                                    class="form-select form-select-solid country_id jquery-select2">
                                                                                {!!getDropdownOptions(['model'=>'Country','optional'=>1,'column_name'=>'nice_name','selected_value'=> get_settings_option('business_country_id',1)])!!}
                                                                            </select>
                                                                        </div>
                                                                        <!--end::Col-->

                                                                        <!--begin::Col-->
                                                                        <div class="col-md-12 fv-row">
                                                                            <label class="fs-5 fw-semibold mb-2">
                                                                                Address
                                                                            </label>
                                                                            <textarea name="business_address"
                                                                                      class="form-control form-control-solid"
                                                                                      placeholder="Enter business_address"
                                                                                      id="business_address"
                                                                                      rows="1">{{get_settings_option('business_address','Address')}}</textarea>
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
                                                            class="btn btn-primary submit-btn"
                                                            id="general-settings-save-btn">
                                                        <span class="indicator-label submit-btn-label">Submit</span>
                                                        <span class="indicator-progress  submitted-processing-label">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                        </div>
                                        <!--end::Submit-->
                                        <!--end::Form-->

                                    </div>
                                    <!--end::Col-->
                                    <!--end::Col-->
                                </div>
                            </form>
                            <!--end::Row-->

                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection


@section('page_level_scripts')
    <script type="text/javascript">
        $(document).on('click', '#general-settings-save-btn', function (e) {
            e.preventDefault();

            $.ajax({
                url: api_url + 'settings/update-general-settings',
                method: 'POST',
                data: new FormData($('#general_settings')[0]),
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

@endsection
