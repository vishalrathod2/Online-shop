<?php session_start();
error_reporting(0);
include('includes/config.php');

if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>INVISIBLE FOOTWEAR | HOME PAGE</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon.ico">
    <style>
    body {
        background-color: #f8f9fa;
    }
    .hero {
    position: relative;
    width: 100vw; /* Full viewport width */
    left: 50%; /* Start at the middle */
    right: 50%; /* Move to the right */
    margin-left: -50vw; /* Offset by half viewport width */
    margin-right: -50vw; /* To ensure full width */
    height: 400px; /* Adjust height as needed */
    background-size: cover;
    background-position: center;
}

@media (max-width: 767px) {
    .hero {
        height: 250px; /* Adjust height for smaller screens */
    }
}

    
    .product-item {
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        background-color: #fff;
        transition: box-shadow 0.3s;
    }
    .product-item:hover {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    /* Other styles... */
</style>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            margin-bottom: 20px;
            height: 400px;
            background-size: cover;
            background-position: center;
        }
        .product-item {
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background-color: #fff;
            transition: box-shadow 0.3s;
        }
        .product-item:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .product-info {
            padding: 10px 0;
        }
        .product-price {
            font-weight: bold;
            color: #d9534f;
        }
        .price-before-discount {
            text-decoration: line-through;
            color: #777;
        }
        .action {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
    <?php include('includes/top-header.php'); ?>
    <?php include('includes/main-header.php'); ?>
    <?php include('includes/menu-bar.php'); ?>
</header>
<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="furniture-container homepage-container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                     
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                </div><!-- /.sidemenu-holder -->
                <div class="more-info-tab clearfix">
        <h2 class="new-product-title" style="text-align: center; font-size: 32px; color: #333; margin-bottom: 30px; font-weight: bold;">All Products</h2>
    </div>

            <!-- ============================================== SCROLL TABS ============================================== -->
            <div style="margin: 40px 0; padding: 20px; background-color: #f9f9f9; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);">
   

    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM products");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="item" style="flex: 0 1 calc(25% - 30px); margin-bottom: 30px;">
                        <div class="product-item" style="border: 1px solid #ddd; border-radius: 12px; background-color: #fff; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden; transition: transform 0.3s;">
                            <div class="product-image" style="position: relative; overflow: hidden;">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                    <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" 
                                         alt="" style="width: 100%; border-radius: 8px; transition: transform 0.3s;">
                                </a>
                            </div>
                            <div class="product-info text-left" style="padding: 15px;">
                                <h3 class="name" style="font-size: 20px; margin: 10px 0;">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>" style="text-decoration: none; color: #007BFF; font-weight: bold; transition: color 0.3s;" 
                                       onmouseover="this.style.color='#FF5733';" onmouseout="this.style.color='#007BFF';">
                                        <?php echo htmlentities($row['productName']); ?>
                                    </a>
                                </h3>
                                <div class="product-price">
                                    <span class="price" style="color: #FF5733; font-weight: bold; font-size: 20px;">
                                        Rs. <?php echo htmlentities($row['productPrice']); ?>
                                    </span>
                                    <span class="price-before-discount" style="text-decoration: line-through; color: #999; font-size: 16px;">
                                        Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?>
                                    </span>
                                </div><!-- /.product-price -->
                            </div><!-- /.product-info -->
                            <div class="action" style="padding: 10px;">
                                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="lnk btn btn-info" 
                                   style="background-color: #28a745; color: #fff; border: none; padding: 12px 20px; border-radius: 4px; font-weight: bold; text-align: center; display: block; transition: background-color 0.3s, transform 0.3s;"
                                   onmouseover="this.style.backgroundColor='#218838'; this.style.transform='scale(1.05)';" 
                                   onmouseout="this.style.backgroundColor='#28a745'; this.style.transform='scale(1)';">
                                    <i class="fa fa-shopping-cart"></i> Add to Cart
                                </a>
                            </div>
                        </div><!-- /.product-item -->
                    </div><!-- /.item -->
                <?php } ?>
            </div><!-- /.product-slider -->
        </div>
    </div>
</div>
            </div>
            <hr />
            <?php include('includes/brands-slider.php'); ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/echo.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script>
<script src="assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/scripts.js"></script>

<script src="switchstylesheet/switchstylesheet.js"></script>
<script>
    $(document).ready(function() {
        $(".changecolor").switchstylesheet({seperator: "color"});
        $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
        $('.show-theme-options').delay(2000).trigger('click');
    });
</script>
</body>
</html>
