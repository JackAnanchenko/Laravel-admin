<?php 
include "../site/site_header.php";
include_once "../site/functions.php";
?>



<!-- ========================================================-->
<!-- START - SECTION ========================================-->
    <div class="container" style="padding-top: 15px;">
      <div class="card mb-3">

      <div class="card-header">
              <div class="row align-items-center justify-content-between">
                <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                  <h3 class="fs-2 mb-0 text-nowrap py-2 py-xl-0">Occasions</h3>
                </div>
              </div>
            </div>

          <div class="card-body">
        
            <!-- START - ROW -->
            <div class="row">
                <?php list_occasions();?>
            </div>

            </div>
            <!-- END - ROW -->

        </div>
    </div>
    </div>
<!-- END - SECTION ==========================================-->
<!-- ========================================================-->


<?php include "../site/site_footer.php"; ?>