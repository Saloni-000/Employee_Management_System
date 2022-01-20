<?php session_start();
require_once('../db/dbconnection.php');

//Code for Registration
if(isset($_POST['signup']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $id=$_POST['Employeeid'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $doj=$_POST['doj'];
    $enc_password=$password;
    $sql=mysqli_query($con,"select id from users where email='$email'");
    $row=mysqli_num_rows($sql);
    if($row>0)
    {
        echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
    } else{
        echo "Hello";
        $msg=mysqli_query($con,"insert into users(id,fname,lname,email,department,password,contactno,joining_date) values('$id','$fname','$lname','$email','$department','$enc_password','$contact','$doj')");

        if($msg)
        {
            echo "<script>alert('Register successfully');</script>";
        }
    }
}

// Code for login
if(isset($_POST['login']))
{
    $password=$_POST['password'];
    $dec_password=$password;
    $useremail=$_POST['uemail'];
    $ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $extra="welcome.php";
        $_SESSION['login']=$_POST['uemail'];
        $_SESSION['id']=$num['id'];
        $_SESSION['name']=$num['fname'];
        $_SESSION['lname']=$num['lname'];
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid username or password');</script>";
        $extra="index.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
        exit();
    }
}

//Code for Forgot Password

if(isset($_POST['send']))
{
    $femail=$_POST['femail'];

    $row1=mysqli_query($con,"select email,password from users where email='$femail'");
    $row2=mysqli_fetch_array($row1);
    if($row2>0)
    {
        $email = $row2['email'];
        $subject = "Information about your password";
        $password=$row2['password'];
        $message = "Your password is ".$password;
        mail($email, $subject, $message, "From: $email");
        echo  "<script>alert('Your Password has been sent Successfully');</script>";
    }
    else
    {
        echo "<script>alert('Email not register with us');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/user.css">
    <title>Employee_Management_System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

</head>
<body class="bg-white">
<div class="container">
    <!-- Login Form Start -->
    <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Sign in </h1>
                    <hr class="my-3" />
                    <form action="#" method="post" class="px-3" id="login-form">
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="email" id="email" name="uemail" class="form-control rounded-0" placeholder="E-Mail" required />
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
                    <p class="text-center font-weight-bolder text-light lead">New User?</p>
                    <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4  myLinkBtn" id="register-link">Sign Up</button>
                    <form action="../admin/admin.php">
                    <button class="btn btn-outline-light btn-lg  font-weight-bolder mt-4 ml-6 myLinkBtn " type="submit">Admin</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->
    <!-- Registration Form Start -->
    <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Welcome!</h1>
                    <hr class="my-4 bg-light myHr" />
                    <p class="text-center font-weight-bolder text-light lead">Existing User?</p>
                    <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
                </div>
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Register</h1>
                    <hr class="my-3" />
                    <form action="" enctype="multipart/form-data" method="post" class="px-3" id="register-form">

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                            </div>
                            <input type="text" id="fname" name="fname" class="form-control rounded-0" placeholder="First  Name" required />
                        </div>
                            <div class="input-group input-group-lg form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                                </div>
                                <input type="text" id="lname" name="lname" class="form-control rounded-0" placeholder="Last Name" required />
                            </div>
                            <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="email" id="remail" name="email" class="form-control rounded-0" placeholder="E-mail" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                            </div>
                            <input type="number" id="contact" name="contact" class="form-control rounded-0" maxlength="10" placeholder="Phone Number" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-sitemap fa-lg fa-fw"></i></span>
                            </div>
                            <input type="text" id="department" name="department" class="form-control rounded-0" placeholder="Department" required />
                        </div>

                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                            </div>
                            <input type="Employeeid" id="Employeeid" name="Employeeid" class="form-control rounded-0" maxlength="5" placeholder="Employee_id" required />
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-clock fa-lg fa-fw"></i></span>
                            </div>
                            <input type="date" id="doj" name="doj" class="form-control rounded-0" placeholder="D.O.J" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
                        </div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                            </div>
                            <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
                        </div>
                        <div class="form-group">
                            <div id="passError" class="text-danger font-weight-bolder"></div>
                        </div>
                        <div class="form-group">
<!--                                <input type="reset" value="Reset">-->
<!--                                <input type="submit" name="signup"  value="Sign Up" >-->
<!--                                <div class="clear"> </div>-->
                            <input type="submit" id="register-btn" name="signup" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" />
                            <div class="clear"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Form End -->
    <!-- Forgot Password Form Start -->
    <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
            <div class="row">
                <div class="col-lg-7 bg-white p-4">
                    <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
                    <hr class="my-3" />
                    <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
                    <form action="#" method="post" class="px-3" id="forgot-form">
                        <div id="forgotAlert"></div>
                        <div class="input-group input-group-lg form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                            </div>
                            <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
                    <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
                    <hr class="my-4 bg-light myHr" />
                    <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Forgot Password Form End -->
</div>
<!-- jQuery CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/user.js"></script>
</body>
</html>