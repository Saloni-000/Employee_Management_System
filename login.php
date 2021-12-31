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
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<?php
$loginid=$pass="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["loginid"])) {
        echo "id is empty\n";
        header("Refresh:2");

    } else {
        $loginid = $_POST["loginid"];

        $_SESSION['employee_id']=$loginid;
    }
    if (empty($_POST["pass"])) {
        echo "pass is empty\n";
        header("Refresh:2");

    } else {
        $password = $_POST["pass"];
    }

}
?>

<div class="heading">
    <h1>Login </h1>
</div>
<div class="box">
    <form action="<?php ($_SERVER["PHP_SELF"]);?>" method="post">
<!--    <form action="display.php" method="post">-->
    <input type="number" name="loginid" placeholder="Employee_Id"><br><br>
    <input type="password" name="pass" placeholder="Password"><br><br>


    <input type="submit" value="Submit"><br><br>
        <button value ="submit" onclick="location.href='display.php'" type="button" class="btn">
            Display</button>

<!--        <button type="submit" value="submit">submit</button>-->
    </form>

</div>

</body>
</html>