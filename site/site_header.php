<?php ob_start(); ?>
<?php
include_once "../site/functions.php";
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Vows & Bees</title> 


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico"> -->
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <script src="../assets/js/config.navbar-vertical.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="../assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/lib/owl.carousel/owl.carousel.css" rel="stylesheet">
    <link href="../assets/css/theme.css" rel="stylesheet">
    <link href="../assets/lib/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="../assets/lib/datatables-bs4/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css" rel="stylesheet">
    <link href="../assets/lib/plyr/plyr.css" rel="stylesheet">
    <link href="../assets/lib/toastr/toastr.min.css" rel="stylesheet">
    <link href="../assets/lib/lightbox2/css/lightbox.min.css" rel="stylesheet">
    <link href="../assets/lib/select2/select2.min.css" rel="stylesheet">




  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
                  
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-yellow fs--1">
        <div class="container"><a class="navbar-brand" href="../site/index.php"><span class="text-black">Vows & Bees</span></a>
          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarStandard">
            <ul class="navbar-nav">
            
            <li class="nav-item"><a class="nav-link" style="color: #000000;" href="../site/index.php" role="button">Home</a>
            </li>

              <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link dropdown-toggle" id="navbarDropdownHome" style="color: #000000;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Occasions</a>
                <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownHome">
                    <div class="bg-white rounded-soft py-2">
                    <?php global $db_connect;
                          $query = "SELECT * FROM categories";
                          $query_result = mysqli_query($db_connect, $query);
                          while($row = mysqli_fetch_assoc($query_result)) {
                          $category_id = $row['category_id'];
                          $category_name = $row['category_name'];
                          echo "<a class='dropdown-item' href='../site/occasion_contents.php?category=".$category_name."'>".$category_name."</a>"; }
                      ?>  
                    </div>
                </div>
              </li>

              <li class="nav-item"><a class="nav-link" style="color: #000000;" href="../site/about.php" role="button">About Us</a>
            </li>

            <li class="nav-item"><a class="nav-link" style="color: #000000;" href="../site/contact.php" role="button">Contact Us</a>
            </li>

            </ul>

            <!-- START - ACCOUNT NAVIGATION ==============================-->
            <!--========================================================-->
            <?php if(isset($_SESSION['email_address'])) {?>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link dropdown-toggle" id="navbarDropdownHome" style="color: #000000;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                <div class="dropdown-menu dropdown-menu-card" aria-labelledby="navbarDropdownHome">
                    <div class="bg-white rounded-soft py-2">
                        <span class="dropdown-item text-black">Hello, <?php echo $_SESSION['first_name'];?></span>
                        <hr>
                        <a class="dropdown-item" href="../site/profile.php">Profile</a>
                        <hr>
                        <a class="dropdown-item" href="../site/logout.php">Log out</a>
                    </div>
                </div>
              </li>
            </ul>
            <?php } ?>
            <?php if (!isset($_SESSION['email_address'])) {?>
              <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" style="color: #000000;" href="../site/login.php">Account</a></li>
            </ul>
            <?php }?>
            <ul class="navbar-nav ml-0">
              <li class="nav-item border-black rounded"><a class="nav-link" style="color: #000000;" href="../site/shopping_cart.php">Cart<span class="fas fa-shopping-cart"></span></a></li>
              </ul>
            <!-- END - ACCOUNT NAVIGATION ==============================-->
            <!--========================================================-->

          </div>
        </div>
      </nav>

            <!-- ============================================-->
      <!-- <section> begin ============================-->



      <!-- ==============================================-->
<!-- START - AD BANNER ============================-->

<!-- END - AD BANNER ============================-->
<!-- ==============================================-->
      <!-- <section> close ============================-->
      <!-- ============================================-->