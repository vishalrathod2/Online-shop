<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>About Us</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico">
    <style>
        .about-header {
            text-align: center;
            padding: 50px 0;
            background-color: #f8f9fa;
        }
        .about-header h2 {
            font-size: 36px;
            color: #333;
            text-decoration: underline;
        }
        .about-content {
            margin: 20px 0;
        }
        .about-image {
            width: 100%;
            border-radius: 10px;
        }
        .cta-button {
            margin-top: 20px;
            text-align: center;
        }
        .cta-button a {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .cta-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="cnt-home">
<header class="header-style-1">
    <?php include('includes/top-header.php');?>
    <?php include('includes/main-header.php');?>
    <?php include('includes/menu-bar.php');?>
</header>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php" style="color: initial;" onclick="this.style.color='#FF5733'; this.style.fontWeight='bold';">HOME</a></li>
                <li class='active' style="color: #4169E1; font-weight: bold;">ABOUT US</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="whole-wrap pb-100" style="padding-bottom: 100px;">
    <div class="container">
        <div class="about-header">
            <h2>About Us</h2>
        </div>
        <div class="section-top-border about-content">
            <div class="row">
                <div class="col-md-4">
                    <img src="/footwear/aboutus/about.jpg" alt="About Us" class="about-image">
                </div>
                <div class="col-md-8">
                    <p>Welcome to <a href="index.php" style="color: #007bff;"><strong>Invisible Footwear</strong></a>, where innovation and comfort seamlessly blend. Our mission is to create advanced, virtually invisible shoes that offer unparalleled comfort while enhancing your style.</p>
                    <p>Our journey began with a vision: footwear that feels like a natural extension of your foot—lightweight, breathable, and discreet. We use cutting-edge materials and sustainable practices to craft shoes that prioritize both style and eco-consciousness.</p>
                    <p>At Invisible Footwear, we’re dedicated to quality and customer satisfaction. Our team is committed to providing a unique shopping experience with exceptional service and innovative designs that meet the demands of modern life.</p>
                   <p class="text-right">Thank you for choosing <a href="index.php" style="color: #007bff;"><strong>Invisible Footwear</strong></a>. We are excited to assist you! Contact us at <a href="contact.php" style="color: #007bff;"><strong>invisible@gmail.com</strong></a>.</p>
                
				</div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/brands-slider.php');?>
<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
