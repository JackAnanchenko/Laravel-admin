<form action="" method="POST" enctype="multipart/form-data">

<?php global $db_connect;
if(isset($_GET['editcontact'])) {
  $contact_id = $_GET['editcontact'];

  $query = "SELECT * FROM contact WHERE contact_id = $contact_id";
  $query_result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_result)) {
    $contact_title = $row['contact_title'];
    $contact_desc = $row['contact_desc'];
    $contact_order = $row['contact_order'];
    ?>

    <div class="form-group">
      <label for="contact_title">Section Title</label>
      <input class="form-control" id="contact_title" name="contact_title" type="text" placeholder="Section Title" value="<?php if(isset($contact_title)) {echo $contact_title;}?>" required>
    </div>

    <div class="form-group">
      <label for="contact_desc">Section Description</label>
      <textarea class="form-control" id="contact_desc" name="contact_desc" type="text" placeholder="Section Description" required><?php if(isset($contact_desc)) {echo $contact_desc;}?></textarea>
    </div>

    <div class="form-group">
      <label for="contact_order">Section Order</label>
      <input class="form-control" id="contact_order" name="contact_order" type="number" placeholder="Section Order" value="<?php if(isset($contact_order)) {echo $contact_order;}?>" required>
    </div>

<?php }} ?>

<?php
global $db_connect;
    if(isset($_POST['update_contact_section'])) {
        $contact_title = $_POST['contact_title'];
        $contact_desc = $_POST['contact_desc'];
        $contact_order = $_POST['contact_order'];

        $contact_title = mysqli_real_escape_string($db_connect, $_POST['contact_title']);
        $contact_desc = mysqli_real_escape_string($db_connect, $_POST['contact_desc']);
        $contact_order = mysqli_real_escape_string($db_connect, $_POST['contact_order']);

        $query = "UPDATE contact SET ";
        $query .= "contact_title = '{$contact_title}', ";
        $query .= "contact_desc = '{$contact_desc}', ";
        $query .= "contact_order = '{$contact_order}' ";
        $query .= "WHERE contact_id = {$contact_id}";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die("QUERY FAILED" . mysqli_error($db_connect));
        } else {
            header("Location: settings.php");
            exit;
        }
    }
?>

<button class="btn btn-primary mb-3" type="submit" name="update_contact_section">Update</button>
<input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
</form>
