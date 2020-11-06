<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['edit'])) {
  $ad_id = $_GET['edit'];

  $query = "SELECT * FROM ads WHERE ad_id = $ad_id";
  $select_results = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($select_results)) {
    $ad_id = $row['ad_id'];
    $ad_name = $row['ad_name'];
    $img = $row['ad_img'];
    $ad_url = $row['ad_url'];
    ?>

  <div class="form-group">
    <label for="ad_name">Ad Name</label>
    <input class="form-control" id="ad_name" name="ad_name" type="text" placeholder="Ad Name" value="<?php if(isset($ad_name)) {echo $ad_name;}?>">
  </div>

  <div class="form-group">
    <label for="ad_url">Ad URL</label>
    <input class="form-control" id="ad_url" name="ad_url" type="text" placeholder="Ad URL" value="<?php if(isset($ad_url)) {echo $ad_url;}?>">
  </div>

  <div class="form-group">
    <label for="img">Image</label>
    <input class="form-control-file" id="img" name="img" type="file">
    <br>
    <?php if(isset($img)&&!empty($img)) {echo "
    <div class='avatar avatar-5xl'>
      <img class='rounded-soft shadow-sm' src='../assets/ser_images/".$img."'"." alt=''>
    </div>";}?>
  </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['edit_ads_submit'])) {
      $ad_name = $_POST['ad_name'];
      $ad_url = $_POST['ad_url'];
      $img = $_FILES['img']['name'];

      $target = "../assets/ser_images/".basename($img);

      move_uploaded_file($_FILES['img']['tmp_name'], $target);

      if(empty($img)) {
        $query = "SELECT * FROM ads WHERE ad_id = $ad_id";
        $select_image = mysqli_query($db_connect, $query);
        while($row = mysqli_fetch_assoc($select_image)) {
          $img = $row['ad_img'];
        }
      }

      $query = "UPDATE ads SET ";
      $query .= "ad_name = '{$ad_name}', ";
      $query .= "ad_url = '{$ad_url}', ";
      $query .= "ad_img = '{$img}' ";
      $query .= "WHERE ad_id = {$ad_id}";
      $query_result = mysqli_query($db_connect, $query);

      if(!$query_result){
          die("QUERY FAILED" . mysqli_error($db_connect));
      } else {
          header("Location: ads.php");
          exit;
      }
    }
?>

<hr>

<button class="btn btn-primary mb-3" type="submit" name="edit_ads_submit">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>