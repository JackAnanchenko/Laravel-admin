<?php 
ob_start(); 
session_start();
?>

<?php
include "../site/db.php";

// ============================= REGISTER / LOGIN ============================= //
// ============================= REGISTER / LOGIN ============================= //
// ============================= REGISTER / LOGIN ============================= //

// REGISTER
function register() {
    if(isset($_POST['register_submit'])) {
        global $db_connect;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        $first_name = mysqli_real_escape_string($db_connect, $first_name);
        $last_name = mysqli_real_escape_string($db_connect, $last_name);
        $email = mysqli_real_escape_string($db_connect, $email);
        $password1 = mysqli_real_escape_string($db_connect, $password1);
        $password2 = mysqli_real_escape_string($db_connect, $password2);

        $password1 = md5($password1);

        $check_query = "SELECT * FROM users WHERE email_address = '$email'";
        $check_query_result = mysqli_query($db_connect, $check_query);
        $num_rows = mysqli_num_rows($check_query_result);
        
        if($num_rows !== 0) {
            echo "<div class='alert alert-danger' role='alert'>The email address is already in use</div>";
        } else {
            $query = "INSERT INTO users(first_name, last_name, email_address, password, role) ";
            $query .= "VALUES ('$first_name', '$last_name', '$email', '$password1', 'User')";
            $query_result = mysqli_query($db_connect, $query);
    
            if(!$query_result){
                die('Query Failed');
            } else {
            echo "<div class='alert alert-success' role='alert'>You have successfully registered in our site! You can <a href='../site/login.php'>login now</a></div>";
            }
        }

        
    }
}


//==================================================
//==================================================

