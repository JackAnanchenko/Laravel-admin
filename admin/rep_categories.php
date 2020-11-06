<?php
include "../site/admin_header.php";
?>

          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - APPLICATIONS REPORT -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="row align-items-center justify-content-between">
                <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Categories</h5>
                </div>
                <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                  <div id="dashboard-actions">
                    <button class="btn btn-yellow btn-sm mx-2" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_category.php">New</a></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0">
              <div class="dashboard-data-table">
                <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                  <thead class="bg-200 text-900">
                  <tr>
                      <th class="sort pr-1 align-middle text-center">Image OR Icon</th>
                      <th class="sort pr-1 align-middle text-center">Category Name</th>
                      <th class="sort pr-1 align-middle text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody id="purchases">
                    <?php
                    view_categories();
                    delete_category();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END - APPLICATIONS REPORT -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->




    <?php include "../site/admin_footer.php";?>