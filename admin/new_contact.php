<?php
include "../site/admin_header.php";
add_contact_section();
?>

          
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - ADD NEW PROGRAM -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Add New Contact Us Section</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                  <form action="new_contact.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="contact_title">Section Title</label>
                      <input class="form-control" id="contact_title" name="contact_title" type="text" placeholder="Section Title" required>
                    </div>

                    <div class="form-group">
                      <label for="contact_desc">Section Description</label>
                      <textarea class="form-control" id="contact_desc" name="contact_desc" type="text" placeholder="Section Description" required></textarea>
                    </div>

                    <div class="form-group">
                      <label for="contact_order">Section Order</label>
                      <input class="form-control" id="contact_order" name="contact_order" type="number" placeholder="Section Order" required>
                    </div>

                    <button class="btn btn-primary mb-3" type="submit" name="new_contact_section">Add</button>
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