// UPDATE ACCOUNT LOGIN CREDENTIALS
function update_account() {
    if(isset($_POST['update_account'])) {
        global $db_connect;
        $email1 = $_POST['email1'];
        $email2 = $_POST['email2'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $curr_password = $_POST['curr_password'];

        $email1 = mysqli_real_escape_string($db_connect, $email1);
        $email2 = mysqli_real_escape_string($db_connect, $email2);
        $password1 = mysqli_real_escape_string($db_connect, $password1);
        $password2 = mysqli_real_escape_string($db_connect, $password2);
        $curr_password = mysqli_real_escape_string($db_connect, $curr_password);

        $password1 = md5($password1);
        $password2 = md5($password2);
        $curr_password = md5($curr_password);

        $session_password = $_SESSION['password'];

        if($email2 !== $email1) {
            echo "Email addresses don't match!";
        } else if($password2 !== $password1) {
            echo "Passwords don't match!";
        } else if ($curr_password == $session_password && $email2 == $email1 && $password2 == $password1) {
            $query = "UPDATE users SET email_address = '$email1', password = '$password1' WHERE email_address = '{$_SESSION['email_address']}'";
            $query_result = mysqli_query($db_connect, $query);

            if(!$query_result){
                die('Query Failed');
            }
        }
    }
}

//==================================================
//==================================================

// UPDATE USER ACCOUNT LOGIN CREDENTIALS ON WEBSITE
function update_password() {
    if(isset($_POST['update_password'])) {
        global $db_connect;
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $old_password = $_POST['old_password'];

        $password1 = mysqli_real_escape_string($db_connect, $password1);
        $password2 = mysqli_real_escape_string($db_connect, $password2);
        $old_password = mysqli_real_escape_string($db_connect, $old_password);

        $password1 = md5($password1);
        $password2 = md5($password2);
        $old_password = md5($old_password);

        $session_password = $_SESSION['password'];

        if($password2 !== $password1) {
            echo "Passwords don't match!";
        } else if ($old_password == $session_password && $password2 == $password1) {
            $query = "UPDATE users SET password = '$password1' WHERE email_address = '{$_SESSION['email_address']}'";
            $query_result = mysqli_query($db_connect, $query);

            if(!$query_result){
                die('Query Failed');
            }
        }
    }
}


// UPDATE USER ACCOUNT NAMES ON WEBSITE
function update_user_names() {
    if(isset($_POST['update_name'])) {
        global $db_connect;
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $first_name = mysqli_real_escape_string($db_connect, $first_name);
        $last_name = mysqli_real_escape_string($db_connect, $last_name);

        if(empty($first_name) || empty($last_name)) {
            echo "First name or Last name is empty";
        } else {
            $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name' WHERE email_address = '{$_SESSION['email_address']}'";
            $query_result = mysqli_query($db_connect, $query);

            if(!$query_result){
                die('Query Failed');
            }
        }
    }
}
//==================================================
//==================================================

// LOGIN
function login() {
    if(isset($_POST['login_submit'])) {
        global $db_connect;
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        $email = mysqli_real_escape_string($db_connect, $email);
        $password = mysqli_real_escape_string($db_connect, $password);
                
        $select_query = "SELECT * FROM users WHERE email_address = '$email'";
        $select_query_result = mysqli_query($db_connect, $select_query);
        
        while($row = mysqli_fetch_assoc($select_query_result)){
            $db_user_id = $row['user_id'];
            $db_first_name = $row['first_name'];
            $db_last_name = $row['last_name'];
            $db_email_address = $row['email_address'];
            $db_password = $row['password'];
            $db_role = $row['role'];
            
            $password = md5($password);
        
            if($password <> $db_password) {
                echo "<div class='alert alert-danger' role='alert'>Password is Incorrect!</div>";
            }
            elseif($email == $db_email_address && $password == $db_password && $db_role == "Admin") {
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['first_name'] = $db_first_name;
                $_SESSION['last_name'] = $db_last_name;
                $_SESSION['email_address'] = $db_email_address;
                $_SESSION['password'] = $db_password;
                $_SESSION['role'] = $db_role;
                header("Location: ../admin/orders.php");
                exit;
            } elseif($email == $db_email_address && $password == $db_password && $db_role == "User") {
                $_SESSION['user_id'] = $db_user_id;
                $_SESSION['first_name'] = $db_first_name;
                $_SESSION['last_name'] = $db_last_name;
                $_SESSION['email_address'] = $db_email_address;
                $_SESSION['password'] = $db_password;
                $_SESSION['role'] = $db_role;
                header("Location: index.php");
                exit;
            } else {
                echo "<div class='alert alert-danger' role='alert'>Email Address or Password is Incorrect!</div>";
            }
        }
    }
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

//  MANAGEMENT / ITEMS / CATEGORIES / DISCOUNTS / SUBSCRIPTIONS //
//  MANAGEMENT / ITEMS / CATEGORIES / DISCOUNTS / SUBSCRIPTIONS //
//  MANAGEMENT / ITEMS / CATEGORIES / DISCOUNTS / SUBSCRIPTIONS //


// CREATE NEW ITEM
function add_item() {
    if(isset($_POST['new_item_submit'])) {
        global $db_connect;
        $item_name = $_POST['item_name'];
        $item_desc = $_POST['item_desc'];
        $item_category = $_POST['item_category'];
        $item_price = $_POST['item_price'];
        $new_price = $_POST['new_price'];
        $item_quantity = $_POST['item_quantity'];

        $img1 = $_FILES['img1']['name'];
        $img2 = $_FILES['img2']['name'];
        $img3 = $_FILES['img3']['name'];
        $img4 = $_FILES['img4']['name'];
        $img5 = $_FILES['img5']['name'];

        $target1 = "../assets/ser_images/".basename($img1);
        $target2 = "../assets/ser_images/".basename($img2);
        $target3 = "../assets/ser_images/".basename($img3);
        $target4 = "../assets/ser_images/".basename($img4);
        $target5 = "../assets/ser_images/".basename($img5);

        move_uploaded_file($_FILES['img1']['tmp_name'], $target1);
        move_uploaded_file($_FILES['img2']['tmp_name'], $target2);
        move_uploaded_file($_FILES['img3']['tmp_name'], $target3);
        move_uploaded_file($_FILES['img4']['tmp_name'], $target4);
        move_uploaded_file($_FILES['img5']['tmp_name'], $target5);

        $query = "INSERT INTO items(item_name, item_desc, item_category, item_price, new_price, ";
        $query .= "item_quantity, img1, img2, img3, img4, img5, item_status, added_date) ";
        $query .= "VALUES ('$item_name', '$item_desc', '$item_category', '$item_price', '$new_price', ";
        $query .= "'$item_quantity', '$img1', '$img2', '$img3', '$img4', '$img5', 'Show', now())";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
            header("Location: rep_items.php");
            exit;
        }
    }
}

//==================================================
//==================================================

// ITEMS REPORT IN ADMIN
function view_items() {
        global $db_connect;
        $query = "SELECT * FROM items";
        $query_result = mysqli_query($db_connect, $query);
        while($row = mysqli_fetch_assoc($query_result)) {
            $item_id = $row['item_id'];
            $item_name = $row['item_name'];
            $item_category = $row['item_category'];
            $item_price = $row['item_price'];
            $img1 = $row['img1'];
    
            echo "
                    <tr class='btn-reveal-trigger'>
                        <td class='align-middle text-center' style='height: 100px; width: 100px;'><img class='round-soft img-fluid rounded' src='../assets/ser_images/".$row['img1']."' alt='image'></td>
                        <td class='align-middle text-center'>$item_name</td>
                        <td class='align-middle text-center'>$item_category</td>
                        <td class='align-middle text-center'>$item_price</td>
                        <td class='align-middle text-center'>
                            <div class='dropdown text-sans-serif'>
                            
                                <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                    <span class='fas fa-ellipsis-h fs--1'></span>
                                </button>

                                <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                    <div class='bg-white py-2'>
                                        <a class='dropdown-item' href='edit_item.php?edit={$item_id}'>View & Edit</a>
                                        <hr>
                                        <a class='dropdown-item' href='rep_items.php?del={$item_id}'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            ";
        }
    }

//==================================================
//==================================================

// DELETE ITEM
function delete_item() {
    global $db_connect;
    if(isset($_GET['del'])) {
    $item_id = $_GET['del'];
    $query = "DELETE FROM items WHERE item_id = $item_id";
    $delete_query_result = mysqli_query($db_connect, $query);
    header("Location: rep_items.php");
    exit();
    }
}


//==================================================
//==================================================

// CREATE NEW CATEGORY
function add_category() {
    if(isset($_POST['new_category_submit'])) {
        global $db_connect;
        $category_name = $_POST['category_name'];

        $category_icon = $_FILES['category_icon']['name'];

        $target = "../assets/ser_images/".basename($category_icon);

        move_uploaded_file($_FILES['category_icon']['tmp_name'], $target);

        $query = "INSERT INTO categories(category_name, category_icon) ";
        $query .= "VALUES ('$category_name', '$category_icon')";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
            header("Location: rep_categories.php");
            exit;
        }
    }
}

