<?php $page = 'index';
include('head_foot/top.php') ?>

<body>
    <div class="header-text"></div>
    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="row">
                        <div class="owl-carousel owl-banner">
                            <div class="item header-text">
                                <h2><?php echo $lang['welcome_to'] ?><em> i</em>ATER</h2>
                                <p>
                                    <?php echo $lang['institute'] ?>
                                </p>
                                <div class="down_buttons">
                                    <div class="box_link">
                                        <a href="#" class="icon_phon">
                                            <div><i class="fa fa-phone"></i></div>
                                            <div>+856 20 56 557 800</div>
                                        </a>
                                    </div>
                                    <div class="box_link">
                                        <a class="icon__img" href="https://www.facebook.com/profile.php?id=100076123785189" target="_blank">
                                            <img style="width: 30%;" src="assets/images/Facebook_Logo2.png" alt="">
                                            <p>Facebook</p>
                                        </a>
                                        <a class="icon__img" href="https://goo.gl/maps/FmUCMdGno7QQr3BL8" target="_blank">
                                            <img style="width: 27%;" src="assets/images/google_mep_logo.png" alt="">
                                            <p><?php echo $lang['address'] ?></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="c_l_of_ftext2">
        </div>
    </div>

    <div class="our-portfolio section">
        <div class="portfolio-left-dec">
            <img src="assets/images/portfolio-left-dec.png" alt="">
        </div>
        <div class="section-heading">
            <h2><?php echo $lang['case_studies'] ?></h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-portfolio">
                        <div class="item">
                            <div class="thumb">
                                <img src="assets/images/iater_ativit (4).jpeg" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4><?php echo $lang['problem_solving'] ?></h4>
                                        </a>
                                        <span><?php echo $lang['problem_solving_dsc'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <img src="assets/images/5.jpeg" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4><?php echo $lang['study'] ?></h4>
                                        </a>
                                        <span><?php echo $lang['study_dsc'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="thumb">
                                <img src="assets/images/6.jpeg" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4><?php echo $lang['creativity'] ?></h4>
                                        </a>
                                        <span><?php echo $lang['creativity_dsc'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="thumb">
                                <img src="assets/images/7.jpeg" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4><?php echo $lang['Workshop'] ?></h4>
                                        </a>
                                        <span><?php echo $lang['Workshop_dsc'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="thumb">
                                <img src="assets/images/8.jpeg" alt="">
                                <div class="hover-effect">
                                    <div class="inner-content">
                                        <a href="#">
                                            <h4><?php echo $lang['project'] ?></h4>
                                        </a>
                                        <span><?php echo $lang['project_dsc'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="subscribe">
        <div class="container">
            <div class="inner-content">
                <div class="col-lg-10 offset-lg-1 c_l_of_ftext">
                    <h2><?php echo $lang['institute'] ?></h2>
                    <p><?php echo $lang['institute2'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php include('head_foot/footer.php') ?>
    
</body>