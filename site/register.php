<?php
include "../site/site_header.php";
include_once "functions.php";
register();
?>

<div class="container" style="padding-top: 15px; padding-bottom: 15px;">

        <div class="row flex-center">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="row text-left justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5>Register</h5>
                  </div>
                </div>
                <form action="register.php" method="POST">
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input class="form-control" id="first_name" name="first_name" type="text" placeholder="First name" required/>
                  </div>

                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input class="form-control" id="last_name" name="last_name" type="text" placeholder="Last name" required/>
                  </div>

                  <!--<div class="form-group">-->
                  <!--  <label for="phone">Phone Number</label>-->
                  <!--  <input class="form-control" id="phone" name="phone" type="text" placeholder="Phone Number" required/>-->
                  <!--</div>-->

                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="Email address" required/>
                  </div>

                  <div class="form-group">
                    <label for="password1">Password</label>
                    <input class="form-control" id="password1" name="password1" type="password" placeholder="Password" required/>
                  </div>

                  <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input class="form-control" id="password2" name="password2" type="password" placeholder="Confirm Password" required/>
                  </div>

                  <div class="form-group">
                    <button class="btn btn-yellow btn-block mt-3 text-black" type="submit" name="register_submit">Register</button>
                  </div>

                  <div class="w-100 position-relative mt-4 mb-4">
                      <hr class="text-300">
                      
                      <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">
                          Already have an account?
                      </div>
                  </div>

                  <div class="form-group">
                    <a class="btn btn-falcon-primary btn-block mt-3 text-black" type="button" href="../site/login.php">Log in</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>


</div>

<?php include "../site/site_footer.php"; ?>