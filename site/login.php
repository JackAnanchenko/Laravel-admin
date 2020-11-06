<?php
include "../site/site_header.php";
include_once "../site/functions.php";
login();
?>

<div class="container" style="padding-top: 15px; padding-bottom: 15px;">

        <div class="row flex-center">
          <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <div class="card">
              <div class="card-body p-4 p-sm-5">
                <div class="row text-left justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5>Login</h5>
                  </div>
                </div>
                <form action="login.php" method="POST">
                  
                  <div class="form-group">
                    <input class="form-control" name="email" type="email" placeholder="Email address" />
                  </div>

                  <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="Password" />
                  </div>

                  <div class="row justify-content-between align-items-center d-flex flex-row-reverse">
                    <div class="col-auto "><a class="fs--1 text-yellow" href="../site/forgot_password.php">Forgot Password?</a></div>
                  </div>
                  
                  <div class="form-group">
                    <button class="btn btn-yellow btn-block mt-3 text-black" type="submit" name="login_submit">Log in</button>
                  </div>

                  <div class="w-100 position-relative mt-4 mb-4">
                      <hr class="text-300">
                      
                      <div class="position-absolute absolute-centered t-0 px-3 bg-white text-sans-serif fs--1 text-500 text-nowrap">
                          Don't have an account?
                      </div>
                  </div>
                
                  <div class="form-group">
                    <a class="btn btn-falcon-primary btn-block mt-3 text-black" type="button" href="../site/register.php">Register</a>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

</div>

<?php include "../site/site_footer.php"; ?>