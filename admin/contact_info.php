<?php
include "../site/admin_header.php";
?>

<div class="card mb-3">

  <!-- CARD HEADER -->
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col">
        <h5 class="mb-0">Contact Details</h5>
      </div>
    </div>
  </div>
  <!-- / CARD HEADER -->

  <!-- CARD BODY -->

  <?php
  if(isset($_GET['view'])) {
  global $db_connect;
  $the_contact_id = $_GET['view'];

  $query = "SELECT * FROM contact WHERE contact_id = '$the_contact_id'";
  $query_Result = mysqli_query($db_connect, $query);

  while($row = mysqli_fetch_assoc($query_Result)) {
      $contact_id = $row['contact_id'];
      $contact_subject = $row['contact_subject'];
      $contact_phone = $row['contact_phone'];
      $contact_email = $row['contact_email'];
      $contact_name = $row['contact_name'];
      $contact_body = $row['contact_body'];
      $date = $row['date'];
  ?>

  <div class="card-body bg-light border-top">
    <div class="row">
      <div class="col-lg col-xxl-12">

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Contact ID</p>
          </div>
          <div class="col"><?php echo $contact_id ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Sent On</p>
          </div>
          <div class="col"><?php echo $date ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Name</p>
          </div>
          <div class="col"><?php echo $contact_name ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Email Address</p>
          </div>
          <div class="col"><?php echo $contact_email ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Phone Number</p>
          </div>
          <div class="col"><?php echo $contact_phone ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Subject</p>
          </div>
          <div class="col"><?php echo $contact_subject ;?></div>
        </div>

        <hr>

        <div class="row">
          <div class="col-5 col-sm-2">
            <p class="font-weight-semi-bold mb-1">Message</p>
          </div>
          <div class="col"><?php echo nl2br($contact_body) ;?></div>
        </div>

      </div>

      
    </div>
  </div>

  <?php } } ?>
  <!-- / CARD BODY -->
  
  <!-- CARD FOOTER -->
  <div class="card-footer border-top text-right"><input class="btn btn-yellow text-black mb-3" type="button" onclick="history.back()" value="Back" style="margin-left: 20px;"></div>
  <!-- / CARD FOOTER -->

</div>


    <?php include "../site/admin_footer.php";?>