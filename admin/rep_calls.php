<?php
include "../site/admin_header.php";
?>


          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- START - APPLICATIONS REPORT -->
          <div class="card mb-3">
            <div class="card-header">
              <div class="row align-items-center justify-content-between">
                <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                  <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Calls</h5>
                </div>
                <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                  <div id="dashboard-actions">
                    <input style="border: 1px solid #d8e2ef; border-radius: 0.25rem; width: 100px; height: 30px;" type="text" id="search" name="search" onkeyup="myFunction()" placeholder="Phone.." >
                    <button class="btn btn-falcon-default btn-sm" type="button" id="filter" name="filter"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1" name="filter">Filter</span></button>
                    <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ml-1">Export</span></button>
                    
                    <script>
                      function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("search");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
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
                    </script>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pt-0">
              <div class="dashboard-data-table">
                <table name="myTable" id="myTable" class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":15,"columnDefs":[{"targets":[0,6],"orderable":true}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ "},"buttons":["copy","excel"]}'>
                  <thead class="bg-200 text-900">
                  <tr>
                      <th class="sort pr-1 align-middle text-center">ID</th>
                      <th class="sort pr-1 align-middle text-center">Phone</th>
                      <th class="sort pr-1 align-middle text-center">Date</th>
                      <th class="sort pr-1 align-middle text-center">Time</th>
                      <th class="sort pr-1 align-middle text-center">Status</th>
                      <th class="sort pr-1 align-middle text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody id="purchases">
                    <?php view_calls();?>
                    <?php complete_call();?>
                    <?php cancel_call();?>
                    <?php pending_call();?>
                    <?php delete_call();?>
                    <?php progress_call();?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- END - APPLICATIONS REPORT -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->
          <!-- =============================================================================================================================================== -->



    <?php include "../site/admin_footer.php";?>