@if(Session::has('error'))
    <div class="toast align-items-center text-white bg-danger border-0" style="position: absolute; top: 80px; right: 5px;" role="alert" aria-live="assertive" aria-atomic="true" id="toastNotification">
        <div class="d-flex toast-body">
            <span class="error-message">{{ Session::get("error") }}</span>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif
@if(Session::has('success'))
    <div class="toast align-items-center text-white bg-success border-0"  style="position: absolute; top: 80px; right: 5px;" role="alert" aria-live="assertive" aria-atomic="true" id="toastNotification">
        <div class="d-flex">
            <div class="toast-body">
                {{ Session::get("success") }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif
@if(Session::has('info'))
    <div class="toast align-items-center text-white bg-info border-0"  style="position: absolute; top: 80px; right: 5px;" role="alert" aria-live="assertive" aria-atomic="true" id="toastNotification">
        <div class="d-flex">
            <div class="toast-body">
                {{ Session::get("info") }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
@endif