//==================================================
//==================================================

// CREATE NEW CATEGORY
function add_discount_code() {
    if(isset($_POST['new_discount_code'])) {
        global $db_connect;
        $dname = $_POST['dname'];
        $dcode = $_POST['dcode'];
        $percentage = $_POST['percentage'];
        $expiry_date = $_POST['expiry_date'];
        $type = $_POST['type'];
        $collection = $_POST['collection'];
        

        $query = "INSERT INTO discounts(discount_name, discount_code, discount_date, discount_value, discount_type, discount_collection) ";
        $query .= "VALUES ('$dname', '$dcode', '$expiry_date', '$percentage', '$type', '$collection')";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
            header("Location: rep_discounts.php");
            exit;
        }
    }
}
//==================================================
//==================================================

// CATEGORIES REPORT IN ADMIN
function view_categories() {
    global $db_connect;
    $query = "SELECT * FROM categories";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_icon = $row['category_icon'];

        echo "
                <tr class='btn-reveal-trigger'>
                    <td class='align-middle text-center' style='height: 100px; width: 100px;'><img class='img-fluid rounded' src='../assets/ser_images/$category_icon' alt=''></td>
                    <td class='align-middle text-center'>$category_name</td>
                    <td class='align-middle text-center'>
                        <div class='dropdown text-sans-serif'>
                        
                            <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                <span class='fas fa-ellipsis-h fs--1'></span>
                            </button>

                            <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                <div class='bg-white py-2'>
                                    <a class='dropdown-item' href='edit_category.php?edit={$category_id}'>View & Edit</a>
                                    <hr>
                                    <a class='dropdown-item' href='rep_categories.php?del={$category_id}'>Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        ";
    }
}

//==================================================
//==================================================

// DELETE CATEGORY
function delete_category() {
    global $db_connect;
    if(isset($_GET['del'])) {
    $category_id = $_GET['del'];
    $query = "DELETE FROM categories WHERE category_id = $category_id";
    $delete_query_result = mysqli_query($db_connect, $query);
    header("Location: rep_categories.php");
    exit();
    }
}


//==================================================
//==================================================

// VIEW UNIVERSITY STATES LIST ON WEBSITE
function nav_category() {
    global $db_connect;
    $query = "SELECT * FROM categories";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        echo $row['category_name'];
    }
}

//==================================================
//==================================================

// VIEW UNIVERSITY STATES LIST ON WEBSITE
function dropdown_category() {
    global $db_connect;
    $query = "SELECT DISTINCT category_name FROM categories";
    $query_result = MYSQLI_QUERY($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_name = $row['category_name'];
        echo "<option>".$row['category_name']."</option>";
    }
}


//==================================================
//==================================================

// VIEW ITEMS LIST ON WEBSITE
function view_items_list_based_on_category() {
    if(isset($_GET['category'])) {
    global $db_connect;
    $category = $_GET['category'];
    $query = "SELECT * FROM items WHERE category_name = '$category'";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_name = $row['category_name'];
        $item_id = $row['item_id'];
        $item_name = $row['item_name'];
        $item_price = $row['item_price'];
        $img1 = $row['img1'];

            echo "
                    <div class='mb-4 col-md-6 col-lg-3'>
                        <div class='card card-span'>
                            <div class=' rounded d-flex flex-column justify-content-between pb-3'>
                                <div class='overflow-hidden'>
                                    <div class='position-relative rounded-top overflow-hidden border border-200'>
                                    <a class='d-block text-center' href='item_info.php?view=$item_id'>
                                        <img class='img-fluid rounded' src='../assets/ser_images/".$row['img1']."' style='object-fit: contain; height: 150px;' alt='image' />
                                    </a>
                                    </div>
                                    <div class='p-3'>
                                        <h5 class='fs-0'><a class='text-dark' href='item_info.php?view=$item_id'>$item_name</a></h5>
                                        <h5 class='fs-md-1 text-yellow mb-0 d-flex align-items-center mb-3'>$item_price KWD</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            ";
        }
    }
}

                  
//==================================================
//==================================================

