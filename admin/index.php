<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
    $num = mysqli_fetch_array($ret);
    if ($num > 0) {
        $_SESSION['alogin'] = $_POST['username'];
        $_SESSION['id'] = $num['id'];
        header("location:manage-users.php");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        header("location:index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Open Sans, sans-serif;
            background-color: #f0f0f0;
        }
        .module-login {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .module-head {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #333;
        }
        .module-body {
            padding: 20px;
        }
        .control-group {
            margin-bottom: 20px;
        }
        .controls {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
        button[type="submit"] {
            background-color: #337ab7;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>

    <div class="container" style="width: 100%; margin: 0 auto; padding: 20px;">
        <div class="row" style="margin: 0 auto;">
            <div class="module module-login span4 offset4" style="margin: 50px auto; width: 300px;">
                <form class="form-vertical" method="post">
                    <div class="module-head">
                        <h2 align="center" style="color: #fff;">SIGN IN</h2>
                    </div>
                    <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <label class="" align="center"><h4>Username:</h4></label>
                                <input class="span12" type="text" id="inputEmail" name="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <label class="" align="center"><h4>Password:</h4></label>
                                <input class="span12" type="password" id="inputPassword" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <button type="submit" name="submit">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
