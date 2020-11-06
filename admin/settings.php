<?php
include "../site/admin_header.php";
// update_account();
?>

<!-- =========== START - Content =========== -->
<!-- =========== START - Content =========== -->
<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Settings</h5>
    </div>
    <div class="card-body bg-light">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item"><a class="nav-link active text-black" id="Profile-tab" data-toggle="tab" href="#tab-Profile" role="tab" aria-controls="tab-home" aria-selected="true">Profile</a></li>
            <li class="nav-item"><a class="nav-link text-black" id="About-tab" data-toggle="tab" href="#tab-About" role="tab" aria-controls="tab-profile" aria-selected="false">About Us</a></li>
            <li class="nav-item"><a class="nav-link text-black" id="Terms-tab" data-toggle="tab" href="#tab-Terms" role="tab" aria-controls="tab-contact" aria-selected="false">Terms of Service</a></li>
            <li class="nav-item"><a class="nav-link text-black" id="Privacy-tab" data-toggle="tab" href="#tab-Privacy" role="tab" aria-controls="tab-contact" aria-selected="false">Privacy Policy</a></li>
            <li class="nav-item"><a class="nav-link text-black" id="Payment-tab" data-toggle="tab" href="#tab-Payment" role="tab" aria-controls="tab-contact" aria-selected="false">Refund Terms</a></li>
        </ul>

        <div class="tab-content border-x border-bottom p-3" id="myTabContent">
            <!-- =========== TAB 1 =========== -->
            <!-- =========== TAB 1 =========== -->
            <div class="tab-pane fade show active" id="tab-Profile" role="tabpanel" aria-labelledby="Profile-tab">
                <div class="card mb-3">
                    <div class="card-header">
                    <h5 class="mb-0">Account Info</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label for="email1">Email Address</label>
                                        <input class="form-control" id="email1" name="email1" type="email" placeholder="Email Address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email2">Confirm Email Address</label>
                                        <input class="form-control" id="email2" name="email2" type="email" placeholder="Confirm Email Address" required>
                                    </div>

                                    <hr>

                                    <div class="form-group">
                                        <label for="curr_password">Current Password</label>
                                        <input class="form-control" id="curr_password" name="curr_password" type="password" placeholder="Current Password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password1">Password</label>
                                        <input class="form-control" id="password1" name="password1" type="password" placeholder="Password" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password2">Confirm Password</label>
                                        <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm Password" required>
                                    </div>

                                    <button class="btn btn-yellow mb-3" type="submit" name="update_account">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- =========== TAB 2 =========== -->
            <!-- =========== TAB 2 =========== -->
            <div class="tab-pane fade" id="tab-About" role="tabpanel" aria-labelledby="About-tab">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">About Us Sections</h5>
                            </div>
                            <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                                <div id="dashboard-actions">
                                    <button class="btn btn-yellow btn-sm" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_about.php">New</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="dashboard-data-table">
                            <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pr-1 align-middle text-center">Section Order ID</th>
                                <th class="sort pr-1 align-middle text-center">Section Title</th>
                                <th class="sort pr-1 align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchases">
                                <?php
                                view_about();
                                delete_about();
                                ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- =========== TAB 4 =========== -->
            <!-- =========== TAB 4 =========== -->
            <div class="tab-pane fade" id="tab-Terms" role="tabpanel" aria-labelledby="Terms-tab">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Terms of Service Sections</h5>
                            </div>
                            <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                                <div id="dashboard-actions">
                                    <button class="btn btn-yellow btn-sm" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_term.php">New</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="dashboard-data-table">
                            <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pr-1 align-middle text-center">Section Order ID</th>
                                <th class="sort pr-1 align-middle text-center">Section Title</th>
                                <th class="sort pr-1 align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchases">
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- =========== TAB 5 =========== -->
            <!-- =========== TAB 5 =========== -->
            <div class="tab-pane fade" id="tab-Privacy" role="tabpanel" aria-labelledby="Privacy-tab">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Privacy Policy Sections</h5>
                            </div>
                            <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                                <div id="dashboard-actions">
                                    <button class="btn btn-yellow btn-sm" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_privacy.php">New</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="dashboard-data-table">
                            <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pr-1 align-middle text-center">Section Order ID</th>
                                <th class="sort pr-1 align-middle text-center">Section Title</th>
                                <th class="sort pr-1 align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchases">
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <!-- =========== TAB 6 =========== -->
            <!-- =========== TAB 6 =========== -->
            <div class="tab-pane fade" id="tab-Payment" role="tabpanel" aria-labelledby="Payment-tab">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Refund Policy Sections</h5>
                            </div>
                            <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                                <div id="dashboard-actions">
                                    <button class="btn btn-yellow btn-sm" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_payment.php">New</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="dashboard-data-table">
                            <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                            <thead class="bg-200 text-900">
                            <tr>
                                <th class="sort pr-1 align-middle text-center">Section Order ID</th>
                                <th class="sort pr-1 align-middle text-center">Section Title</th>
                                <th class="sort pr-1 align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="purchases">
                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>
<!-- =========== END - Content =========== -->
<!-- =========== END - Content =========== -->


<?php include "../site/admin_footer.php";?>