<?php
session_start();
error_reporting(0);
include("../db/dbconnection.php");
if(isset($_POST['login']))
{
    $adminusername=$_POST['username'];
    $pass=md5($_POST['password']);
    $ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="manage-users.php";
        $_SESSION['login']=$_POST['username'];
        $_SESSION['id']=$num['id'];
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    }
    else
    {
        $_SESSION['action1']="*Invalid username or password";
        $extra="index.php";
        echo "<script>window.location.href='".$extra."'</script>";
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/font-awesome.css" rel="stylesheet" />
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
    <link href="../css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
</head>



<body class="bg-white">
<div class="container">
                <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?>
                <div class="row justify-content-center wrapper" >
                    <div class="col-lg-10 my-auto myShadow">
                        <div class="row">
                            <div class="col-lg-7 bg-white p-4">
                                <h1 class="text-center font-weight-bold text-primary">Admin Sign In </h1>
                                <hr class="my-3" />
                                <form action="#" method="post" class="px-3" id="login-form">
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                                        </div>
                                        <input type="text" id="username" name="username" class="form-control rounded-0" placeholder="Username" required />
                                    </div>
                                    <div class="input-group input-group-lg form-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control rounded-0"  placeholder="Password" required autocomplete="off" />
                                    </div>
                                    <div class="form-group clearfix">
                                        <div class="custom-control custom-checkbox float-left">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="rem" />
                                            <label class="custom-control-label" for="customCheck">Remember me</label>
                                        </div>
                                        <div class="forgot float-right">
                                            <a href="#" id="forgot-link">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="login-btn" value="Sign In" name="login" class="btn btn-primary btn-lg btn-block myBtn" />
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                                <h1 class="text-center font-weight-bold text-light">Hello!</h1>
                                <hr class="my-3 bg-light myHr" />
                                <p class="text-center font-weight-bolder text-light lead">Admin</p>
                                <form action="../users/index.php">
                                    <button type="submit" class="btn  btn-outline-light btn-lg font-weight-bolder ml-9 myLinkBtn" >User?</button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
<script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
</script>


</body>
</html>