// VIEW UNIVERSITY LIST ON WEBSITE
function list_occasions() {
    global $db_connect;
    $query = "SELECT * FROM categories";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_icon = $row['category_icon'];

        echo "
                <div class='mb-4 col-md-6 col-lg-3'>
                    <div class='card card-span'>
                        <div class=' rounded d-flex flex-column justify-content-between pb-3'>
                            <div class='overflow-hidden'>
                                <div class='position-relative rounded-top overflow-hidden border border-200'>
                                <a class='d-block text-center' href='occasion_contents.php?category=$category_name'>
                                    <img class='img-fluid rounded' src='../assets/ser_images/".$row['category_icon']."' style='object-fit: contain; height: 150px;' alt='image' />
                                </a>
                                </div>
                                <div class='p-3'>
                                    <h5 class='fs-0'><a class='text-dark' href='occasion_contents.php?category=$category_name'>$category_name</a></h5>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        ";
    }
}


//==================================================
//==================================================

// VIEW ITEMS RECENTLY ADDED LIST ON WEBSITE
function recent_items_index() {
    global $db_connect;
    $query = "SELECT * FROM items ORDER BY added_date DESC LIMIT 4";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $item_id = $row['item_id'];
        $item_name = $row['item_name'];
        $item_desc = $row['item_desc'];
        $item_price = $row['item_price'];
        $img1 = $row['img1'];

        echo "
            <div class='mb-4 col-md-6 col-lg-3'>
                <div class='rounded d-flex flex-column justify-content-between'>
                    <div class='card card-span'>
                        <div class='rounded d-inline-block flex-column justify-content-between pb-3'>
                            <div class='overflow-hidden'>
                                <div class='position-relative rounded-top overflow-hidden'>
                                <a class='d-block' href='item_info.php?item=$item_id'>
                                    <img class='img-fluid rounded-top' src='../assets/ser_images/".$row['img1']."' alt='image' />
                                </a>
                                </div>
                                <div class='p-3'>
                                    <h5 class='fs-0'><a class='text-dark' href='item_info.php?item=$item_id'>$item_name</a></h5>
                                    <h5 class='fs-md-1 text-yellow mb-0 d-flex align-items-center mb-3'>$item_price KWD</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        ";
    }
}


//==================================================
//==================================================

// VIEW ITEMS RECENTLY ADDED LIST ON WEBSITE
function top_items_index() {
    global $db_connect;
    $query = "SELECT * FROM items ORDER BY RAND() LIMIT 4";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $item_id = $row['item_id'];
        $item_name = $row['item_name'];
        $item_desc = $row['item_desc'];
        $item_price = $row['item_price'];
        $img1 = $row['img1'];

        echo "
        <div class='mb-4 col-md-6 col-lg-3'>
            <div class='rounded d-flex flex-column justify-content-between'>
                <div class='card card-span'>
                    <div class='rounded d-inline-block flex-column justify-content-between pb-3'>
                        <div class='overflow-hidden'>
                            <div class='position-relative rounded-top overflow-hidden'>
                            <a class='d-block' href='item_info.php?item=$item_id'>
                                <img class='img-fluid rounded-top' src='../assets/ser_images/".$row['img1']."' alt='image' />
                            </a>
                            </div>
                            <div class='p-3'>
                                <h5 class='fs-0'><a class='text-dark' href='item_info.php?item=$item_id'>$item_name</a></h5>
                                <h5 class='fs-md-1 text-yellow mb-0 d-flex align-items-center mb-3'>$item_price KWD</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
    }
}
//==================================================
//==================================================

