var tableBody = $('#datatable').find('tbody');
var table = $('#datatable');
th_count = 0;
var paginationContainer = $('.pagination-box');
var page = 1;
currentDatatableObj = '';

/*************************
 * LOAD DATATABLE FUNCTION
 */
function drawTable(datatableObj) {

    th_count = $(table).find('thead').find('td').length;

    // table heading draw here
    if (th_count <= 0) {
        drawTableTheadRow();
    }

    var count = 1;
    currentDatatableObj = datatableObj;
    $(table).find('tbody').html('');

    $.ajax({
        url: datatableObj.url,
        type: 'GET',
        data: {
            draw: page,
            start: (page - 1) * 10,
            length: $('.sorting-box').val()
        },
        success: function (response) {
            drawTableRow(response);
            if (response.status == true) {
                createPagination(response.recordsTotal, page);
            }
        }
    });

    function drawTableTheadRow() {
        var theadTd = ``;
        var cols = datatableObj.cols;
        for (const value in cols) {
            theadTd += `<td>${cols[value]}</td>`;
        }

        // check if any action come
        if (datatableObj.editMethod || datatableObj.deleteMethod || datatableObj.searchMethod) {
            theadTd += '<td>Action</td>'
        }

        var tableThead = `<thead>
                            <tr class="text-start text-gray-400-outed fw-bold fs-7 text-uppercase">
                                ${theadTd}
                            </tr>
                           </thead>`;

        table.append(tableThead);
    }


    function drawTableRow(response) {
        collectRows = '';
        if (response.data.length > 0) {
            $(response.data).each(function (i, value) {
                var row = createRow(value, datatableObj);

                collectRows += row;
            });
        } else {
            row = `<tr><td colspan="${th_count}" class="text-center">No Record Found</td></tr>`;
            collectRows = row;
        }

        table.append(`<tbody class="fw-semibold text-gray-600">
                                                ${collectRows}
                                                </tbody>`);
    }

    // create pagination here
    function createPagination(totalRecords, currentPage) {
        var totalPages = Math.ceil(totalRecords / 10);
        var paginationNumberHtml = '';

        for (var i = 1; i <= totalPages; i++) {

            if (i == 4) {
                paginationNumberHtml += '<li class="page-item "><a href="#" class="page-link">...</a></li>';
            } else {
                paginationNumberHtml += '<li class="page-item my-active ' + (i == currentPage ? 'active' : '') + '"><a class="page-link ' + (i === currentPage ? 'active' : '') + '">' + i + '</a></li>';
            }
        }

        var pagination = `<ul class="pagination">
                    <ul class="pagination pager">
                        <li class="page-item previous disabled"><a href="#" class="page-link"><i
                                                    class="previous"></i></a></li>
                        ${paginationNumberHtml}
                        <li class="page-item next"><a href="#" class="page-link" rel="next" start="2"><i
                                                    class="next"></i></a></li>
                    </ul>`;

        paginationContainer.html(pagination);
    }

    // search function here
    $(document).on('change keyup', '#search', function () {
        setTimeout(function () {
            $.ajax({
                url: api_url + datatableObj.searchMethod,
                type: 'POST',
                data: {
                    'name': $("#search").val(),
                },
                success: function (response) {
                    $(table).find('tbody').html('');
                    drawTableRow(response);
                }
            });
        }, 200)
    });

    function resolve(path, obj) {
        return path.split('.').reduce(function (prev, curr) {
            return prev ? prev[curr] : null
        }, obj || self)
    }


    // create row here
    function createRow(value, datatableObj, td_length = 0) {
        makeTd = '';
        actionBtns = '';
        actionTd = '';

        // ready dynamic data here
        for (key in datatableObj.cols) {
            makeTd += `<td>${isEmptyValue(resolve(key, value)) == false ? resolve(key, value) : ''}</td>`;
        }


        // ready action buttons here

        if (datatableObj.editMethod) {
            actionBtns += `<li>
                                  <a href="${base_url + datatableObj.editMethod + '/' + value.id + '/edit'}"
                    class="menu-link px-3 dropdown-item">
                    <i class="bi bi-pencil-square text-info"></i>
                    &nbsp;&nbsp;Edit </a>
</li>`;
        }

        if (datatableObj.deleteMethod) {
            actionBtns += `<li>
                                  <span class="menu-link px-3 dropdown-item delete-record-btn" api-hook="${datatableObj.deleteMethod}" data-id="${value.id}">
                    <i class="bi bi-x-circle text-danger"></i>
                    &nbsp;&nbsp;Delete
                    </span>
</li>`;
        }

        // check here if any action method allow
        if (datatableObj.deleteMethod || datatableObj.editMethod || datatableObj.searchMethod) {
            actionTd = `<td class="text-center">

                          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                              <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                </button>
                                <ul class="dropdown-menu">
                                ${actionBtns}
                                </ul>
                              </div>
                            </div>
                    </td>`;
        }


        // row create here
        row = `<tr>
                          ${makeTd}
                          ${actionTd}
                    </tr>`;

        return row;
    }
}

// next show page here
$(document).on('click', '.page-link', function (e) {
    e.preventDefault();
    console.log($(this))
    page = $(this).text();
    if ($(this).attr('rel') == 'next') {
        start = $(this).attr('start');
        $(this).attr('start', Number(start) + 1);
        page = start;
    }
    drawTable(currentDatatableObj)
});
