<?php include "../site/site_header.php"; ?>
<div class="container" style="padding-top: 15px; padding-bottom: 15px;">

<?php
if(isset($_GET['item'])) {
global $db_connect;
$item = $_GET['item'];

$query = "SELECT * FROM items WHERE item_id = '$item'";
$query_Result = mysqli_query($db_connect, $query);

while($row = mysqli_fetch_assoc($query_Result)) {
    $item_id = $row['item_id'];
    $item_name = $row['item_name'];
    $item_category = $row['item_category'];
    $item_desc = $row['item_desc'];
    $item_price = $row['item_price'];
    $new_price = $row['new_price'];
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
<form action="cart1.php?action=add&id=<?php echo $item_id; ?>" method="POST"> <!-- JUST ADDED IT FOR THE NEW CART METHOD -->
<div class="card mb-3">
  <div class="card-body">
    <div class="row">

    
    <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="product-slider position-relative h-100">
          <div class="owl-carousel owl-theme position-lg-inherit l-0 t-0 h-100 product-images" data-owl-carousel-controller=".product-thumbs" data-options='{"items":1,"loop":true,"autoplayTimeout":2000,"autoplay":true,"autoplayHoverPause":true,"nav":true,"dots":false,"slideBy":1}'>
            <?php if(isset($img1)&&!empty($img1)) {echo "<div class='item h-100'><a  href='../assets/ser_images/".$img1."' data-lightbox='Image' data-title=''><img class='rounded h-100 fit-contain' src='../assets/ser_images/".$img1."' alt=''></a></div>"; }?>
            <?php if(isset($img2)&&!empty($img2)) {echo "<div class='item h-100'><a  href='../assets/ser_images/".$img2."' data-lightbox='Image' data-title=''><img class='rounded h-100 fit-contain' src='../assets/ser_images/".$img2."' alt=''></a></div>"; }?>
            <?php if(isset($img3)&&!empty($img3)) {echo "<div class='item h-100'><a  href='../assets/ser_images/".$img3."' data-lightbox='Image' data-title=''><img class='rounded h-100 fit-contain' src='../assets/ser_images/".$img3."' alt=''></a></div>"; }?>
            <?php if(isset($img4)&&!empty($img4)) {echo "<div class='item h-100'><a  href='../assets/ser_images/".$img4."' data-lightbox='Image' data-title=''><img class='rounded h-100 fit-contain' src='../assets/ser_images/".$img4."' alt=''></a></div>"; }?>
            <?php if(isset($img5)&&!empty($img5)) {echo "<div class='item h-100'><a  href='../assets/ser_images/".$img5."' data-lightbox='Image' data-title=''><img class='rounded h-100 fit-contain' src='../assets/ser_images/".$img5."' alt=''></a></div>"; }?>
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
          <h5><?php echo $item_name ;?></h5>
          <a class="fs--1 mb-0 d-block text-secondary" href="../site/occasion_contents.php?category=<?php echo $item_category ;?>"><?php echo $item_category ;?></a><a class="fs--2 mb-3 d-inline-block text-decoration-none" href="#review" data-tab-target="#review" data-fancyscroll data-offset="80"></a>
          <p class="fs--1"><?php echo $item_desc ;?></p>
          <h4 class="d-flex align-items-center">
            <?php 
                if(isset($new_price)&&!empty($new_price)) {echo "
                  <span class='text-secondary mr-2'>".$new_price." KWD</span>
                  <span class='mr-1 fs--1 text-500'><del class='mr-1'>".$item_price." KWD</del></span>";
                } else {
                  echo "<span class='text-secondary mr-2'>".$item_price." KWD</span>";
                }
            ?>
          </h4>
          <div class="row mt-3">
              <div class="col-auto pr-0">
                  <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                      <div class="btn btn-sm btn-outline-yellow border-300" data-field="input-quantity" data-type="minus">-</div>
                      </div>
                      <input class="form-control text-center input-quantity input-spin-none" type="number" name="quantity" min="1" value="1" max="5" aria-label="Amount (to the nearest dollar)" style="max-width: 50px">
                      <div class="input-group-append">
                      <div class="btn btn-sm btn-outline-yellow border-300" data-field="input-quantity" data-type="plus">+</div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row mt-3">
            
              <input type="hidden" name="hidden_item_name" value="<?php echo $item_name ;?>">
              <input type="hidden" name="hidden_item_price" value="<?php echo $item_price ;?>">
              <div class="col-auto"><input class="btn btn-yellow mb-3" type="submit" name="add" value="Add to cart"></div>
            
          </div>

          <div class="row">
            <div class="col-12">
              <div class="fancy-tab overflow-hidden mt-4">
                <div class="nav-bar">
                  <div class="nav-bar-item active pl-0 pr-2 pr-sm-4">
                    <div class="mt-1 fs--1 text-yellow">Specifications</div>
                  </div>
                </div>
                <div class="tab-contents">
                  <div class="tab-content active">
                    <table class="table table-bordered fs--1">
                      <tbody>
                        <!-- <tr>
                          <td class="bg-100" style="width: 30%;">Height</td>
                          <td><?php echo $height ;?></td>
                        </tr>
                        <tr>
                          <td class="bg-100" style="width: 30%;">Width</td>
                          <td><?php echo $width ;?></td>
                        </tr>
                        <tr>
                          <td class="bg-100" style="width: 30%;">Weight</td>
                          <td><?php echo $weight ;?></td>
                        </tr> -->
                        <tr>
                          <td class="bg-100" style="width: 30%;">Type of Flowers</td>
                          <td><?php echo $flowers ;?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </div>   
      
    </div>    
  </div>
</div>


</div>




<?php } } ?>
</form> <!-- JUST ADDED IT FOR THE NEW CART METHOD -->
<?php include "../site/site_footer.php"; ?>