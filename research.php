<?php $page = 'research';
include('head_foot/top.php') ?>

<head>
    <link rel="stylesheet" href="assets/css/research.css">
</head>
<div class="research_banner">
    <div class="research_banner_container header-text">
        <h1><?php echo $lang['research'] ?></h1>
        <p><?php echo $lang['institute'] ?></p>
    </div>
    <div class="research_container">
        <div class="research_item"><img src="./assets/images/3150359.svg" alt=""></div>
        <div class="research_item_box">
            <div class="research_item_txt">
                <img src="./assets/images/service-icon-02.png" alt="">
                <div class="con_icon_txt">
                    <p><?php echo $lang['research_dsc1'] ?></p>
                </div>
            </div>
            <div class="research_item_txt">
                <img src="./assets/images/service-icon-01.png" alt="">

                <div class="con_icon_txt">
                    <p><?php echo $lang['research_dsc2'] ?></p>
                </div>
            </div>
            <div class="research_item_txt">
                <img src="./assets/images/service-icon-04.png" alt="">

                <div class="con_icon_txt">
                    <p><?php echo $lang['research_dsc3'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section_calendar">
    <div class="calendar_container">
        <div class="con_icon_txt2">
            <h3><?php echo $lang['research_pj'] ?></h3>
            <p><?php echo $lang['research_pj_dsc'] ?></p>
            <div class="icon_bg3">
                <a href="blog.html"><?php echo $lang['research_btn_m'] ?></a>
            </div>
        </div>
        <div class="con_icon_img"><img src="./assets/images/Programmer.gif" alt=""></div>
    </div>
</div>

<div class="section_calendar2">
    <div class="calendar_container2">
        <div class="con_icon_img2"><img src="./assets/images/Programming.gif" alt=""></div>
        <div class="con_icon_txt2">
            <h4><?php echo $lang['research_pj2'] ?></h4>
            <p>
                <?php echo $lang['research_pj2_dsc'] ?>
            </p>

        </div>
    </div>
</div>
<?php include('head_foot/footer.php') ?>