// VIEW ITEMS RECENTLY ADDED LIST ON WEBSITE
function categories_index() {
    global $db_connect;
    $query = "SELECT * FROM categories ORDER BY RAND() LIMIT 4";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $category_id = $row['category_id'];
        $category_name = $row['category_name'];
        $category_icon = $row['category_icon'];

            echo "
                    <div class='mb-4 col-md-6 col-lg-3'>
                        <div class='card card-span h-100'>
                            <div class=' rounded h-100 d-flex flex-column justify-content-between pb-3'>
                                <div class='overflow-hidden'>
                                    <div class='position-relative rounded-top overflow-hidden border border-200'>
                                    <a class='d-block text-center' href='occasion_contents.php?category=$category_name'>
                                        <img class='img-fluid rounded' src='../assets/ser_images/".$row['category_icon']."' style='object-fit: contain; height: 150px;' alt='image' />
                                    </a>
                                    </div>
                                    <div class='p-3'>
                                        <h5 class='fs-0'><a class='text-dark' href='occasion_contents.php?category=$category_name'>$category_name</a></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            ";
    }
}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// ============================= CONTACTS ============================= //
// ============================= CONTACTS ============================= //
// ============================= CONTACTS ============================= //

// REGISTER
function new_submit() {
    if(isset($_POST['contact_submit'])) {
        global $db_connect;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        $msg = $_POST['msg'];

        $name = mysqli_real_escape_string($db_connect, $name);
        $email = mysqli_real_escape_string($db_connect, $email);
        $phone = mysqli_real_escape_string($db_connect, $phone);
        $subject = mysqli_real_escape_string($db_connect, $subject);
        $msg = mysqli_real_escape_string($db_connect, $msg);

        $query = "INSERT INTO contact(contact_name, contact_email, contact_phone, contact_subject, contact_body, date) ";
        $query .= "VALUES ('$name', '$email', '$phone', '$subject', '$msg', now())";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
        echo "<div class='alert alert-success' role='alert'>Your message has been successfully sent! Thank you for conntacting us!</div>";
        }
    }
}


//==================================================
//==================================================

// CONTACTS REPORT IN ADMIN
function view_contact() {
    global $db_connect;
    $query = "SELECT * FROM contact ORDER BY date";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $contact_id = $row['contact_id'];
        $contact_subject = $row['contact_subject'];
        $contact_phone = $row['contact_phone'];
        $date = $row['date'];

        echo "
                <tr class='btn-reveal-trigger'>
                    <td class='align-middle text-center'>$contact_id</td>
                    <td class='align-middle text-center'>$contact_subject</td>
                    <td class='align-middle text-center'>$contact_phone</td>
                    <td class='align-middle text-center'>$date</td>
                    <td class='align-middle text-center'>
                        <div class='dropdown text-sans-serif'>
                        
                            <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                <span class='fas fa-ellipsis-h fs--1'></span>
                            </button>

                            <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                <div class='bg-white py-2'>
                                    <a class='dropdown-item' href='contact_info.php?view={$contact_id}'>View</a>
                                    <hr>
                                    <a class='dropdown-item' href='rep_contact.php?del={$contact_id}'>Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        ";
    }
}


//==================================================
//==================================================

