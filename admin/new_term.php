<?php
include "../site/admin_header.php";
add_term_section();
?>

          
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - ADD NEW PROGRAM -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Add New Terms & Conditions Section</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                  <form action="new_term.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="term_title">Section Title</label>
                      <input class="form-control" id="term_title" name="term_title" type="text" placeholder="Section Title" required>
                    </div>

                    <div class="form-group">
                      <label for="term_desc">Section Description</label>
                      <textarea class="form-control" id="term_desc" name="term_desc" placeholder="Section Description" required></textarea>
                    </div>

                    <div class="form-group">
                      <label for="term_order">Section Order</label>
                      <input class="form-control" id="term_order" name="term_order" type="number" placeholder="Section Order" required>
                    </div>

                    <button class="btn btn-primary mb-3" type="submit" name="new_term_section">Add</button>
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