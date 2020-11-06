<?php
include "../site/admin_header.php";
add_discount_code();
?>

          
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - ADD NEW PROGRAM -->
          <div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Add New Discount</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                  <form action="new_discount.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="dname">Discount Name</label>
                      <input class="form-control" id="dname" name="dname" type="text" placeholder="Discount Name" required>
                    </div>

                    <div class="form-group">
                      <label for="dcode">Discount Code</label>
                      <input class="form-control" id="dcode" name="dcode" type="text" placeholder="Discount Code" required>
                    </div>

                    <div class="form-group">
                      <label for="expiry_date">Expiry Date</label>
                      <input class="form-control datetimepicker" id="expiry_date" name="expiry_date" type="text" data-options='{"dateFormat":"y/m/d"}' required>
                    </div>

                    <div class="form-group">
                      <label for="percentage">Percentage</label>
                      <input class="form-control" id="percentage" name="percentage" type="number" placeholder="Percentage" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <select onchange="displayFields()" class="custom-select mb-3" id="type" name="type">
                            <option id="general" value="general">General</option>
                            <option id="specific" value="specific">Specific</option>
                        </select>
                    </div>

                    <div class="form-group" id="collection" style="display: none;">
                        <label for="collection">Collection</label>
                        <select class="custom-select mb-3" id="collection" name="collection">
                            <option id="1" value="1">Collection 1</option>
                            <option id="2" value="2">Collection 2</option>
                        </select>
                    </div>

                    <button class="btn btn-primary mb-3" type="submit" name="new_discount_code">Add</button>
                    <input class="btn btn-secondary mb-3" type="button" onclick="history.back()" value="Cancel" style="margin-left: 20px;">
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- END - ADD NEW PROGRAM -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->


    <?php include "../site/admin_footer.php";?>

    <script>
    function displayFields() {
        if (document.getElementById('type').value == 'specific') {
            document.getElementById('collection').style.display = '';
            document.getElementById('type').disabled = false;
            document.getElementById('type').value = 'specific';
        } else {
            document.getElementById('collection').style.display = 'none';
            document.getElementById("type").required = false;
        }
    }
</script>