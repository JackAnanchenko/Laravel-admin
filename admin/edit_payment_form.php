<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['editpayment'])) {
  $payment_id = $_GET['editpayment'];

  $query = "SELECT * FROM payment WHERE payment_id = $payment_id";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_result)) {
    $payment_title = $row['payment_title'];
    $payment_desc = $row['payment_desc'];
    $payment_order = $row['payment_order'];
    ?>

    <div class="form-group">
      <label for="payment_title">Section Title</label>
      <input class="form-control" id="payment_title" name="payment_title" type="text" placeholder="Section Title" value="<?php if(isset($payment_title)) {echo $payment_title;}?>" required>
    </div>

    <div class="form-group">
      <label for="payment_desc">Section Description</label>
      <textarea class="form-control" id="payment_desc" name="payment_desc" type="text" placeholder="Section Description" required><?php if(isset($payment_desc)) {echo $payment_desc;}?></textarea>
    </div>

    <div class="form-group">
      <label for="payment_order">Section Order</label>
      <input class="form-control" id="payment_order" name="payment_order" type="number" placeholder="Section Order" value="<?php if(isset($payment_order)) {echo $payment_order;}?>" required>
    </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['update_payment_section'])) {
        $payment_title = $_POST['payment_title'];
        $payment_desc = $_POST['payment_desc'];
        $payment_order = $_POST['payment_order'];

        $payment_title = mysqli_real_escape_string($db_connect, $_POST['payment_title']);
        $payment_desc = mysqli_real_escape_string($db_connect, $_POST['payment_desc']);
        $payment_order = mysqli_real_escape_string($db_connect, $_POST['payment_order']);

        $query = "UPDATE payment SET ";
        $query .= "payment_title = '{$payment_title}', ";
        $query .= "payment_desc = '{$payment_desc}', ";
        $query .= "payment_order = '{$payment_order}' ";
        $query .= "WHERE payment_id = {$payment_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: settings.php");
            exit;
        }
    }
?>

<button class="btn btn-primary mb-3" type="submit" name="update_payment_section">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>
