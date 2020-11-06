<?php include "../site/admin_header.php";?>

<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Update Item Details</h5>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-12">
                <?php global $db_connect;
                if(isset($_GET['edit'])) {
                  $item_id = $_GET['edit'];

                  include "../admin/edit_category_form.php";
                }
                ?>
            </div>
        </div>
    </div>
</div>
         
    <?php include "../site/admin_footer.php";?>