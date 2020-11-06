<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['editterm'])) {
  $term_id = $_GET['editterm'];

  $query = "SELECT * FROM terms WHERE term_id = $term_id";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_result)) {
    $term_title = $row['term_title'];
    $term_desc = $row['term_desc'];
    $term_order = $row['term_order'];
    ?>

    <div class="form-group">
      <label for="term_title">Section Title</label>
      <input class="form-control" id="term_title" name="term_title" type="text" placeholder="Section Title" value="<?php if(isset($term_title)) {echo $term_title;}?>" required>
    </div>

    <div class="form-group">
      <label for="term_desc">Section Description</label>
      <textarea class="form-control" id="term_desc" name="term_desc" type="text" placeholder="Section Description" required><?php if(isset($term_desc)) {echo $term_desc;}?></textarea>
    </div>

    <div class="form-group">
      <label for="term_order">Section Order</label>
      <input class="form-control" id="term_order" name="term_order" type="number" placeholder="Section Order" value="<?php if(isset($term_order)) {echo $term_order;}?>" required>
    </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['update_term_section'])) {
        $term_title = $_POST['term_title'];
        $term_desc = $_POST['term_desc'];
        $term_order = $_POST['term_order'];

        $term_title = mysqli_real_escape_string($db_connect, $_POST['term_title']);
        $term_desc = mysqli_real_escape_string($db_connect, $_POST['term_desc']);
        $term_order = mysqli_real_escape_string($db_connect, $_POST['term_order']);

        $query = "UPDATE terms SET ";
        $query .= "term_title = '$term_title', ";
        $query .= "term_desc = '$term_desc', ";
        $query .= "term_order = '$term_order' ";
        $query .= "WHERE term_id = '$term_id'";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: settings.php");
            exit;
        }
    }
?>

<button class="btn btn-primary mb-3" type="submit" name="update_term_section">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>
