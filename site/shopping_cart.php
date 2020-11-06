<?php include "../site/site_header.php"; ?>
<?php include "../site/cart.php"; ?>

<!-- START - CART CONTAINER - TOP SECTION -->
<div class="container" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <h5 class="mb-3 mb-md-0">Cart</h5>
                </div>
                <div class="col-md-auto">
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="row bg-200 text-900 no-gutters px-1 fs--1 font-weight-semi-bold">
                <div class="col-9 col-md-8 p-2 px-md-3">
                    Item
                </div>
                <div class="col-3 col-md-4 px-3">
                    <div class="row">
                        <div class="col-md-8 py-2 d-none d-md-block text-center">
                            Quantity
                        </div>
                        <div class="col-12 col-md-4 text-right p-2 px-md-3">
                            Price
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- END - CART CONTAINER - TOP SECTION -->

<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->

<!-- START - EMPTY CART MESSAGE -->
<?php
    // if(!isset($_SESSION['total_quantity'])) {
    // echo "<div class='my-6 text-center alert alert-light' role='alert'>Your cart is empty</div>";
    // }
?>
<!-- END - EMPTY CART MESSAGE -->

<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->

<!-- START - CART FUNCTION -->
<?php
cart();
?>
<!-- END - CART FUNCTION -->

</div>

<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->

<!-- START - CART CONTAINER - FOOTER SECTION -->
<div class="card-body p-0 bg-light">
    <div class="row font-weight-bold px-1">
        <div class="col-3 col-md-8 py-2 py-0 px-md-3 text-right text-900">
            Total
        </div>
        <div class="col px-3">
            <div class="row no-gutters">
                <div class="col-md-8 py-2 d-none d-md-block text-center">
                    <?php
                        if(isset($_SESSION['total_quantity'])) {
                        echo $_SESSION['total_quantity'];
                        } else {
                        $_SESSION['total_quantity'] = "0";
                        }
                    ?> (items)
                </div>
                <div class="col-12 col-md-4 text-right py-2 pr-md-3 pl-0">
                    <?php
                        if(isset($_SESSION['grand_total'])) {
                        echo $_SESSION['grand_total'];
                        } else {
                        $_SESSION['grand_total'] = "0.000";
                        }
                    ?> KWD
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-3">
    <div class="card-footer bg-light d-flex rounded justify-content-end">
        <form class="mr-3">
            <div class="input-group input-group-sm">
                <input class="form-control" type="text" placeholder="Discout Code" />
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary border-300 btn-sm" type="submit">Apply</button>
                </div>
            </div>
        </form>
        <form action="check_success.php" method="POST">
        <button class="btn btn-sm btn-yellow" type="submit" name="submit_for_checkout">Checkout</button>
    </div>
</div>
<!-- END - CART CONTAINER - FOOTER SECTION -->
</div>
</form>
<?php include "../site/site_footer.php"; ?>