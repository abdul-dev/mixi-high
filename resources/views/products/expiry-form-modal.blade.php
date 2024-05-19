<div class="modal fade" tabindex="-1" id="csv-filter-by-expiry-modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Product Stock Report</h3>

                <!--begin::Close-->
                <div>
                    <div class="btn btn-icon btn-sm btn-active-light-info ms-2 close-reload-icon"
                         title="Close & Reload page">
                        <i class="fa fa-refresh"></i>
                    </div>

                </div>
                <!--end::Close-->

            </div>

            <div class="modal-body ">
                @include('products.create-form')
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-12">
                        <!--begin::Actions-->
                        <div class="text-end">
                            <button type="reset" id="reset_form"
                                    class="btn btn-light me-3"data-bs-dismiss="modal"
                                    aria-label="Close" title="Close">close
                            </button>
                            <button type="submit"
                                    class="btn btn-primary submit-btn" id="download-csv-btn">
                                <span class="indicator-label submit-btn-label" >Generate</span>
                                <span class="indicator-progress  submitted-processing-label">Please wait...
									                        <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@section('product_expiry_modal')
    <script type="text/javascript">
        $(document).on('click', '#download-csv-btn', function (e) {
            e.preventDefault();
            $('#start_required').hide();
            $('#end_required').hide();

            let statDate = $('#start_date').val();
            let endDate = $('#end_date').val();
            if(statDate == ''){
                $('#start_required').show();
                return;
            } if(endDate == ''){
                $('#end_required').show();
                return;
            }
            $('#exp-stock-form').submit();
        });

    </script>
@endsection