// DELETE CONTACT
function delete_contact() {
    global $db_connect;
    if(isset($_GET['del'])) {
    $contact_id = $_GET['del'];
    $query = "DELETE FROM contact WHERE contact_id = $contact_id";
    $delete_query_result = mysqli_query($db_connect, $query);
    header("Location: rep_contact.php");
    exit();
    }
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// ============================= CALLS ============================= //
// ============================= CALLS ============================= //
// ============================= CALLS ============================= //

// SCHEDULE A CALL
// function call_schedule() {
//     if(isset($_POST['call_submit'])) {
//         global $db_connect;
//         $phone = $_POST['phone'];
//         $datepicker = $_POST['datepicker'];
//         $timepicker = $_POST['timepicker'];

//         $query = "INSERT INTO calls(phone, date, time, status) VALUES ('$phone', '$datepicker', '$timepicker', 'Pending')";
//         $query_result = mysqli_query($db_connect, $query);

//         if(!$query_result){
//             die('Query Failed');
//         } else {
//             header("Location index.php");
//         }
//     }
// }


// //==================================================
// //==================================================

// // CALLS REPORT IN ADMIN
// function view_calls() {
//     global $db_connect;
//     $query = "SELECT * FROM calls";
//     $query_result = mysqli_query($db_connect, $query);
//     while($row = mysqli_fetch_assoc($query_result)) {
//         $call_id = $row['call_id'];
//         $phone = $row['phone'];
//         $date = $row['date'];
//         $time = $row['time'];
//         $status = $row['status'];

//         echo "
//                 <tr class='btn-reveal-trigger'>
//                     <td class='align-middle text-center'>$call_id</td>
//                     <td class='align-middle text-center'>$phone</td>
//                     <td class='align-middle text-center'>$date</td>
//                     <td class='align-middle text-center'>$time</td>";

//                     if ($status == "In Progress") {
//                         echo "<td class='align-middle text-center'><span class='badge badge rounded-capsule badge-soft-primary'>$status</span></td>";
//                     } elseif ($status == "Pending") {
//                         echo "<td class='align-middle text-center'><span class='badge badge rounded-capsule badge-soft-warning'>$status</span></td>";
//                     } elseif ($status == "Completed") {
//                         echo "<td class='align-middle text-center'><span class='badge badge rounded-capsule badge-soft-success'>$status</span></td>";
//                     } elseif ($status == "Cancelled") {
//                         echo "<td class='align-middle text-center'><span class='badge badge rounded-capsule badge-soft-danger'>$status</span></td>";
//                     }

//         echo "      <td class='align-middle text-center'>
//                             <div class='dropdown text-sans-serif'>
                            
//                                 <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
//                                     <span class='fas fa-ellipsis-h fs--1'></span>
//                                 </button>

//                                 <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
//                                     <div class='bg-white py-2'>
//                                         <a class='dropdown-item' href='rep_calls.php?complete={$call_id}'>Mark as Completed</a>
//                                         <a class='dropdown-item' href='rep_calls.php?progress={$call_id}'>Mark as In Progress</a>
//                                         <a class='dropdown-item' href='rep_calls.php?pending={$call_id}'>Mark as Pending</a>
//                                         <a class='dropdown-item' href='rep_calls.php?cancel={$call_id}'>Mark as Cancelled</a>
//                                         <hr>
//                                         <a class='dropdown-item' href='rep_calls.php?del={$call_id}'>Delete</a>
//                                     </div>
//                                 </div>
//                             </div>
//                         </td>";
//         echo "</tr>";
//     }
// }


// //==================================================
// //==================================================

// // CHANGE CALL STATUS TO 'COMPLETE'
// function complete_call() {
//     if(isset($_GET['complete'])) {
//         global $db_connect;
//         $call_id = $_GET['complete'];
//         $query = "UPDATE calls SET status = 'Completed' WHERE call_id = $call_id";
//         $query_result = mysqli_query($db_connect, $query);
//         header("Location: rep_calls.php");
//         exit;
//     }
// }


// //==================================================
// //==================================================

// // CHANGE CALL STATUS TO 'CANCELLED'
// function cancel_call() {
//     if(isset($_GET['cancel'])) {
//         global $db_connect;
//         $call_id = $_GET['cancel'];
//         $query = "UPDATE calls SET status = 'Cancelled' WHERE call_id = $call_id";
//         $query_result = mysqli_query($db_connect, $query);
//         header("Location: rep_calls.php");
//         exit;
//     }
// }

// //==================================================
// //==================================================

// // CHANGE CALL STATUS TO 'PENDING'
// function pending_call() {
//     if(isset($_GET['pending'])) {
//         global $db_connect;
//         $call_id = $_GET['pending'];
//         $query = "UPDATE calls SET status = 'Pending' WHERE call_id = $call_id";
//         $query_result = mysqli_query($db_connect, $query);
//         header("Location: rep_calls.php");
//         exit;
//     }
// }

// //==================================================
// //==================================================

// // CHANGE CALL STATUS TO 'IN PROGRESS'
// function progress_call() {
//     if(isset($_GET['progress'])) {
//         global $db_connect;
//         $call_id = $_GET['progress'];
//         $query = "UPDATE calls SET status = 'In Progress' WHERE call_id = $call_id";
//         $query_result = mysqli_query($db_connect, $query);
//         header("Location: rep_calls.php");
//         exit;
//     }
// }


// //==================================================
// //==================================================

// // DELETE A CALL
// function delete_call() {
//     global $db_connect;
//     if(isset($_GET['del'])) {
//     $call_id = $_GET['del'];
//     $query = "DELETE FROM calls WHERE call_id = $call_id";
//     $delete_query_result = mysqli_query($db_connect, $query);
//     header("Location: rep_calls.php");
//     exit();
//     }
// }


// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// // ============================= ADS ============================= //
// // ============================= ADS ============================= //
// // ============================= ADS ============================= //

// CREATE NEW AD
function add_ad() {
    if(isset($_POST['new_ad_submit'])) {
        global $db_connect;
        $ad_name = $_POST['ad_name'];
        $ad_url = $_POST['ad_url'];
        $img = $_FILES['img']['name'];

        $target = "../assets/ser_images/".basename($img);

        move_uploaded_file($_FILES['img']['tmp_name'], $target);

        $query = "INSERT INTO ads(ad_name, ad_url, ad_img, status) VALUES ('$ad_name', '$ad_url', '$img', 'Show') ";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
            header("Location: ads.php");
            exit;
        }
    }
}


//==================================================
//==================================================

