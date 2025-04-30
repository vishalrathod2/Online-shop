<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Code for user Registration
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "INSERT INTO users(name,email,contactno,password) VALUES('$name','$email','$contactno','$password')");
    
    if ($query) {
        echo "<script>alert('You have successfully registered.'); window.location.href='login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Registration failed. Something went wrong.');</script>";
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
    <title>Register</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico">

    <script type="text/javascript">
    function valid() {
        if (document.register.password.value != document.register.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match!!");
            document.register.confirmpassword.focus();
            return false;
        }
        return true;
    }
    </script>
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
                <li><a href="index.php" style="color: initial;">HOME</a></li>
                <li class='active' style="color: #4169E1; font-weight: bold;">REGISTER</li>
            </ul>
        </div>
    </div>
</div>

<div class="body-content outer-top-bd" style="background-color: #f8f9fa; padding: 20px;">
    <div class="container" style="max-width: 600px; margin: auto;">
        <div class="row justify-content-center">
            <div class="col-md-12 create-new-account" style="background-color: #f8f8f8; padding: 20px; border-radius: 5px; box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
                <h4 class="checkout-subtitle" align="center" style="color: #333; margin-bottom: 15px;">Register</h4>
                <form class="register-form outer-top-xs" role="form" method="post" name="register" onSubmit="return valid();" style="display: flex; flex-direction: column;">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="info-title" for="fullname" style="color: #555;">Full Name <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="fullname" name="fullname" placeholder="Full Name" required="required" style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%;">
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="info-title" for="email" style="color: #555;">Email Address <span>*</span></label>
                        <input type="email" class="form-control unicase-form-control text-input" id="email" name="emailid" placeholder="Email" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%;">
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="info-title" for="contactno" style="color: #555;">Contact No. <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" id="contactno" name="contactno" placeholder="Contact No" maxlength="10" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%;">
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="info-title" for="password" style="color: #555;">Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" placeholder="Password" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%;">
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label class="info-title" for="confirmpassword" style="color: #555;">Confirm Password <span>*</span></label>
                        <input type="password" class="form-control unicase-form-control text-input" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px; width: 100%;">
                    </div>
                    <button type="submit" name="submit" class="btn-upper btn btn-success checkout-page-button" style="background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; width: 100%;">Register</button>
                    <h5 style="text-align: center; margin-top: 10px; color: #555;">Already have an account <i class="fa fa-hand-o-right" aria-hidden="true">&nbsp;&nbsp;</i><a href="login.php" style="color: blue;">Login Here</a></h5>
                </form>
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
