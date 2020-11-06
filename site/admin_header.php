<?php ob_start(); ?>
<?php
include_once "../site/functions.php";
?>

<?php
if(isset($_SESSION['email_address'])) {
  if($_SESSION['role'] == 'User') {
    header("Location: ../site/index.php");
  }
}
?>

<?php
if(!isset($_SESSION['email_address'])) {
    header("Location: ../site/index.php");
}
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
    <title>Vows & Bees | Admin</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <script src="../assets/js/config.navbar-vertical.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="../assets/lib/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/lib/datatables-bs4/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/lib/datatables.net-responsive-bs4/responsive.bootstrap4.css" rel="stylesheet">
    <link href="../assets/lib/leaflet/leaflet.css" rel="stylesheet">
    <link href="../assets/lib/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="../assets/lib/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    <link href="../assets/css/theme.css" rel="stylesheet">
    <link href="../assets/lib/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link href="../assets/lib/select2/select2.min.css" rel="stylesheet">
    <link href="../assets/lib/dropzone/dropzone.min.css" rel="stylesheet">

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


      <div class="container" data-layout="container">
        <nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="../admin/rep_universities.php">
              <div class="d-flex align-items-center py-3"><span class="text-sans-serif">Vows & Bees</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <h5 class="text-yellow">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"></span><span class="nav-link-text">Report</span>
                        </div>
                    </h5>
                  <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="orders.php">Orders</a></li>

                    <li class="nav-item"><a class="nav-link" href="financials.php">Financials</a></li>

                    <li class="nav-item"><a class="nav-link" href="rep_contact.php">Contacts</a></li>
                  </ul>
                </li>

                <div class="navbar-vertical-divider">
                    <hr class="navbar-vertical-hr my-2" />
                </div>

                <li class="nav-item">
                    <h5 class="text-yellow">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"></span><span class="nav-link-text">Item Mng</span>
                        </div>
                    </h5>
                  <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="rep_items.php">Items</a></li>

                    <li class="nav-item"><a class="nav-link" href="rep_categories.php">Categories</a></li>

                    <li class="nav-item"><a class="nav-link" href="rep_subscriptions.php">Subscriptions</a></li>

                    <li class="nav-item"><a class="nav-link" href="rep_discounts.php">Discount Codes</a></li>
                  </ul>
                </li>

                <div class="navbar-vertical-divider">
                    <hr class="navbar-vertical-hr my-2" />
                </div>

                <li class="nav-item">
                    <h5 class="text-yellow">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"></span><span class="nav-link-text">Users</span>
                        </div>
                    </h5>
                  <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="users.php">Users List</a></li>
                    <li class="nav-item"><a class="nav-link" href="admins.php">Admin Users List</a></li>
                  </ul>
                </li>

                <div class="navbar-vertical-divider">
                    <hr class="navbar-vertical-hr my-2" />
                </div>

                <li class="nav-item">
                  <ul class="nav collapse show" id="home" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="ads.php">Ads</a></li>
                    <li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li>
                  </ul>
                </li>


              </ul>
              
            </div>
          </div>
        </nav>
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top sticky-kit navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler mr-1 mr-sm-3" type="button" data-toggle="collapse" data-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand mr-1 mr-sm-3" href="../admin/orders.php">
            <div class="d-flex align-items-center"><span class="text-sans-serif">Vows & Bees</span>
              </div>
            </a>
            <ul class="navbar-nav navbar-nav-icons ml-auto flex-row align-items-center">
              <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link pr-0" id="navbarDropdownUser" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <span class="far fa-user-circle fs-3" data-fa-transform="shrink-1"></span>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white rounded-soft py-2">

                    <a class="dropdown-item text-primary" href="#!">Hello, <?php if(isset($_SESSION['email_address'])) {echo $_SESSION['first_name'];}?></a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../admin/settings.php">Settings</a>
                    <a class="dropdown-item" href="../site/logout.php">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
        