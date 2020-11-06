<?php
include_once "../site/functions.php";

// INCREASE QUANTITY IN CART PAGE
if(isset($_GET['add'])){

  $query = "SELECT * FROM items WHERE item_id = ".$_GET['add']."";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_array($query_result)) {
    if($row['item_quantity'] <> $_SESSION['item_' . $_GET['add']]) {
      $_SESSION['item_' . $_GET['add']]++;
      header("Location: shopping_cart.php");
    } else {
      header("Location: shopping_cart.php");
      echo "<span class='btn btn-sm btn-danger m-1' data-notification='{'type':'error','progressBar':true,'message':'Something went worng!'}'>No more inventory for ".$row['item_name']."</span>";
    }
  }
}

// DESCREASE QUANTITY IN CART PAGE
if(isset($_GET['remove'])) {
  $_SESSION['item_' . $_GET['remove']]--;
  header("Location: shopping_cart.php");

  if($_SESSION['item_' . $_GET['remove']] < 1) {
    header("Location: shopping_cart.php");
    unset($_SESSION['grand_total']);
    unset($_SESSION['total_quantity']);
  }
}

// DELETE ITEM FROM CART PAGE
if(isset($_GET['delete'])) {
  $_SESSION['item_' . $_GET['delete']] = 0;
  header("Location: shopping_cart.php");
  unset($_SESSION['grand_total']);
  unset($_SESSION['total_quantity']);
}

function cart() {
  global $db_connect;

  //DECLARING THE GRAND TOTAL AS ZERO FOR THE BEGINING TO IT DOESN'T RESULT IN ANY ISSUES
  $grand = 0;
  $total_quantity = 0;

  // TO DISPLAY & STORE ITEMS IN THE CART
  foreach($_SESSION as $name => $value) {
    if($value > 0) {
      if(substr($name, 0, 5) == "item_") {

        $length = strlen($name) - 5;

        $id = substr($name, 5, $length);

        $query = "SELECT * FROM items WHERE item_id = '$id'";
        $query_result = mysqli_query($db_connect, $query);
      
        while($row = mysqli_fetch_array($query_result)) {
          $org_price = $row['item_price'];
          $new_price = $row['new_price'];

          if(empty($new_price)) {

          $subtotal = $org_price * $value;
          } else {
            $subtotal = $new_price * $value;
          }
          
          $total_quantity +=$value;

        
          $item = <<<DELIMETER
                                <div class="row no-gutters align-items-center px-1 border-bottom border-200">
                                    <div class="col-8 py-3 px-2 px-md-3">
                                        <div class="media align-items-center">
                                            <a href="item_info.php?item={$row['item_id']}"><img class="rounded mr-3 d-md-block" src="../assets/ser_images/{$row['img1']}" alt="" width="60" /></a>
                                            <div class="media-body">
                                                <h5 class="fs-0"><a class="text-900" href="item_info.php?item={$row['item_id']}">{$row['item_name']}</a></h5>
                                                <div class="fs--2 fs-md--1"><a class="text-danger" href="cart.php?delete={$row['item_id']}">Remove</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex justify-content-end justify-content-md-center px-2 px-md-3 order-1 order-md-0">
                                                <div>
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-prepend">
                                                            <a href="cart.php?remove={$row['item_id']}"><button class="btn btn-sm btn-outline-secondary border-300 px-2" data-field="input-quantity" data-type="minus">-</button></a>
                                                        </div>
                                                        <input class="form-control text-center px-2 input-quantity input-spin-none" type="number" readonly="" min="1" value="$value" aria-label="Amount (to the nearest dollar)" style="max-width: 40px" />
                                                        <div class="input-group-append">
                                                            <a href="cart.php?add={$row['item_id']}"><button class="btn btn-sm btn-outline-secondary border-300 px-2" data-field="input-quantity" data-type="plus">+</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 text-right pl-0 pr-2 pr-md-3 order-0 order-md-1 mb-2 mb-md-0 text-600">{$subtotal} KWD</div>
                                        </div>
                                    </div>
                                </div>
                    DELIMETER;
      
        echo $item;
        
        }
        // TO GET THT GRAND TOTAL
        // $grand += $subtotal;
        $_SESSION['grand_total'] = $grand += $subtotal;
        $_SESSION['total_quantity'] = $total_quantity;
      }
    }
  }
}
?>

<?php
// if(isset($_SESSION['item_'])) {
//   echo $_SESSION['item_'];
// }
?>



<?php

session_destroy();
?>
