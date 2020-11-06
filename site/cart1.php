<?php include "../site/site_header.php"; ?>
<?php include_once "../site/functions.php"; ?>

<?php

//ADD AN ITEM TO CART AFTER CLICKING ON "ADD TO CART"
if(isset($_POST['add'])) {
  if(isset($_SESSION['cart'])) {
    $item_array_id = array_column($_SESSION['cart'], "item_id");

    if(!in_array($_GET['id'], $item_array_id)) {
      $count = count($_SESSION['cart']);
      $itm_qty = $_POST['quantity'];
      $item_array = array(
        'item_id'         => $_GET['id']++,
        'item_name'       => $_POST['hidden_item_name'],
        'item_price'      => $_POST['hidden_item_price'],
        'item_quantity'   => $_POST['quantity'],
      );

      

      $_SESSION['cart'][$count] = $item_array;
      echo "<script>window.location='cart1.php'</script>";
    } else {
      // $_SESSION['cart'][$item_array]++;
      // echo '<script>alert("Product is already Added to Cart")</script>';
      // echo '<script>window.location="cart1.php"</script>';
    }
  } else {
    $item_array = array(
      'item_id'         => $_GET['id'],
      'item_name'       => $_POST['hidden_item_name'],
      'item_price'      => $_POST['hidden_item_price'],
      'item_quantity'   => $_POST['quantity'],
    );
    $_SESSION['cart'][0] = $item_array;
  }
}

// REMOVE AN ITEM FROM CART
if(isset($_GET['action'])) {
  if($_GET['action'] == 'delete') {
    foreach($_SESSION['cart'] as $keys => $value) {
      if($value['item_id'] == $_GET['id']) {
        unset($_SESSION['cart'][$keys]);
        echo "<script>window.location='cart1.php'</script>";
      }
    }
  }
}


?>

<!-- START - CART SECTION HEADER -->
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
<!-- END - CART SECTION HEADER -->


<!-- START - DISPLAY A MESSAGE IF CART IS EMPTY -->
        <?php
        if(!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
          echo "<div class='my-6 text-center alert alert-light' role='alert'>Your cart is empty</div>";
        }
        ?>
<!-- END - DISPLAY A MESSAGE IF CART IS EMPTY -->



        <!-- START - ITEM LIST IN CART -->
        <?php
        if(!empty($_SESSION['cart'])) {
          $total = 0;

          foreach($_SESSION['cart'] as $key => $value) {
        ?>

        <div class="row no-gutters align-items-center px-1 border-bottom border-200">
            <div class="col-8 py-3 px-2 px-md-3">
                <div class="media align-items-center">
                    <a href="item_info.php?action=delete&id=<?php echo $value['item_id']; ?>"><img class="rounded mr-3 d-md-block" src="../assets/ser_images/<?php echo $value['img1']; ?>" alt="" width="60" /></a>
                    <div class="media-body">
                        <h5 class="fs-0"><a class="text-900" href="item_info.php?item=<?php echo $value['item_name']; ?>"><?php echo $value['item_name']; ?></a></h5>
                        <div class="fs--2 fs-md--1"><a class="text-danger" href="cart1.php?action=delete&id=<?php echo $value['item_id']; ?>">Remove</a></div>
                    </div>
                </div>
            </div>
            
            <div class="col-4 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center px-2 px-md-3 order-1 order-md-0">
                        <div>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <a href="cart1.php?remove=<?php echo $value['item_id']; ?>"><button class="btn btn-sm btn-outline-secondary border-300 px-2" data-field="input-quantity" data-type="minus">-</button></a>
                                </div>
                                <input class="form-control text-center px-2 input-quantity input-spin-none" type="number" name="quantity" readonly="" min="1" value="<?php echo $value['item_quantity']; ?>" aria-label="Amount (to the nearest dollar)" style="max-width: 40px" />
                                <div class="input-group-append">
                                    <a href="cart1.php?action=inc&id=<?php echo $value['item_id']; ?>" class="btn btn-sm btn-outline-secondary border-300 px-2" name="inc" data-field="input-quantity" data-type="plus">+</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right pl-0 pr-2 pr-md-3 order-0 order-md-1 mb-2 mb-md-0 text-600"><?php echo number_format($value['item_quantity'] * $value['item_price'], 3); ?> KWD</div>
                </div>
            </div>
        </div>

        <?php
        $total = $total + ($value['item_quantity'] * $value['item_price']);
          }
          
        ?>
        <!-- END - ITEM LIST IN CART -->


        <!-- START - CART CONTAINER - FOOTER SECTION -->
        <div class="card-body p-0 bg-light">
            <div class="row font-weight-bold px-1">
                <div class="col-12 px-3">
                    <div class="row no-gutters">
                        <div class="col-8 col-md-12 d-flex flex-row-reverse py-2 pr-md-3 pl-0">
                            Total: <?php
                                echo number_format($total, 3);
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
                <form action="cart1.php" method="POST">
                <button class="btn btn-sm btn-yellow" type="submit" name="submit_for_checkout">Checkout</button>
                <button class="btn btn-sm btn-yellow" type="submit" name="clear">Clear</button>
                </form>
            </div>
        </div>
        <!-- END - CART CONTAINER - FOOTER SECTION -->

                
<?php
        }
        ?>
            </div>
</div>
<?php include "../site/site_footer.php"; ?>

<?php
if(isset($_POST['clear'])) {
  unset($_SESSION['cart']);
  header("Location: cart1.php");
}
?>