<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['editprivacy'])) {
  $privacy_id = $_GET['editprivacy'];

  $query = "SELECT * FROM privacy WHERE privacy_id = $privacy_id";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_result)) {
    $privacy_title = $row['privacy_title'];
    $privacy_desc = $row['privacy_desc'];
    $privacy_order = $row['privacy_order'];
    ?>

    <div class="form-group">
      <label for="privacy_title">Section Title</label>
      <input class="form-control" id="privacy_title" name="privacy_title" type="text" placeholder="Section Title" value="<?php if(isset($privacy_title)) {echo $privacy_title;}?>" required>
    </div>

    <div class="form-group">
      <label for="privacy_desc">Section Description</label>
      <textarea class="form-control" id="privacy_desc" name="privacy_desc" type="text" placeholder="Section Description" required><?php if(isset($privacy_desc)) {echo $privacy_desc;}?></textarea>
    </div>

    <div class="form-group">
      <label for="privacy_order">Section Order</label>
      <input class="form-control" id="privacy_order" name="privacy_order" type="number" placeholder="Section Order" value="<?php if(isset($privacy_order)) {echo $privacy_order;}?>" required>
    </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['update_privacy_section'])) {
        $privacy_title = $_POST['privacy_title'];
        $privacy_desc = $_POST['privacy_desc'];
        $privacy_order = $_POST['privacy_order'];

        $privacy_title = mysqli_real_escape_string($db_connect, $_POST['privacy_title']);
        $privacy_desc = mysqli_real_escape_string($db_connect, $_POST['privacy_desc']);
        $privacy_order = mysqli_real_escape_string($db_connect, $_POST['privacy_order']);

        $query = "UPDATE privacy SET ";
        $query .= "privacy_title = '{$privacy_title}', ";
        $query .= "privacy_desc = '{$privacy_desc}', ";
        $query .= "privacy_order = '{$privacy_order}' ";
        $query .= "WHERE privacy_id = {$privacy_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: settings.php");
            exit;
        }
    }
?>

<button class="btn btn-primary mb-3" type="submit" name="update_privacy_section">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>
