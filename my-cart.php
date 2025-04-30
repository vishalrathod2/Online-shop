<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit'])) {
    if(!empty($_SESSION['cart'])) {
        foreach($_POST['quantity'] as $key => $val) {
            if($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
        echo "<script>alert('Your Cart has been Updated');</script>";
    }
}

// Code for Remove a Product from Cart
if(isset($_POST['remove'])) {
    if(!empty($_SESSION['cart'])) {
        foreach($_POST['remove'] as $key) {
            unset($_SESSION['cart'][$key]);
        }
        echo "<script>alert('Your item has been removed');</script>";
    }
}

// Code for insert product in order table
if(isset($_POST['ordersubmit'])) {
    if(strlen($_SESSION['login']) == 0) {   
        header('location:login.php');
    } else {
        $quantity = $_POST['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);

        foreach($value as $qty => $val34) {
            header('location:payment-method.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>My Cart</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link href="assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/rateit.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="favicon.ico">
</head>
<head>
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="cnt-home">

<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
    <?php include('includes/top-header.php');?>
    <?php include('includes/main-header.php');?>
    <?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php" style="color: initial;" onclick="this.style.color='#FF5733'; this.style.fontWeight='bold';">HOME</a></li>
                <li class='active' style="color: #4169E1; font-weight: bold;">MY CART</li>
            </ul>
        </div>
    </div>
</div>
<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="shopping-cart">
                <div class="col-md-12 col-sm-12 shopping-cart-table">
                    <div class="table-responsive">
                        <form name="cart" method="post">	
                            <?php if(!empty($_SESSION['cart'])): ?>
								<table class="table table-bordered" style="border: 1px solid #ccc; margin-top: 20px; border-radius: 8px; overflow: hidden; width: 100%;">
    <thead>
        <tr style="background-color: #f8f8f8; text-align: left;">
            <th class="cart-description item" style="width: 20%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Image</th>
            <th class="cart-product-name item" style="width: 30%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Product Name</th>
            <th class="cart-qty item" style="width: 15%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Quantity</th>
            <th class="cart-sub-total item" style="width: 15%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Price Per Unit</th>
            <th class="cart-sub-total item" style="width: 15%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Grandtotal</th>
            <th class="cart-romove last-item" style="width: 10%; padding: 15px; font-weight: bold; border-bottom: 2px solid #ddd;">Action</th>

        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="6" style="text-align: right; padding: 15px;">
                <div class="shopping-cart-btn">
                    <a href="index.php" class="btn btn-upper btn-primary outer-left-xs" style="margin-right: 10px; padding: 10px 15px; background-color: #007BFF; color: white; border-radius: 5px; text-decoration: none;">Continue Shopping</a>
                    <input type="submit" name="submit" value="Update Shopping Cart" class="btn btn-upper btn-primary pull-right outer-right-xs" style="padding: 10px 15px; background-color: #28A745; color: white; border-radius: 5px; border: none;">
                </div>
            </td>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $pdtid = array();
        $sql = "SELECT * FROM products WHERE id IN(";
        foreach($_SESSION['cart'] as $id => $value) {
            $sql .= $id . ",";
        }
        $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
        $query = mysqli_query($con, $sql);
        $totalprice = 0;
        $totalqunty = 0;

        if(!empty($query)) {
            while($row = mysqli_fetch_array($query)) {
                $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'];
                $totalprice += $subtotal;
                $_SESSION['qnty'] = $totalqunty += $quantity;

                array_push($pdtid, $row['id']);
        ?>
                <tr style="border-bottom: 1px solid #ccc;">

                    <td class="cart-image" style="padding: 15px;">
                        <div class="entry-thumbnail">
                            <img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="" width="114" height="146" style="border-radius: 5px; border: 1px solid #ddd;">
                        </div>
                    </td>
                    <td class="cart-product-name-info" style="padding: 15px;">
                        <h4 class='cart-product-description' style="margin: 0; font-size: 16px;">
                            <a href="product-details.php?pid=<?php echo htmlentities($pd = $row['id']);?>" style="color: #333; text-decoration: none;"><?php echo $row['productName']; ?></a>
                        </h4>
                    </td>
                    <td class="cart-product-quantity" style="padding: 15px;">
                        <input type="number" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]" style="width: 50px; text-align: center; padding: 5px; border: 1px solid #ccc; border-radius: 4px;">
                    </td>
                    <td class="cart-product-sub-total" style="padding: 15px;">
                        <span class="cart-sub-total-price"><?php echo "Rs" . " " . $row['productPrice']; ?>.00</span>
                    </td>
                    <td class="cart-product-grand-total" style="padding: 15px;">
                        <span class="cart-grand-total-price"><?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice']); ?>.00</span>
                    </td>
                    <td class="romove-item" style="padding: 15px;">
    <button type="submit" name="remove[]" value="<?php echo htmlentities($row['id']); ?>" class="btn btn-danger" style="padding: 5px 10px; border: none; border-radius: 4px; background-color: #dc3545; color: white; display: flex; align-items: center;">
        <i class="fas fa-trash" style="margin-right: 5px;"></i> Delete
    </button>
</td>


                </tr>
        <?php 
            } 
        }
        $_SESSION['pid'] = $pdtid;
        ?>
    </tbody>
</table>
 <?php else: ?>
                                <p style="text-align: center; font-size: 16px; color: #666;">Your shopping cart is empty.</p>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    <table style="width: 100%; margin-top: 20px;">
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'");
                            while($row = mysqli_fetch_array($query)) {
                                // Additional user info can be displayed here if needed
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-sm-12 cart-shopping-total">
                    <table class="table table-bordered" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>
                                    <div class="cart-grand-total" style="padding: 15px; font-size: 20px; background-color: #f8f8f8; border-radius: 5px;">
                                        Grand Total <span class="inner-left-md" style="font-weight: bold; color: #FF5733;"><?php echo $_SESSION['tp'] = "$totalprice" . ".00"; ?></span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
    <div class="cart-checkout-btn pull-right" style="margin-top: 10px;">
        <button type="button" name="ordersubmit" class="btn btn-primary" id="cmd" style="padding: 10px 20px; background-color: #007BFF; color: white; border: none; border-radius: 5px;" onclick="window.location.href='payment-method.php';">
            PROCEED TO CHECKOUT
        </button>
    </div>
</td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>

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
        $(".changecolor").switchstylesheet({ seperator: "color" });
        $('.show-theme-options').click(function() {
            $(this).parent().toggleClass('open');
            return false;
        });
    });

    $(window).bind("load", function() {
       $('.show-theme-options').delay(2000).trigger('click');
    });

    const cmd = document.getElementById('cmd');
    cmd.addEventListener('click', () => {
        alert('SELECT PAYMENT METHOD');
    });
</script>
</body>
</html>
