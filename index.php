<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>

</head>
<body>
<?php
//variable declaration
$fname=$lname=$email=$password=$id=$mobile=$designation=$department=$date=$passwordmd5="";
//assigning value from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["code"])) {  //checking if value is empty
        echo "code is empty\n";
        header("Refresh:2");

    } else {

        $id = $_POST["code"];
    }
    if (empty($_POST["fname"])) {
        echo "fname is empty\n";
        header("Refresh:2");

    } else {
        $fname = $_POST["fname"];
    }
    if (empty($_POST["lname"])) {
        echo "lname is empty\n";
        header("Refresh:2");

    } else {
        $lname = $_POST["lname"];
    }
    if (empty($_POST["email"])) {
        echo "email is empty\n";
        header("Refresh:2");

    } else {
        $email = $_POST["email"];
    }
    if (empty($_POST["password"])) {
        echo "password is empty\n";
        header("Refresh:2");

    } else {
        $password = $_POST["password"];
        $passwordmd5=md5($password);
    }
    if (empty($_POST["mobile"])) {
        echo "mobile is empty\n";
        header("Refresh:2");

    } else {
        $mobile = $_POST["mobile"];
    }
    if (empty($_POST["designation"])) {
        echo "designation is empty\n";
        header("Refresh:2");

    } else {
        $designation = $_POST["designation"];
    }
    if (empty($_POST["date"])) {
        echo "date is empty\n";
        header("Refresh:2");

    } else {
        $date = $_POST["date"];
    }
    if (empty($_POST["department"])) {
        echo "department is empty\n";
        header("Refresh:2");

    } else {
        $department = $_POST["department"];
    }

}
//connection
$conn = new mysqli('localhost', 'root', '','employee');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//creating db
//$sql = "CREATE DATABASE Employee";
//if (mysqli_query($conn, $sql)) {
//  echo "Database created successfully";
//} else {
//  echo "Error creating database: " . mysqli_error($conn);
//}

//creating table
//$sql = "CREATE TABLE Data (
//employee_id INT(5)  PRIMARY KEY,
//first_name VARCHAR(30) NOT NULL,
//last_name VARCHAR(30) NOT NULL,
//email VARCHAR(50) NOT NULL,
//mobile_no INT(10) NOT NULL,
//designation VARCHAR (30),
//department VARCHAR (30),
//joining_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//password VARCHAR(30) NOT NULL
//)";
//


//inserting value
$sql="INSERT INTO Data(employee_id,first_name,last_name,email,mobile_no,designation,department,joining_date,password)
VALUES('$id','$fname','$lname','$email',$mobile,'$designation','$department','$date','$passwordmd5')";
if ($conn->query($sql) === TRUE) {
    echo "Table Data inserted successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?>
<div class="heading">
    <h1>Registration </h1>
</div>
<div class="box">
    <form action="<?php ($_SERVER["PHP_SELF"]);?> " method="post">
        <input type="number" name="code" placeholder="5 digit Employee id"> <br><br>
        <input type="text" name="fname" placeholder="First name"><br><br>
        <input type="text" name="lname" placeholder="Last name"><br> <br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <input type="number" name="mobile" placeholder="Mobile Number"><br><br>
        <input type="text" name="designation" placeholder="Designation"><br><br>
        <input type="date" name="date"><br><br>
        <input type="radio" name="department" id ="department" value="Software" checked>Software <br><br>
        <input type="radio" name="department" id ="department" value="Hardware" >Hardware <br><br>
        <input type="submit" value="Submit" class="btn">

        <button onclick="location.href='login.php'" type="button" class="btn">
            Login</button>
    </form>
</div>

</body>
</html>