<?php
include "../site/admin_header.php";
add_item();
?>

<div class="card mb-3">
    <div class="card-header">
        <h5 class="mb-0">Add a New Item</h5>
    </div>

    <div class="card-body bg-light">
        <div class="row">
            <div class="col-12">

                  <form action="new_item.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="item_name">Item Name</label>
                      <input class="form-control" id="item_name" name="item_name" type="text" placeholder="Item Name" required>
                    </div>

                    <div class="form-group">
                        <label for="item_category">Category</label>
                        <select class="form-control" id="item_category" name="item_category"  placeholder="Select an option" required>
                        <option><?php dropdown_category();?></option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="item_desc">Item Description</label>
                      <textarea class="form-control" id="item_desc" name="item_desc" type="text" placeholder="Item Description"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="item_price">Price</label>
                      <input class="form-control" id="item_price" name="item_price" type="number" placeholder="Price" required>
                    </div>

                    <div class="form-group">
                      <label for="new_price">New Price</label>
                      <input class="form-control" id="new_price" name="new_price" type="number" placeholder="New Price" value="<?php if(isset($new_price)) {echo $new_price;}?>">
                    </div>

                    <div class="form-group">
                      <label for="item_quantity">Quantity Available</label>
                      <input class="form-control" id="item_quantity" name="item_quantity" type="number" placeholder="Quantity Available" required>
                    </div>

                    <hr>

                    <div class="form-group">
                      <label for="height">Height</label>
                      <input class="form-control" id="height" name="height" type="text" placeholder="Height" >
                    </div>

                    <div class="form-group">
                      <label for="width">Width</label>
                      <input class="form-control" id="width" name="width" type="text" placeholder="Width" >
                    </div>

                    <div class="form-group">
                      <label for="weight">Weight</label>
                      <input class="form-control" id="weight" name="weight" type="text" placeholder="Weight" >
                    </div>

                    <div class="form-group">
                      <label for="flowers">Type of Flowers</label>
                      <input class="form-control" id="flowers" name="flowers" type="text" placeholder="Roses, Tulips....." >
                    </div>

                    <hr>

                    <div class="form-group">
                      <label for="img1">Image 1</label>
                      <input class="form-control-file" id="img1" name="img1" type="file">
                    </div>

                    <div class="form-group">
                      <label for="img2">Image 2</label>
                      <input class="form-control-file" id="img2" name="img2" type="file">
                    </div>

                    <div class="form-group">
                      <label for="img3">Image 3</label>
                      <input class="form-control-file" id="img3" name="img3" type="file">
                    </div>

                    <div class="form-group">
                      <label for="img4">Image 4</label>
                      <input class="form-control-file" id="img4" name="img4" type="file">
                    </div>

                    <div class="form-group">
                      <label for="img5">Image 5</label>
                      <input class="form-control-file" id="img5" name="img5" type="file">
                    </div>

                    <hr>

                    <button class="btn btn-yellow mb-3" type="submit" name="new_item_submit">Add</button>
                    <input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
                  </form>
                  
            </div>
        </div>
    </div>
</div>

<?php include "../site/admin_footer.php";?>