<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = md5($_POST['password']);
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword,userType FROM tbladmin WHERE (AdminUserName='$uname' && AdminPassword='$password')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {
        // $_SESSION['login'] = $_POST['username'];
        // $_SESSION['utype'] = $num['userType'];
        // echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        if($num['userType']==1){
            $_SESSION['login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        }else{
            $_SESSION['user_login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location = '../staff/staff-dashbord.php'; </script>";
        }
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="iATER">
    <!-- App title -->
    <title>iATER</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/pages123.css">
</head>


<body>
    <div class="form_reg">
        <div class="header">
            <p>Please Log-in to Admin</p>
            <a href="../index.php"><i class='bx bx-x'></i></a>
        </div>
        <form class="form" method="post">
            <div class="input-group">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" name="username" placeholder="Username or email" autocomplete="off">
                </div>
            </div>
            <div class="input-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="password" required="" placeholder="Password" autocomplete="off">
                </div>
            </div>
            <div class="input-group">
                <button class="btn btn_custom" type="submit" name="login">Log In</button>
            </div>
        </form>
    </div>
</body>

</html>