// UNIVERSITY REPORT IN ADMIN
function view_ads() {
        global $db_connect;
        $query = "SELECT * FROM ads";
        $query_result = mysqli_query($db_connect, $query);
        while($row = mysqli_fetch_assoc($query_result)) {
            $ad_id = $row['ad_id'];
            $ad_name = $row['ad_name'];
            $img = $row['ad_img'];
            $status = $row['status'];
    
            echo "
                    <tr class='btn-reveal-trigger'>
                        <td class='align-middle text-center' style='height: 100px; width: 200px;'><img class='img-fluid fit-cover w-sm-100 h-sm-100 rounded' src='../assets/ser_images/".$row['ad_img']."' alt='image'></td>
                        <td class='align-middle text-center'>".$row['ad_name']."</td>
                        <td class='align-middle text-center'>$status</td>
                        <td class='align-middle text-center'>
                            <div class='dropdown text-sans-serif'>
                            
                                <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                    <span class='fas fa-ellipsis-h fs--1'></span>
                                </button>

                                <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                    <div class='bg-white py-2'>
                                        <a class='dropdown-item' href='edit_ad.php?edit={$ad_id}'>View & Edit</a>
                                        <a class='dropdown-item' href='ads.php?show={$ad_id}'>Show</a>
                                        <a class='dropdown-item' href='ads.php?hide={$ad_id}'>Hide</a>
                                        <hr>
                                        <a class='dropdown-item' href='ads.php?d_el={$ad_id}'>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            ";
        }
    }

//==================================================
//==================================================

// UNIVERSITY REPORT IN WEBSITE
function banner_ads() {
    global $db_connect;
    $query = "SELECT * FROM ads WHERE status = 'Show'";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $ad_id = $row['ad_id'];
        $ad_name = $row['ad_name'];
        $ad_url = $row['ad_url'];
        $img = $row['ad_img'];
        $status = $row['status'];

        // <a href='".$row['ad_url']."'><img class='rounded' src='../assets/ser_images/".$row['ad_img']."' alt=''></a>

        echo "
            <div class='position-relative py-6 py-lg-10'>
                <a href='".$row['ad_url']."'><div class='bg-holder rounded ' style='background-image:url(../assets/ser_images/".$row['ad_img']."'></div></a>
            </div>
        ";
    }
}

//==================================================
//==================================================

// CHANGE AD STATUS TO 'SHOW'
function show_ad() {
    if(isset($_GET['show'])) {
        global $db_connect;
        $ad_id = $_GET['show'];
        $query = "UPDATE ads SET status = 'Show' WHERE ad_id = $ad_id";
        $query_result = mysqli_query($db_connect, $query);
        header("Location: ads.php");
        exit;
    }
}


//==================================================
//==================================================

// CHANGE AD STATUS TO 'HIDE'
function hide_ad() {
    if(isset($_GET['hide'])) {
        global $db_connect;
        $ad_id = $_GET['hide'];
        $query = "UPDATE ads SET status = 'Hide' WHERE ad_id = $ad_id";
        $query_result = mysqli_query($db_connect, $query);
        header("Location: ads.php");
        exit;
    }
}


//==================================================
//==================================================

// DELETE AN AD
function delete_ad() {
    global $db_connect;
    if(isset($_GET['d_el'])) {
    $ad_id = $_GET['d_el'];
    $query = "DELETE FROM ads WHERE ad_id = $ad_id";
    $delete_query_result = mysqli_query($db_connect, $query);
    header("Location: ads.php");
    exit();
    }
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// ============================= ABOUT US ============================= //
// ============================= ABOUT US ============================= //
// ============================= ABOUT US ============================= //


// CREATE NEW ABOUT US SECTION
function add_about_section() {
    if(isset($_POST['new_about_section'])) {
        global $db_connect;
        $about_title = $_POST['about_title'];
        $about_desc = $_POST['about_desc'];
        $about_order = $_POST['about_order'];

        $about_title = mysqli_real_escape_string($db_connect, $_POST['about_title']);
        $about_desc = mysqli_real_escape_string($db_connect, $_POST['about_desc']);
        $about_order = mysqli_real_escape_string($db_connect, $_POST['about_order']);

        $query = "INSERT INTO aboutus(about_title, about_desc, about_order) ";
        $query .= "VALUES ('$about_title', '$about_desc', $about_order)";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die('Query Failed');
        } else {
            header("Location: settings.php#tab-About");
            exit;
        }
    }
}

//==================================================
//==================================================

// VIEW ABOUT US SECTIONS IN ADMIN
function view_about() {
    global $db_connect;
    $query = "SELECT * FROM aboutus ORDER BY about_order ASC";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $about_id = $row['about_id'];
        $about_title = $row['about_title'];
        $about_desc = $row['about_desc'];
        $about_order = $row['about_order'];

        echo "
                <tr class='btn-reveal-trigger'>
                    <td class='align-middle text-center'>$about_order</td>
                    <td class='align-middle text-center'>$about_title</td>
                    <td class='align-middle text-center'>
                        <div class='dropdown text-sans-serif'>
                        
                            <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                <span class='fas fa-ellipsis-h fs--1'></span>
                            </button>

                            <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                <div class='bg-white py-2'>
                                    <a class='dropdown-item' href='edit_about.php?editabout={$about_id}'>View & Edit</a>
                                    <hr>
                                    <a class='dropdown-item' href='settings.php?delabout={$about_id}'>Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
        ";
    }
}

