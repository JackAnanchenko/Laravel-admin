<?php include "../site/site_header.php"; ?>


<form method="POST">
    <button type="submit" name="success">Success</button>
    <br>
    <button type="submit" name="fail">Fail</button>
</form>

<?php
global $db_connect;
if(isset($_POST['success'])) {
    $fname = $_SESSION['first_name'];
    $lname = $_SESSION['last_name'];
    $email = $_SESSION['email_address'];
    $total_price = $_SESSION['grand_total'];

    $query_order = "INSERT INTO orders(first_name, last_name, email_address, status, total_price) ";
    $query_order .= "VALUES ('$fname', '$lname', '$email', 'Success', '$total_price')";
    $order_result = mysqli_query($db_connect, $query_order);
    
    $the_id = mysqli_insert_id($db_connect);


    // the item function
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
                $the_item = $row['item_name'];
        
                if(empty($new_price)) {
                $subtotal = $org_price * $value;
                } else {
                    $subtotal = $new_price * $value;
                }

                $contents_query = "INSERT INTO order_contents(order_id, item_name, item_quantity, item_subtotal) ";
                $contents_query .= "VALUES ('$the_id', '$the_item', '$value', '$subtotal')";
                $contents_query_result = mysqli_query($db_connect, $contents_query);

                header("Location: thankyou.php");
                unset($_SESSION['cart']);
                
                }
            }
        }
    }
} else if (isset($_POST['fail'])) {
    $fname = $_SESSION['first_name'];
    $lname = $_SESSION['last_name'];
    $email = $_SESSION['email_address'];
    $total_price = $_SESSION['grand_total'];

    $query_order = "INSERT INTO orders(first_name, last_name, email_address, status, total_price) ";
    $query_order .= "VALUES ('$fname', '$lname', '$email', 'Fail', '$total_price')";
    $order_result = mysqli_query($db_connect, $query_order);
    
    $the_id = mysqli_insert_id($db_connect);


    // the item function
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
                    $the_item = $row['item_name'];

                    if(empty($new_price)) {
                    $subtotal = $org_price * $value;
                    } else {
                        $subtotal = $new_price * $value;
                    }
            
                    $contents_query = "INSERT INTO order_contents(order_id, item_name, item_quantity, item_subtotal) ";
                    $contents_query .= "VALUES ('$the_id', '$the_item', '$value', '$subtotal')";
                    $contents_query_result = mysqli_query($db_connect, $contents_query);

                }
            }
        }
    }
}
?>