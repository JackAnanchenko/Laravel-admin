<?php
include "../site/admin_header.php";
add_privacy_section();
?>

          
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <div class="card mb-3">
              <div class="card-header">
                <h5 class="mb-0">Add New Privacy Policy Section</h5>
              </div>
              <div class="card-body bg-light">
                <div class="row">
                  <div class="col-12">
                    <form action="new_privacy.php" method="POST" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="privacy_title">Section Title</label>
                        <input class="form-control" id="privacy_title" name="privacy_title" type="text" placeholder="Section Title" required>
                      </div>

                      <div class="form-group">
                        <label for="privacy_desc">Section Description</label>
                        <textarea class="form-control" id="privacy_desc" name="privacy_desc" type="text" placeholder="Section Description" required></textarea>
                      </div>

                      <div class="form-group">
                        <label for="privacy_order">Section Order</label>
                        <input class="form-control" id="privacy_order" name="privacy_order" type="number" placeholder="Section Order" required>
                      </div>

                      <button class="btn btn-primary mb-3" type="submit" name="new_privacy_section">Add</button>
                      <input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
                    </form>
                    
                  </div>
                </div>
              </div>
          </div>
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->


    <?php include "../site/admin_footer.php";?>