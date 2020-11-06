<?php 
include "../site/site_header.php";
// submit_test_application();
?>

          <div class="container" style="padding-top: 15px; padding-bottom: 15px;">
            
              <div class="card mb-3">
                <div class="card-header bg-light">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-auto">
                      <h5 class="mb-2 mb-sm-0">Your Details</h5>
                    </div>
                  </div>
                </div>
                <form action="../hesabe/pay.php" method="POST">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">

                        <div class="form-group">
                        <label for="item_category">First Name</label>
                            <input class="form-control" name="fname" type="text" placeholder="First Name" />
                        </div>

                        <div class="form-group">
                        <label for="item_category">Last Name</label>
                            <input class="form-control" name="lname" type="text" placeholder="Last Name" />
                        </div>

                        <div class="form-group">
                        <label for="item_category">Email address</label>
                            <input class="form-control" name="email" type="email" placeholder="Email address" />
                        </div>

                        <div class="form-group">
                        <label for="item_category">Phone Number</label>
                            <input class="form-control" name="phone" type="text" placeholder="Phone Number" />
                        </div>

                        <!-- <div class="form-group">
                        <label for="item_category">Gift Message</label>
                            <textarea class="form-control" name="email" type="email" placeholder="Message here..." ></textarea>
                        </div>

                        <div class="form-group">
                        <label for="item_category">URL to QR Code</label>
                            <input class="form-control" name="email" type="email" placeholder="URL here..." />
                        </div> -->

                    </div>
                    <div class="col-md-6">
                      <div class="position-relative">
                        <div class="custom-control custom-radio radio-select">
                            
                            <!-- <div class="form-group">
                            <label for="item_category">Area</label>
                                <input class="form-control" name="email" type="email" placeholder="Area" />
                            </div>

                            <div class="form-group">
                                <label for="item_category">Type</label>
                                <select class="form-control" id="item_category" name="item_category"  placeholder="Select an option" required>
                                <option>House</option>
                                <option>Apartment</option>
                                </select>
                            </div> -->

                            <!-- <div class="form-group">
                            <label for="block">Block</label>
                                <input class="form-control" name="email" type="email" placeholder="Block" />
                            </div>

                            <div class="form-group">
                            <label for="item_category">Street</label>
                                <input class="form-control" name="email" type="email" placeholder="Street" />
                            </div>

                            <div class="form-group">
                            <label for="item_category">Avenue</label>
                                <input class="form-control" name="email" type="email" placeholder="Avenue" />
                            </div>

                            <div class="form-group">
                            <label for="item_category">House Number</label>
                                <input class="form-control" name="email" type="email" placeholder="House Number" />
                            </div> -->

                            <div class="form-group">
                                <input class="form-control" name="payAmount" type="payAmount" value="<?php echo $_SESSION['grand_total'] ?>" hidden/>
                            </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                

              </div>
              <div class="card">
                <div class="card-header bg-light">
                  <h5 class="mb-0">Payment Method</h5>
                </div>
                <div class="card-body">
                  <div class="form-row">
                    

                    <div class="col-12 pl-4">
                      <div class="row">
                        <div class="col-sm-8">
                          <div class="form-row align-items-center">
                            
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input radio-collapse" type="radio" name="payment-method" id="credit-card" checked="checked" />
                                    <label class="custom-control-label" for="credit-card"><span class="d-flex align-items-center mb-2 fs-1">K-NET</span>
                                    <input class="custom-control-input radio-collapse" type="radio" name="payment-method" id="debit-card"  />
                                    <label class="custom-control-label" for="debit-card"><span class="d-flex align-items-center mb-2 fs-1">Credit Card</span></label>
                                </div>
                            
                          </div>
                        </div>
                        
                        <div class="col-4 text-center d-none d-sm-block">
                          <div class="rounded  bg-100">
                            <div class="text-uppercase fs--2 font-weight-bold">We Accept</div><img src="../assets/img/icons/icon-payment-methods-grid.png" alt="" width="120">
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <hr class="border-dashed my-5">
                  <div class="row">
                    <div class="col-md-5 col-xl-12 col-xxl-5 pl-lg-4 pl-xl-2 pl-xxl-5 text-center text-md-left text-xl-center text-xxl-left">
                      <hr class="border-dashed d-block d-md-none d-xl-block d-xxl-none my-4">
                      <div class="fs-2 font-weight-semi-bold">All Total: <span class="text-yellow">
                      <?php
                        if(isset($_SESSION['grand_total'])) {
                          echo $_SESSION['grand_total'];
                        } else {
                          $_SESSION['grand_total'] = "";
                        }
                      ?>
                       KWD</span></div>
                      <button class="btn btn-yellow mt-3 px-5" type="submit" name="checkout_submit">Confirm &amp; Pay</button>
                      <p class="fs--1 mt-3 mb-0">By clicking <strong>Confirm & Pay </strong>button you agree to the <a href="#!" class="text-yellow">Terms of service</a></p>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
            
          

<?php include "../site/site_footer.php"; ?>