<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['editabout'])) {
  $about_id = $_GET['editabout'];

  $query = "SELECT * FROM aboutus WHERE about_id = $about_id";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_result)) {
    $about_title = $row['about_title'];
    $about_desc = $row['about_desc'];
    $about_order = $row['about_order'];
    ?>

    <div class="form-group">
      <label for="about_title">Section Title</label>
      <input class="form-control" id="about_title" name="about_title" type="text" placeholder="Section Title" value="<?php if(isset($about_title)) {echo $about_title;}?>" required>
    </div>

    <div class="form-group">
      <label for="about_desc">Section Description</label>
      <textarea class="form-control" id="about_desc" name="about_desc" type="text" placeholder="Section Description" required><?php if(isset($about_desc)) {echo $about_desc;}?></textarea>
    </div>

    <div class="form-group">
      <label for="about_order">Section Order</label>
      <input class="form-control" id="about_order" name="about_order" type="number" placeholder="Section Order" value="<?php if(isset($about_order)) {echo $about_order;}?>" required>
    </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['update_about_section'])) {
        $about_title = $_POST['about_title'];
        $about_desc = $_POST['about_desc'];
        $about_order = $_POST['about_order'];

        $about_title = mysqli_real_escape_string($db_connect, $_POST['about_title']);
        $about_desc = mysqli_real_escape_string($db_connect, $_POST['about_desc']);
        $about_order = mysqli_real_escape_string($db_connect, $_POST['about_order']);

        $query = "UPDATE aboutus SET ";
        $query .= "about_title = '{$about_title}', ";
        $query .= "about_desc = '{$about_desc}', ";
        $query .= "about_order = '{$about_order}' ";
        $query .= "WHERE about_id = {$about_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: settings.php");
            exit;
        }
    }
?>

<button class="btn btn-primary mb-3" type="submit" name="update_about_section">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>
