<?php
include "../site/admin_header.php";
add_category();
?>


          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - ADD NEW PROGRAM -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Add a New Category</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                  <form action="new_category.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input class="form-control" id="category_name" name="category_name" type="text" placeholder="Category Name">
                    </div>

                    <div class="form-group">
                      <label for="category_icon">Category Icon OR Icon</label>
                      <input class="form-control-file" id="category_icon" name="category_icon" type="file">
                    </div>

                    <hr>

                    <button class="btn btn-primary mb-3" name="new_category_submit" type="submit">Add</button>
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