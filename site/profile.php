<?php include "../site/site_header.php"; ?>
<?php include_once "../site/functions.php"; ?>
<?php
update_password();
update_user_names();
?>



<div class="container" style="padding-top: 15px;">
    <div class="card mb-3">
        <div class="card-body">
            <div class="fancy-tab">
                <div class="nav-bar nav-bar-center">
                    <div class="nav-bar-item px-3 px-sm-4 active">Name Management</div>
                    <div class="nav-bar-item px-3 px-sm-4">Password Management</div>
                    <div class="nav-bar-item px-3 px-sm-4">Orders History</div>
                    <div class="nav-bar-item px-3 px-sm-4">Addresses</div>
                </div>

                <div class="tab-contents">

<!-- ============================================================================================= -->
<!-- ============================================================================================= -->
<!-- ============================================================================================= -->
                    <?php
                    global $db_connect;
                    $session_email = $_SESSION['email_address'];
                    $query = "SELECT * FROM users WHERE email_address = '$session_email'";
                    $query_result = mysqli_query($db_connect, $query);
                    while($row = mysqli_fetch_assoc($query_result)) {
                        $the_db_fname = $row['first_name'];
                        $the_db_lname = $row['last_name'];
                    ?>

                    <!-- START - PAGE 1 -->
                    <div class="tab-content active">
                    <form action="" method="POST">
                            <div class="form-group">

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input class="form-control" id="first_name" name="first_name" type="text" placeholder="First Name" value="<?php echo $the_db_fname; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last Name" value="<?php echo $the_db_lname; ?>">
                                    </div>

                                <button class="btn btn-yellow mb-3 text-black" type="submit" name="update_name">Update Name</button>
                            </div>
                        </form>
                        
                    </div>
                    <!-- END - PAGE 4 -->
                    <?php
                    }
                    ?>
                    <!-- START - PAGE 5 -->
                    <div class="tab-content">
                        <form action="" method="POST" >
                            <div class="form-group">

                                <div class="form-group">
                                    <label for="old_password">Current Password</label>
                                    <input class="form-control" id="old_password" name="old_password" type="password" placeholder="Current Password">
                                </div>

                                <div class="form-group">
                                    <label for="password1">New Password</label>
                                    <input class="form-control" id="password1" name="password1" type="password" placeholder="New Password">
                                </div>

                                <div class="form-group">
                                    <label for="password2">Confirm Password</label>
                                    <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm Password">
                                </div>
                            <button class="btn btn-yellow mb-3 text-black" type="submit" name="update_password">Update Password</button>
                            </div>
                        </form>
                    </div>
                    <!-- END - PAGE 5 -->


                    <!-- START - PAGE 5 -->
                    <div class="tab-content">
                        <form action="" method="POST" >
                            <div class="card mb-3">
                                <div class="card-body px-0 pt-0">
                                    <div class="dashboard-data-table">
                                        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="sort pr-1 align-middle text-center">Order ID</th>
                                                <th class="sort pr-1 align-middle text-center">Date</th>
                                                <th class="sort pr-1 align-middle text-center">Status</th>
                                                <th class="sort pr-1 align-middle text-center">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody id="purchases">
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-content">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                                            <div id="dashboard-actions">
                                                <button class="btn btn-yellow btn-sm mx-2" data-toggle="modal" data-target="#newAddresseModal">New</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pt-0">
                                    <div class="dashboard-data-table">
                                        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="sort pr-1 align-middle text-center">Address Name</th>
                                                <th class="sort pr-1 align-middle text-center">Area</th>
                                                <th class="sort pr-1 align-middle text-center">Phone</th>
                                            </tr>
                                        </thead>
                                        <tbody id="purchases">
                                            
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- END - PAGE 5 -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="newAddresseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
            <form action="" method="POST" >
                <div class="form-group">

                    <div class="form-group">
                        <label for="add_name">Address Name</label>
                        <input class="form-control" id="add_name" name="add_name" type="text" placeholder="Address Name...">
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select onchange="displayFields()" class="selectpicker" id="type" name="type">
                            <option id="home" value="home">Home</option>
                            <option id="apartment" value="apartment">Apartment</option>
                            <option id="office" value="office">Office</option>
                        </select>
                    </div>

                    <div class="form-group" id="floor" style="display: none;">
                        <label for="floor">Floor</label>
                        <input class="form-control" id="floor" name="floor" type="text" placeholder="Floor">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-sm" type="button">Save changes</button>
                </div>
            </form>
      </div>
    </div>
  </div>
</div>

<?php include "../site/site_footer.php"; ?>

<script>
    function displayFields() {
        if (document.getElementById('type').value == 'apartment') {
            document.getElementById('floor').style.display = '';
            document.getElementById('type').disabled = false;
            document.getElementById('type').value = 'blank';
        } else {
            document.getElementById('floor').style.display = 'none';
            document.getElementById("type").required = false;
        }
    }
</script>