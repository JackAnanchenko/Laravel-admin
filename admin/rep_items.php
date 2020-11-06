<?php
include "../site/admin_header.php";
?>

          <div class="card mb-3">
            <div class="card-header">
              <div class="row align-items-center justify-content-between">
                <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Items</h5>
                </div>
                <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                  <div id="dashboard-actions">
                    <button class="btn btn-yellow btn-sm mx-2" type="button"><a class="text-black d-sm-inline-block ml-1" href="new_item.php">New</a></button>

                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0">
              <div class="dashboard-data-table">
                <table id="uni_list_table" class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":7,"columnDefs":[{"targets":[0,5],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                  <thead class="bg-200 text-900">
                  <tr>
                      <th class="sort pr-1 align-middle text-center">Logo</th>
                      <th class="sort pr-1 align-middle text-center">Item Name</th>
                      <th class="sort pr-1 align-middle text-center">Category Name</th>
                      <th class="sort pr-1 align-middle text-center">Price</th>
                      <th class="sort pr-1 align-middle text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody id="purchases">
                    <?php view_items(); ?>
                    <?php delete_item(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <!-- <script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("uni_name_input");
              filter = input.value.toUpperCase();
              table = document.getElementById("uni_list_table");
              tr = table.getElementsByTagName("tr");
              for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
          </script> -->
          <!-- END - APPLICATIONS REPORT -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->


    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <?php include "../site/admin_footer.php";?>