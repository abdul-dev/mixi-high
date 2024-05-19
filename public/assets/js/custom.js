$(document).ready(function () {
    $.ajaxSetup({
        dataType: 'json'
    });

    $(document).ajaxStart(function () {
        toggle_block_page();
    });
    $(document).ajaxComplete(function () {
        toggle_block_page();
    });

    initialize_datepicker();
    initialize_datetimepicker();
    initialize_quill();

    $('.select2').select2();
});

function do_post_ajax(params, is_stringify = true) {
    disable_submit_btn();
    form_data = '';
    content_type = '';

    if (is_stringify == true) {
        form_data = JSON.stringify(params.data);
        content_type = 'application/json';
    } else {
        form_data = params.data;
        content_type = 'application/x-www-form-urlencoded; charset=UTF-8';
    }

    $.ajax({
        url: api_url + params.api_hook,
        method: params.method || 'POST',
        data: form_data,
        dataType: "JSON",
        contentType: content_type,
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
}


/**
 * DELETE A RECORD WITH CONFIRMATION BOX
 * ....
 * */
$(document).on('click', '.delete-record-btn', function () {
    delete_confirmation_ajax({
        'api_hook': $(this).attr('api-hook'),
        'target_element': $(this),
        'data': {
            'id': $(this).attr('data-id')
        }
    })
});

function delete_confirmation_ajax(params) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: api_url + params.api_hook,
                method: params.method || 'POST',
                data: JSON.stringify(params.data),
                dataType: "JSON",
                contentType: "application/json",
                success: function (response) {
                    $(params.target_element).parents('tr').remove();
                    if (response.status) {
                        Swal.fire(
                            'Deleted!',
                            response.message,
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                            response.message,
                            'error'
                        )
                    }
                }
            });
        }
    })
}

/**
 * END - DELETE A RECORD WITH CONFIRMATION BOX
 * ....
 * */


/**
 * TOGGLE BLOCK /UNBLOCK PAGE
 * ....
 * */
var target = document.querySelector('#main-content-body');
var blockUI = new KTBlockUI(target, {
    message: '<div class="blockui-message"><span class="spinner-border text-primary"></span> Processing...</div>',
});

function toggle_block_page() {
    if (blockUI.isBlocked()) {
        blockUI.release();
    } else {
        blockUI.block();
    }
}

/**
 * END- TOGGLE BLOCK /UNBLOCK PAGE
 * ....
 * */

function disable_submit_btn() {
    $('.submit-btn').attr('disabled', true);
    $('.submit-btn-label').hide();
    $('.submitted-processing-label').show();
}

function enable_submit_btn() {
    $('.submit-btn').attr('disabled', false);
    $('.submit-btn-label').show();
    $('.submitted-processing-label').hide();
}

function initialize_datatable(params) {
    let table_selector = params.table_selector || '#datatable';
    let buttons_selector = params.buttons_selector || '#datatable_export_buttons';
    let export_menu_selector = params.export_menu_selector || '#datatable_export_menu';
    let document_title = params.document_title || '#document_title';
    KTDatatablesExample.init(table_selector, buttons_selector, export_menu_selector, document_title);
}

function initialize_datepicker(selector = '.date_picker') {
    $(selector).flatpickr({
        enableTime: false,
        dateFormat: "Y-m-d",
    });
}

function initialize_datetimepicker(selector = '.datetime_picker') {
    $(selector).flatpickr({
        enableTime: true,
        dateFormat: "d, M Y, H:i",
    });
}

function initialize_quill(selector = '.text-editor') {
    let quill = $(selector).length;

    // Break if element not found
    if (!quill) {
        return;
    }
    quill = new Quill(selector, {
        modules: {
            toolbar: [
                [{
                    header: [1, 2, false]
                }],
                ['bold', 'italic', 'underline'],
                ['image', 'code-block']
            ]
        },
        placeholder: 'Type your text here...',
        theme: 'snow' // or 'bubble'
    });
}

function success_toaster(message = 'Everything is cool') {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.success(message, "Success");
}

function error_toaster(message = 'Something happend wrong') {
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    toastr.error(message, "Error");
}

$(document).on('click', '.logout', function (e) {
    e.preventDefault();
    $.ajax({
        url: api_url + 'auth/logout',
        type: "POST",
        dataType: "JSON",
        success: function (response) {
            if (response.status) {
                window.location = base_url + 'auth/login';
            }

        }
    });
});

function ifChecked(selector) {
    if ($(selector).is(':checked')) {
        return "on";
    } else {
        return "off";
    }
}


$(document).on('click', '.close-modal', function () {
    $(this).parents('.modal').modal('hide');
});

function refresh_page(link = "") {
    if (link == "") {
        window.location.assign(window.location.href);
    } else {
        window.location.assign(link);
    }
}

function getCheckboxValue(selector) {
    if ($(selector).is(':checked')) {
        return 1;
    } else {
        return 0;
    }
}

function isEmptyValue(str) {
    if (str == '' || str == undefined || str == 'undefined' || str == null || str == 'null' || str.length == 0 || str == 0 || str == '0') {
        return true;
    }
    return false;
}
