<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['edit'])) {
  $the_category_id = $_GET['edit'];

  $select = "SELECT * FROM categories WHERE category_id = $the_category_id";
  $select_results = mysqli_query($db_connect, $select);

  while($row = mysqli_fetch_assoc($select_results)) {
    $category_id = $row['category_id'];
    $category_name = $row['category_name'];
    $category_icon = $row['category_icon'];
    ?>

<div class="form-group">
  <label for="category_name">Category Name</label>
  <input class="form-control" id="category_name" name="category_name" type="text" placeholder="Category Name" value="<?php if(isset($category_name)) {echo $category_name;}?>">
</div>

<div class="form-group">
  <label for="category_icon">Category Icon OR Icon</label>
  <input class="form-control-file" id="category_icon" name="category_icon" type="file">
  <br>
    <?php if(isset($category_icon)&&!empty($category_icon)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$category_icon."'"." alt=''>
    </div>";}?>
</div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['edit_category_submit'])) {
        $category_name = $_POST['category_name'];
        $category_icon = $_FILES['category_icon']['name'];

        $target = "../assets/ser_images/".basename($category_icon);

        move_uploaded_file($_FILES['category_icon']['tmp_name'], $target);

        if(empty($category_icon)) {
          $query = "SELECT * FROM categories WHERE category_id = $the_category_id";
          $select_image = mysqli_query($db_connect, $query);
          while($row = mysqli_fetch_assoc($select_image)) {
            $category_icon = $row['category_icon'];
          }
        }

        $query = "UPDATE categories SET ";
        $query .= "category_name = '{$category_name}', ";
        $query .= "category_icon = '{$category_icon}' ";
        $query .= "WHERE category_id = {$the_category_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: rep_categories.php");
            exit;
        }
    }
?>

<hr>

<button class="btn btn-yellow mb-3" type="submit" name="edit_category_submit">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>