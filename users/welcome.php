<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="../css/welcome.css">
</head>

<body>
<div class="main-content">
    <!-- Header -->
    <div class="
     pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../images/welcome_bg.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8" ></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="display-2 text-white mt-0 mb-5">Hello  <?php echo $_SESSION['name'] ?></h1>
                    <p class="text-white mt-0 mb-5">Welcome!!!!!!This is your profile page. All your task details , profile information , messages, will be available here.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

            <div class="col-lg-1 ">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-md-10">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="row">
                                    <div class="card card-profile shadow">
                                        <div class="row justify-content-center">
                                                <div class="card-profile-image">
                                                    <a href="#">
                                                        <img src="../images/avatar.jpg" >
                                                    </a>
                                                </div>
                                        </div>

                                    </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group focused">
                                            <h4>Username: <?php echo $_SESSION['name']?></h4>
                                            <br><h4>Email address:  <?php echo $_SESSION['login']?></h4>
                                            <br><h4>Name: <?php echo $_SESSION['name']?> <?php echo $_SESSION['lname']?> </h4>
                                        </div>
                                        <div class="text-right col-lg-" >
                                            <form action="index.php">
                                                <button class="btn" id="logout-link" type="submit">Logout</button>
                                                <!--                                        <button>Logout</button>-->
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
