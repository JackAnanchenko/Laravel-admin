<?php 
include "../site/site_header.php";
new_submit();
?>

<div class="container" style="padding-top: 15px; padding-bottom: 15px;">

            <div class="card card-span">
              <div class="card-body p-4 p-sm-5">
                <div class="row text-left justify-content-between align-items-center mb-2">
                  <div class="col-auto">
                    <h5>Contact Us</h5>
                  </div>
                </div>
                <form action="contact.php" method="POST">
                  
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" name="name" type="text" placeholder="Name" required/>
                  </div>

                  <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input class="form-control" name="email" type="email" placeholder="Email Address" required/>
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input class="form-control" name="phone" type="text" placeholder="Phone Number" required/>
                  </div>

                  <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input class="form-control" name="subject" type="text" placeholder="Subject" required/>
                  </div>

                  <div class="form-group">
                    <label for="msg">Message:</label>
                    <textarea col="50" rows="10" class="form-control" name="msg" type="text" placeholder="Write your message here..." required></textarea>
                  </div>
                  
                  <div class="form-group">
                    <button class="btn btn-yellow btn-block mt-3" type="submit" name="contact_submit">Submit</button>
                  </div>


                </form>
              </div>
            </div>


</div>

<?php include "../site/site_footer.php";?>