//==================================================
//==================================================

// DELETE ABOUT US SECTION
function delete_about() {
    global $db_connect;
    if(isset($_GET['delabout'])) {
        $about_id = $_GET['delabout'];
        $query = "DELETE FROM aboutus WHERE about_id = $about_id";
        $delete_query_result = mysqli_query($db_connect, $query);
        header("Location: settings.php#tab-About");
        exit();
        }
    }

//==================================================
//==================================================

// VIEW SECTION LIST ON WEBSITE
function list_about() {
    global $db_connect;
    $query = "SELECT * FROM aboutus ORDER BY about_order ASC";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $about_id = $row['about_id'];
        $about_title = $row['about_title'];
        $about_desc = $row['about_desc'];
        $about_order = $row['about_order'];

        if($about_order == 1) {
                echo "<h3>$about_title</h3>
                <p class='mb-0' style='text-align: justify;'>".nl2br($about_desc)."</p>";
        } else {
                echo "<h3 class='mt-6'>$about_title</h3>
                <p class='mb-0' style='text-align: justify;'>".nl2br($about_desc)."</p>";
        }
    }
}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// ============================= USERS LIST ============================= //
// ============================= USERS LIST ============================= //
// ============================= USERS LIST ============================= //

// USERS REPORT IN ADMIN
function users_report() {
    global $db_connect;
    $query = "SELECT * FROM users";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $user_id  = $row['user_id'];
        $email_address = $row['email_address'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];

        echo "
                <tr class='btn-reveal-trigger'>
                    <td class='align-middle text-center'>".$user_id."</td>".
                    "<td class='align-middle text-center'>".$email_address."</td>".
                    "<td class='align-middle text-center'>".$first_name." ".$last_name."</td>
                </tr>";
    }
}


// ADMIN USERS REPORT IN ADMIN
function admin_users_report() {
    global $db_connect;
    $query = "SELECT * FROM users WHERE role = 'Admin'";
    $query_result = mysqli_query($db_connect, $query);
    while($row = mysqli_fetch_assoc($query_result)) {
        $user_id  = $row['user_id'];
        $email_address = $row['email_address'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];

        echo "
                <tr class='btn-reveal-trigger'>
                    <td class='align-middle text-center'>".$user_id."</td>".
                    "<td class='align-middle text-center'>".$email_address."</td>".
                    "<td class='align-middle text-center'>".$first_name." ".$last_name."</td>".
                    "<td class='align-middle text-center'>
                        <div class='dropdown text-sans-serif'>
                        
                            <button class='btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3' type='button' id='dropdown10' data-toggle='dropdown' data-boundary='html' aria-haspopup='true' aria-expanded='false'>
                                <span class='fas fa-ellipsis-h fs--1'></span>
                            </button>

                            <div class='dropdown-menu dropdown-menu-right border py-0' aria-labelledby='dropdown10'>
                                <div class='bg-white py-2'>
                                    <a class='dropdown-item' href='edit_admin.php?editadmin={$user_id}'>View & Edit</a>
                                    <hr>
                                    <a class='dropdown-item' href='admins.php?deladmin={$user_id}'>Delete</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>";
    }
}

// DELETE ADMIN USERS
function delete_admins() {
    global $db_connect;
    if(isset($_GET['deladmin'])) {
        $user_id = $_GET['deladmin'];
        $query = "DELETE FROM users WHERE user_id = $user_id";
        $delete_query_result = mysqli_query($db_connect, $query);
        header("Location: admins.php");
        exit();
        }
    }


// CREATE NEW ADMIN USER
function add_admin() {
    if(isset($_POST['new_admin_submit'])) {
        global $db_connect;
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        $fname = mysqli_real_escape_string($db_connect, $_POST['fname']);
        $lname = mysqli_real_escape_string($db_connect, $_POST['lname']);
        $email = mysqli_real_escape_string($db_connect, $_POST['email']);
        $password = mysqli_real_escape_string($db_connect, $_POST['password']);

        $query = "INSERT INTO users(first_name, last_name, email_address, password, phone, role) ";
        $query .= "VALUES ('$fname', '$lname', '$email', '$password', '$phone', 'Admin')";
        $query_result = mysqli_query($db_connect, $query);

        if(!$query_result){
            die(mysqli_error($db_connect));
        } else {
            header("Location: admins.php");
            exit;
        }
    }
}

?>