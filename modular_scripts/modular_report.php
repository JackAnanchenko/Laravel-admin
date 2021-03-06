<div class="card mb-3">
    <div class="card-header">
        <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
            <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Finished Appointments</h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
            <div id="dashboard-actions">
            <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Filter</span></button>
            <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Export</span></button>
            </div>
        </div>
        </div>
    </div>
    <div class="card-body px-0 pt-0">
        <div class="dashboard-data-table">
        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":15,"columnDefs":[{"targets":[0,6],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
            <thead class="bg-200 text-900">
            <tr>
                <th class="sort pr-1 align-middle text-center">ID</th>
                <th class="sort pr-1 align-middle text-center">Name</th>
                <th class="sort pr-1 align-middle text-center">Phone</th>
                <th class="sort pr-1 align-middle text-center">Email</th>
                <th class="sort pr-1 align-middle text-center">Date</th>
                <th class="sort pr-1 align-middle text-center">Time</th>
                <th class="sort pr-1 align-middle text-center">Study</th>
                <th class="sort pr-1 align-middle text-center">Country</th>
                <th class="sort pr-1 align-middle text-center">Type</th>
                <th class="sort pr-1 align-middle text-center">Status</th>
                <th class="sort pr-1 align-middle text-center">Action</th>
            </tr>
            </thead>
            <tbody id="purchases">
            <!-- <?php finished_appointment_report();?> FUNCTION FOR FETCHING DATA -->
            <!-- <?php app_status_finished_to_new();?> FUNCTION TO CHANGE APPLICATION STATUS TO NEW -->
            <!-- <?php app_status_finished_to_onhold();?> FUNCTION TO CHANGE APPLICATION STATUS TO ONHOLD-->
            </tbody>
        </table>
        </div>
    </div>
</div>