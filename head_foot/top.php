<?php
include "conchange.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao&display=swap" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/zzzz1234.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>iATER</title>
</head>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
                <img src="assets/images/logo2-removebg-preview.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
                <li class="scroll-to-section"><a href="index.php" class="scroll_section <?php if ($page == 'index') {echo 'active';} ?>"><?php echo $lang['home'] ?></a></li>
                                                                                            
                                                                                        
                <li class="nav-link dropdown-toggle don" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Introduce
                </li>
                <ul class="dropdown-menu ">
                    <li class="scroll-to-section d-btn">
                        <a href="introduce.php" class="scroll_section <?php if ($page == 'introduce') {echo 'active'; } ?>"><?php echo $lang['introduce'] ?></a>
                    
                                                                                                    
                       <a href="general.php" class="text-black"><li >General Status </li> </a>
                    </li>                                                                        
                    

                </ul>

                <li class="scroll-to-section"><a href="education.php" class="scroll_section <?php if ($page == 'educations') {
                                                                                                echo 'active';
                                                                                            } ?>"><?php echo $lang['education'] ?></a></li>
                <li class="scroll-to-section"><a href="research.php" class="scroll_section <?php if ($page == 'research') {
                                                                                                echo 'active';
                                                                                            } ?>"><?php echo $lang['research'] ?></a></li>
                <li class="scroll-to-section"><a href="blog.php" class="scroll_section <?php if ($page == 'blogs') {
                                                                                            echo 'active';
                                                                                        } ?>"><?php echo $lang['blog'] ?></a></li>
                <li class="scroll-to-section img_link"><img src="assets/images/download2.png" alt=""><a href="index.php?lang=en" class="scroll_section"><?php echo $lang['lang_en'] ?></li>
                <li class="scroll-to-section img_link"><a href="index.php?lang=lao" class="scroll_section"><?php echo $lang['lang_lao'] ?></a><img src="assets/images/download.png"></li>
                <li><a href="admin/dashboard.php">
                        <div class='icon_bg1'>
                            <p><?php echo $lang['login'] ?></p>
                        </div>
                    </a></li>
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
        </nav>
    </div>
</header>

<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
<!-- ***** Header Area End ***** -->