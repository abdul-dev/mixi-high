<div class="modal fade" tabindex="-1" id="create-unit-measure-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Create Unit of Measure</h3>

                <!--begin::Close-->
                <div>
                    <div class="btn btn-icon btn-sm btn-active-light-info ms-2 close-reload-icon"
                         title="Close & Reload page">
                        <i class="fa fa-refresh"></i>
                    </div>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                         aria-label="Close" title="Close">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <!--end::Close-->

            </div>

            <div class="modal-body">
                @include('unit-measures.create-form')
            </div>
        </div>
    </div>
</div>
