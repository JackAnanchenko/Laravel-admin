<?php
include "../site/admin_header.php";
add_admin();
?>


          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - ADD NEW PROGRAM -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Add a New Ad</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                  <form action="new_admin.php" method="POST">

                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input class="form-control" id="fname" name="fname" type="text" placeholder="First Name">
                    </div>

                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input class="form-control" id="lname" name="lname" type="text" placeholder="Last Name">
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Number">
                    </div>

                    <div class="form-group">
                      <label for="email">Email Address</label>
                      <input class="form-control" id="email" name="email" type="email" placeholder="Email Address">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password">
                    </div>

                    <hr>

                    <button class="btn btn-yellow mb-3" name="new_admin_submit" type="submit">Add</button>
                    <input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
                  </form>
                  
                </div>
            </div>
        </div>
        </div>
          <!-- END - ADD NEW PROGRAM -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->

    <?php include "../site/admin_footer.php";?>