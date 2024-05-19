<div class="modal fade" tabindex="-1" id="add-flag-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add Flag</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                     aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">
                            Choose Flag
                        </label>
                        <select id="flag_type_id"
                                data-placeholder="Select a Flag..."
                                class="form-select form-select-solid flag_type_id jquery-select2">
                            <option value="">Choose any flag...</option>
                            @foreach($flags as $flag)
                                <option value="{{$flag->id}}" color="{{$flag->color}}">{{$flag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-12 fv-row">
                        <div class="mb-2 mt-2" id="flag-color-div"></div>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-12 fv-row">
                        <label class="fs-5 fw-semibold mb-2">
                            Notes
                        </label>
                        <textarea name="flag_type_notes" id="flag_type_notes" rows="5"
                                  class="form-control form-control-solid flag_type_notes"></textarea>
                    </div>
                    <!--end::Col-->
                </div>
                <!--eND OF ROW-->
                <!--begin::Submit-->
                <div class="separator border-light my-10"></div>

                <div class="row">
                    <div class="col-12">
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button
                                class="btn btn-light me-3 close-modal">Close
                            </button>
                            <button type="submit"
                                    class="btn btn-primary submit-btn" id="flag-save-btn">
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
            </div>
        </div>
    </div>
</div>
@section('page_level_scripts')
    @parent
    <script type="text/javascript">
        $(document).on('change', '#flag_type_id', function () {
            console.log('code',$('#flag_type_id option:selected').attr('color'));
            $('#flag-color-div').css('background-color', $('#flag_type_id option:selected').attr('color'));
        });

        var flag_api_hook;
        var removed_flags = [];
        var selectedIds = [];

        //handling event when user check multiple boxes in the list
        $(document).on('click', '.add-flag', function (e) {
            e.preventDefault();
            flag_api_hook = $(this).attr('api-hook');
            $('#add-flag-modal').modal('show');

        });

        //handling event when user click on add single flag in the list
        $(document).on('click', '.add-flag-single', function (e) {
            e.preventDefault();
            const parentRow = $(this).parents('.data-row');
            parentRow.find('.row-selector-checkbox').prop('checked', true);

            flag_api_hook = $('.add-flag').attr('api-hook');

            $('#add-flag-modal').modal('show');
        });

        //handling event when user add flag in the form
        $(document).on('click', '.add-flag-form', function (e) {
            e.preventDefault();
            flag_api_hook = $(this).attr('api-hook');

            selectedIds.push(record_id);

            $('#add-flag-modal').modal('show');

        });

        $(document).on('click', '.remove-flag', function (e) {
            e.preventDefault();
            var parent = $(this).parent('.flag-badge');
            var id = parent.data('id');

            removed_flags.push(id);

            parent.hide();
        });

        $(document).on('click', '.flag-info', function (e) {
            e.preventDefault();
            $(this).popover({
                content : $(this).data('flag-notes'),
                placement : 'top'
            });

            $(this).popover('toggle');
        });

        $(document).on('click', '#flag-save-btn', function () {

            // Iterate through all checkboxes with the class 'row-selector-checkbox'
            $('.row-selector-checkbox:checked').each(function () {
                // Get the 'data-id' attribute of the parent <tr> element
                const id = $(this).closest('tr').data('id');
                selectedIds.push(id);
            });

            //If no checkbox is checked
            if (selectedIds.length < 1) {
                error_toaster('Nothing selected');
                return false;
            }

            do_post_flags(selectedIds);
        });

        function do_post_flags(selectedIds) {
            disable_submit_btn();
            $.ajax({
                url: api_url + flag_api_hook,
                method: 'POST',
                data: JSON.stringify({
                    'ids': selectedIds,
                    'flag_type_id': $('#flag_type_id').val(),
                    'notes': $('#flag_type_notes').val()
                }),
                dataType: "JSON",
                contentType: "application/json",
                success: function (response) {
                    //empty selectedIds to use again
                    selectedIds = [];
                    enable_submit_btn();
                    if (response.status) {
                        success_toaster(response.message);
                        $('#add-flag-modal').modal('hide');
                        //unchecking all the checked boxes
                        $('.row-selector-checkbox').prop('checked', false);
                    } else {
                        error_toaster(response.message);
                    }
                }
            });
        }

        function get_flags(params) {
            $.ajax({
                url: api_url + 'flags',
                method: 'POST',
                data: JSON.stringify(params),
                dataType: "JSON",
                contentType: "application/json",
                success: function (response) {
                    if (response.status) {

                        append_flags(response.data);

                        console.log(response);
                    } else {
                        error_toaster(response.message);
                    }
                }
            });
        }

        function append_flags(flags) {
            let flags_html = '';
            flags.forEach(function (flag) {
                console.log(flag);
                flags_html += `<span style="background:  ${flag.flag_type.color}"
                                      class="btn btn-sm mb-2 text-light flag-badge" data-id="${flag.id}">
                                    <span class="mb-0 flag-info"
                                      data-flag-notes="${flag.notes}"> ${flag.flag_type.name} </span>
                                    <i title="Remove Flag" class="bi bi-x ms-2 p-0 custom-cross-btn remove-flag"></i>
                                </span>`;
            });

            $('.flags-div').html(flags_html);
        }
    </script>
@endsection
