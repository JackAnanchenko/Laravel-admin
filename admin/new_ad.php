<?php
include "../site/admin_header.php";
add_ad();
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
                  <form action="new_ad.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="ad_name">Ad Name</label>
                      <input class="form-control" id="ad_name" name="ad_name" type="text" placeholder="Ad Name">
                    </div>

                    <div class="form-group">
                      <label for="ad_url">Ad URL</label>
                      <input class="form-control" id="ad_url" name="ad_url" type="text" placeholder="Ad URL">
                    </div>

                    <div class="form-group">
                      <label for="img">Image</label>
                      <input class="form-control-file" id="img" name="img" type="file">
                    </div>

                    <hr>

                    <button class="btn btn-yellow mb-3" name="new_ad_submit" type="submit">Add</button>
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