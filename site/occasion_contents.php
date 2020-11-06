<?php 
include "../site/site_header.php";
?>

<div class="container" style="padding-top: 15px;">

    <!-- START - GET OCCASIONS NAME AS A TITLE -->
    <?php 
    if(isset($_GET['category'])) {
    global $db_connect;
    $category = $_GET['category'];
    }
    ?>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                    <h3 class="mb-0"><?php echo $category; ?></h3>
                </div>
                <div class="col-sm-auto">
                    <form class="d-inline-block mr-3">
                        <!-- <div class="input-group input-group-sm d-flex align-items-center"><small class="mr-1">Sort by: </small>
                            <select class="custom-select" aria-label="Bulk actions">
                            <option value="Refund">Newest to oldest</option>
                            <option value="Delete">Oldest to newest</option>
                            <option value="Delete">Lowest to highest</option>
                            <option value="Delete">highest to Lowest</option>
                            </select>
                        </div> -->
                    </form>
                    <!-- <a class="text-600" href="../e-commerce/product-list.html" data-toggle="tooltip" data-placement="top" title="Product List"><span class="fas fa-list-ul"></span></a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- END - GET OCCASIONS NAME AS A TITLE -->

    <!-- START - GET ITEMS OF THAT OCCASION -->
    <div class="card mb-3">

        <!-- START - ITEM CARD -->
        <div class="card-body">
            <div class="row">
                <?php if(isset($_GET['category'])) {
                    global $db_connect;
                    $category = $_GET['category'];
                
                    $query = "SELECT * FROM items WHERE item_category = '$category'";
                    $query_Result = mysqli_query($db_connect, $query);
                
                    while($row = mysqli_fetch_assoc($query_Result)) {
                        $item_id = $row['item_id'];
                        $item_name = $row['item_name'];
                        $item_price = $row['item_price'];
                        $new_price = $row['new_price'];
                        $img1 = $row['img1'];
                        ?>    
                        <div class="mb-4 col-md-6 col-lg-3">
                            <div class="rounded d-flex flex-column justify-content-between">
                                <div class="card card-span">
                                    <div class="rounded d-inline-block flex-column justify-content-between pb-3">
                                        <div class="overflow-hidden">
                                            <div class="position-relative rounded-top overflow-hidden" >
                                            <a class="d-block" href="item_info.php?item=<?php echo $item_id; ?>">
                                                <img class="img-fluid rounded-top" src="../assets/ser_images/<?php echo $img1; ?>" alt="image" />
                                            </a>
                                            </div>
                                            <div class="p-3">
                                                <h5 class="fs-0"><a class="text-dark" href="item_info.php?item=<?php echo $item_id; ?>"><?php echo $item_name; ?></a></h5>
                                                <hr>
                                                <?php
                                                if(empty($new_price)) {
                                                    echo "<h5 class='fs-0 text-yellow'>$item_price KWD</h5>";
                                                } else {
                                                    echo "<h5 class='fs-0 text-yellow'>$new_price KWD <del class='text-secondary'>$item_price KWD</del></h5>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } } ?>
            </div>
        </div>
        <!-- END - ITEM CARD -->

        <!-- START - PAGINATION -->
        <!-- <div class="card-footer bg-light d-flex justify-content-center">
            <div>
                <button class="btn btn-falcon-default btn-sm mr-2" type="button" disabled data-toggle="tooltip" data-placement="top" title="Prev"><span class="fas fa-chevron-left"></span></button><a class="btn btn-sm btn-falcon-default text-primary mr-2" href="#!">1</a><a class="btn btn-sm btn-falcon-default mr-2" href="#!">2</a><a class="btn btn-sm btn-falcon-default mr-2" href="#!"> <span class="fas fa-ellipsis-h"></span></a><a class="btn btn-sm btn-falcon-default mr-2" href="#!">35</a>
                <button class="btn btn-falcon-default btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Next"><span class="fas fa-chevron-right"></span></button>
            </div>
        </div> -->
        <!-- START - PAGINATION -->

    </div>
    <!-- START - GET ITEMS OF THAT OCCASION -->
        
</div>

<?php include "../site/site_footer.php"; ?>