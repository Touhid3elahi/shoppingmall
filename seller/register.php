<?php
session_start();
error_reporting(0);
include('includes/config.php');
// Code user Registration
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $gender= $_POST['gender'];
    $division= $_POST['division'];
    $password=md5($_POST['password']);
    $check = mysqli_query($con, "select `email` from seller where email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already registered!');</script>";
    } else {
        $query=mysqli_query($con,"insert into seller(name,email,birth,gender,division,password)
            values('$name','$email','$birth','$gender','$division','$password')");
        if($query)
        {
            echo "<script>alert('Registration Successfull. Please Login');</script>";
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'login.php';
            header("Location: http://$host$uri/$extra");
            exit;
        }
        else{
            echo "<script>alert('Something went worng');</script>";
        }
    }
    
}
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register Forms For Seller</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select1/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/daterangepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/style.css" rel="stylesheet" media="all">
</head>

<body>
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Registration Info-Seller</h2>
                <form method="POST" action="register.php">
                    <div class="input-group">
                        <input class="input--style-1" required="required" type="text" placeholder="NAME" name="name">
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1 js-datepicker" type="text" placeholder="BIRTHDATE" required="required" name="birth">
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <div class="rs-select2 js-select-simple select--no-search">
                                    <select name="gender" required="required">
                                        <option disabled="disabled" selected="selected">GENDER</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                    <div class="select-dropdown"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="rs-select2 js-select-simple select--no-search">
                            <select name="division" required="required">
                                <option disabled="disabled" selected="selected">Division</option>
                                <option>Dhaka</option>
                                <option>Chittagong</option>
                                <option>Khulna</option>
                            </select>
                            <div class="select-dropdown"></div>
                        </div>
                    </div>
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" type="email" placeholder="Email" name="email" required="required">
                                <?php if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                 $emailErr = "Invalid email format";
                               }?>
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-1" required="required" type="password" placeholder="password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select1/select2.min.js"></script>
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
