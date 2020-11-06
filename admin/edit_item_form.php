<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['edit'])) {
  $item_id = $_GET['edit'];

  $select = "SELECT * FROM items WHERE item_id = $item_id";
  $select_results = mysqli_query($db_connect, $select);

  while($row = mysqli_fetch_assoc($select_results)) {
    $item_id = $row['item_id'];
    $item_name = $row['item_name'];
    $item_desc = $row['item_desc'];
    $item_category = $row['item_category'];
    $item_price = $row['item_price'];
    $item_quantity = $row['item_quantity'];
    $height = $row['height'];
    $width = $row['width'];
    $weight = $row['weight'];
    $flowers = $row['flowers'];

    $img1 = $row['img1'];
    $img2 = $row['img2'];
    $img3 = $row['img3'];
    $img4 = $row['img4'];
    $img5 = $row['img5'];
    ?>

<div class="form-group">
  <label for="item_name">Item Name</label>
  <input class="form-control" id="item_name" name="item_name" type="text" placeholder="Item Name" value="<?php if(isset($item_name)) {echo $item_name;}?>">
</div>

<div class="form-group">
    <label for="item_category">Category</label>
    <select class="form-control" id="item_category" name="item_category"  placeholder="Select an option">
        <option><?php if(isset($item_category)) {echo $item_category;}?></option>
        <option><?php dropdown_category();?></option>
    </select>
</div>

<div class="form-group">
  <label for="item_desc">Item Description</label>
  <textarea class="form-control" id="item_desc" name="item_desc" type="text" placeholder="Item Description"><?php if(isset($item_desc)) {echo $item_desc;}?></textarea>
</div>

<div class="form-group">
  <label for="item_price">Price</label>
  <input class="form-control" id="item_price" name="item_price" type="number" placeholder="Price" value="<?php if(isset($item_price)) {echo $item_price;}?>">
</div>

<div class="form-group">
  <label for="item_quantity">Quantity Available</label>
  <input class="form-control" id="item_quantity" name="item_quantity" type="number" placeholder="Quantity Available" value="<?php if(isset($item_quantity)) {echo $item_quantity;}?>">
</div>

<hr>

<div class="form-group">
    <label for="height">Height</label>
    <input class="form-control" id="height" name="height" type="text" placeholder="Height" value="<?php if(isset($height)) {echo $height;}?>">
</div>

<div class="form-group">
    <label for="width">Width</label>
    <input class="form-control" id="width" name="width" type="text" placeholder="Width" value="<?php if(isset($width)) {echo $width;}?>">
</div>

<div class="form-group">
    <label for="weight">Weight</label>
    <input class="form-control" id="weight" name="weight" type="text" placeholder="Weight" value="<?php if(isset($weight)) {echo $weight;}?>">
</div>

<div class="form-group">
    <label for="flowers">Type of Flowers</label>
    <input class="form-control" id="flowers" name="flowers" type="text" placeholder="Roses, Tulips....." value="<?php if(isset($flowers)) {echo $flowers;}?>">
</div>

<hr>

<div class="form-group">
  <label for="img1">Image 1</label>
  <input class="form-control-file" id="img1" name="img1" type="file">
  <br>
    <?php if(isset($img1)&&!empty($img1)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img1."'"." alt=''>
    </div>";}?>
</div>

<div class="form-group">
  <label for="img2">Image 2</label>
  <input class="form-control-file" id="img2" name="img2" type="file">
  <br>
    <?php if(isset($img2)&&!empty($img2)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img2."'"." alt=''>
    </div>";}?>
</div>

<div class="form-group">
  <label for="img3">Image 3</label>
  <input class="form-control-file" id="img3" name="img3" type="file">
  <br>
    <?php if(isset($img3)&&!empty($img3)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img3."'"." alt=''>
    </div>";}?>
</div>

<div class="form-group">
  <label for="img4">Image 4</label>
  <input class="form-control-file" id="img4" name="img4" type="file">
  <br>
    <?php if(isset($img4)&&!empty($img4)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img4."'"." alt=''>
    </div>";}?>
</div>

<div class="form-group">
  <label for="img5">Image 5</label>
  <input class="form-control-file" id="img5" name="img5" type="file">
  <br>
    <?php if(isset($img5)&&!empty($img5)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img5."'"." alt=''>
    </div>";}?>
</div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['edit_item_submit'])) {
        $item_name = $_POST['item_name'];
        $item_desc = $_POST['item_desc'];
        $item_category = $_POST['item_category'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['item_quantity'];
        $height = $_POST['height'];
        $width = $_POST['width'];
        $weight = $_POST['weight'];
        $flowers = $_POST['flowers'];

        $img1 = $_FILES['img1']['name'];
        $img2 = $_FILES['img2']['name'];
        $img3 = $_FILES['img3']['name'];
        $img4 = $_FILES['img4']['name'];
        $img5 = $_FILES['img5']['name'];

        $target1 = "../assets/ser_images/".basename($img1);
        $target2 = "../assets/ser_images/".basename($img2);
        $target3 = "../assets/ser_images/".basename($img3);
        $target4 = "../assets/ser_images/".basename($img4);
        $target5 = "../assets/ser_images/".basename($img5);

        move_uploaded_file($_FILES['img1']['tmp_name'], $target1);
        move_uploaded_file($_FILES['img2']['tmp_name'], $target2);
        move_uploaded_file($_FILES['img3']['tmp_name'], $target3);
        move_uploaded_file($_FILES['img4']['tmp_name'], $target4);
        move_uploaded_file($_FILES['img5']['tmp_name'], $target5);

        if(empty($img1)) {
          $query = "SELECT * FROM items WHERE item_id = $item_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $img1 = $row['img1'];
          }
        }

        if(empty($img2)) {
          $query = "SELECT * FROM items WHERE item_id = $item_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $img2 = $row['img2'];
          }
        }

        if(empty($img3)) {
          $query = "SELECT * FROM items WHERE item_id = $item_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $img3 = $row['img3'];
          }
        }

        if(empty($img4)) {
          $query = "SELECT * FROM items WHERE item_id = $item_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $img4 = $row['img4'];
          }
        }

        if(empty($img5)) {
          $query = "SELECT * FROM items WHERE item_id = $item_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $img5 = $row['img5'];
          }
        }

        $query = "UPDATE items SET item_name = '{$item_name}', ";
        $query .= "item_category = '{$item_category}', item_desc = '{$item_desc}', ";
        $query .= "item_price = '{$item_price}', item_quantity = '{$item_quantity}', ";
        $query .= "img1 = '{$img1}', img2 = '{$img2}', img3 = '{$img3}', img4 = '{$img4}', img5 = '{$img5}', ";
        $query .= "height = '{$height}', width = '{$width}', weight = '{$weight}', flowers = '{$flowers}'";
        $query .= "WHERE item_id = {$item_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: rep_items.php");
            exit;
        }
    }
?>

<hr>

<button class="btn btn-primary mb-3" type="submit" name="edit_item_submit">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>