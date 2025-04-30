<?php
session_start();
error_reporting(E_ALL); // Enable all error reporting for development
include('includes/config.php');

$cid = intval($_GET['scid'] ?? 0);

// Add to cart functionality
if (isset($_GET['action']) && $_GET['action'] === "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $stmt = $con->prepare("SELECT * FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows !== 0) {
            $row = $result->fetch_assoc();
            $_SESSION['cart'][$row['id']] = ["quantity" => 1, "price" => $row['productPrice']];
            echo "<script>document.location ='my-cart.php';</script>";
        } else {
            echo "<script>alert('Product ID is invalid');</script>";
        }
    }
}

// Wishlist functionality
if (isset($_GET['pid']) && $_GET['action'] === "wishlist") {
    if (!isset($_SESSION['login']) || strlen($_SESSION['login']) === 0) {
        header('location:login.php');
        exit();
    } else {
        $stmt = $con->prepare("INSERT INTO wishlist (userId, productId) VALUES (?, ?)");
        $stmt->bind_param("ii", $_SESSION['id'], $_GET['pid']);
        $stmt->execute();
        echo "<script>alert('Product added to wishlist');</script>";
        header('location:my-wishlist.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sub Category</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet'>
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body class="cnt-home">
<header class="header-style-1">
    <?php include('includes/top-header.php'); ?>
    <?php include('includes/menu-bar.php'); ?>
</header>

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row outer-bottom-sm'>
            <div class='col-md-3 sidebar'>
                <div class="side-menu animate-dropdown outer-bottom-xs" style="width: 250px; background-color: #f9f9f9; border: 1px solid #ddd; padding: 10px; border-radius: 5px;">       
                    <div class="head" style="font-size: 18px; font-weight: bold; margin-bottom: 10px;">
                        <i class="icon fa fa-align-justify fa-fw"></i> Sub Categories
                    </div>        
                    <nav class="yamm megamenu-horizontal" role="navigation">
                        <ul class="nav" style="list-style: none; padding: 0;">
                            <li class="dropdown menu-item" style="margin-bottom: 5px;">
                                <?php 
                                $sql = mysqli_query($con, "SELECT id, subcategory FROM subcategory WHERE categoryid='$cid'");
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <a href="sub-category.php?scid=<?php echo $row['id'];?>" class="dropdown-toggle" style="text-decoration: none; color: #333; padding: 8px; display: block; border-radius: 4px; transition: background-color 0.3s;">
                                        <?php echo $row['subcategory'];?>
                                    </a>
                                <?php } ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class='col-md-9'>
                <div class="search-result-container">
                    <div class="tab-pane active" id="grid-container">
                        <div class="category-product inner-top-vs">
                            <div class="row">
                                <?php
                                $ret = $con->prepare("SELECT * FROM products WHERE subCategory=?");
                                $ret->bind_param("i", $cid);
                                $ret->execute();
                                $result = $ret->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>">
                                                                <img src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="<?php echo htmlentities($row['productName']); ?>" width="200" height="300">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['productName']); ?></a></h3>
                                                        <div class="product-price">
                                                            <span class="price">Rs. <?php echo htmlentities($row['productPrice']); ?></span>
                                                            <span class="price-before-discount">Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <a href="category.php?page=product&action=add&id=<?php echo $row['id']; ?>">
                                                                        <button class="btn btn-success" type="button"> <i class="icon fa fa-shopping-cart"></i> Add to cart</button>
                                                                    </a>
                                                                </li>
                                                                <li class="wishlist">
                                                                    <a class="add-to-wishlist" href="category.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist" title="Wishlist">     
                                                                        <button class="btn btn-success" type="button"><i class="icon fa fa-heart"></i></button>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                    }
                                } else {
                                    echo '<div class="col-sm-6 col-md-4 wow fadeInUp"><h3>No Product Found</h3></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
