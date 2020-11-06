<?php 
include "../site/site_header.php"; 
?>

<!-- ========================================================-->
<!-- START - CATEGORIES ========================================-->
<div class="container" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="rounded">
        <div class="owl-carousel owl-theme owl-dots-outter text-center" data-options='{"margin":0,"nav":true,"autoplay":true,"loop":true,"dots":true,"items":1}'>
            
                <?php banner_ads();?>
            
        </div>
    </div>
</div>

<div class="container text-center" style="padding-top: 15px;">
    <div class="card mb-3">
    <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-1.png);"></div>

            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                        <h3 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Occassions</h3>
                    </div>
                </div>

                <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                    <div id="dashboard-actions">
                          <a class="btn btn-falcon-default btn-sm" href="../site/occasions.php">View All</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php categories_index();?>
                </div>
            </div>
    
    </div>
</div>

<!-- END - CATEGORIES ==========================================-->
<!-- ========================================================-->


<!-- ========================================================-->
<!-- START - SECTION ========================================-->
    <div class="container" style="padding-top: 15px;">
      <div class="card mb-3">
      <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-1.png);"></div>
      
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                        <h3 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Recently Added</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php recent_items_index();?>
                </div>
            </div>
        </div>
    </div>
<!-- END - SECTION ==========================================-->
<!-- ========================================================-->


<!-- ================================================================================== -->
<!-- ================================================================================== -->
<!-- ================================================================================== -->


<!-- ========================================================-->
<!-- START - SECTION ========================================-->
<div class="container" style="padding-top: 15px;">
    <div class="card mb-3">
    <div class="bg-holder bg-card" style="background-image:url(../assets/img/illustrations/corner-1.png);"></div>

            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                        <h3 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Top Bouquets</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <?php top_items_index();?>
                </div>
            </div>
    </div>
</div>
<!-- END - SECTION ==========================================-->
<!-- ========================================================-->

<?php include "../site/site_footer.php"; ?>