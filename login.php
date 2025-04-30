<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Code for User login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
    $num = mysqli_fetch_array($query);
    
    if ($num > 0) {
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['name'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $log = mysqli_query($con, "INSERT INTO userlog(userEmail,userip) VALUES('" . $_SESSION['login'] . "','$uip')");
        
        // Redirect after successful login
        echo "<script>alert('You have logged in successfully!'); window.location.href='index.php';</script>";
        exit();
    } else {
        // Redirect to login page with error message
        $_SESSION['errmsg'] = "Invalid email or password.";
        header("location:login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/red.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="assets/js/jquery-1.11.1.min.js"></script>
</head>
<body class="cnt-home">

<header class="header-style-1">
    <?php include('includes/top-header.php'); ?>
    <?php include('includes/menu-bar.php'); ?>
</header>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="index.php" style="color: initial;" onclick="this.style.color='#FF5733'; this.style.fontWeight='bold';">HOME</a></li>
                <li class='active' style="color: #4169E1; font-weight: bold;">LOGIN</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div>

<div class="body-content outer-top-bd" style="background-color: #f8f9fa;">
    <div class="container" style="max-width: 600px; margin: auto;">
        <div class="sign-in-page inner-bottom-sm" style="background-color: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 30px;">
            <div class="row">
                <div class="col-md-12 sign-in">
                    <h4 style="margin-bottom: 20px; text-align: center;">Login</h4>
                    <form class="register-form outer-top-xs" method="post" onsubmit="return validateForm()" style="display: flex; flex-direction: column; align-items: center;">
                        <span style="color:red; margin-bottom: 10px;">
                            <?php
                            if (isset($_SESSION['errmsg']) && $_SESSION['errmsg']) {
                                echo htmlentities($_SESSION['errmsg']);
                                $_SESSION['errmsg'] = ""; // Clear the message after displaying
                            }
                            ?>
                        </span>
                        <div class="form-group" style="width: 100%; margin-bottom: 15px;">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input type="email" name="email" class="form-control unicase-form-control text-input" placeholder="user email" id="exampleInputEmail1" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px;">
                        </div>
                        <div class="form-group" style="width: 100%; margin-bottom: 15px;">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control unicase-form-control text-input" placeholder="password" id="exampleInputPassword1" required style="border: 1px solid #ccc; border-radius: 4px; padding: 10px;">
                        </div>
                        <button type="submit" id="net" class="btn-upper btn btn-info checkout-page-button" name="login" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;">Login</button>
                    </form>
                    <h5 style="margin-top: 20px; text-align: center;">Click to Create New Account <i class="fa fa-hand-o-right" aria-hidden="true">&nbsp;&nbsp;</i><b><a href="register.php" style="color: blue;">Register Here</a></b></h5>
                </div>
            </div>
        </div>
        <footer style="padding: 20px; text-align: center; background-color: #f1f1f1; border-radius: 0 0 8px 8px; margin-top: 20px;">
            <p style="margin: 0;">© Invisible Footwear. All Rights Reserved.</p>
        </footer>
    </div>
</div>

<?php include('includes/footer.php'); ?>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    function validateForm() {
        const email = document.querySelector('input[name="email"]').value;
        const password = document.querySelector('input[name="password"]').value;

        if (!email || !password) {
            alert('Both fields are required!');
            return false;
        }
        return true; // Allow form submission
    }
</script>
</body>
</html>
