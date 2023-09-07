<?php 
$page = 'educations';
include('head_foot/top.php') ?>
<head>
    <link rel="stylesheet" href="assets/css/educations.css">
</head>
    <!-- ***** Educations ***** -->
    <div class="pricing-tables ">
        <div class="tables-right-dec">
            <img src="assets/images/tables-right-dec.png" alt="">
        </div>
        <div class="cation_txt header-text">
            <h1><?php echo $lang['education'] ?></h1>
        </div>
        <div class="education_container">
            <div class="education_item">
                <img src="./assets/images/img-1.png" alt="">
            </div>
            <div class="education_item_box">
                <p><span class="span_tap"><?php echo $lang['education_dsc'] ?></p>
                <div class="research_item_box2">
                    <div class="research_item_txt2">
                        <img src="./assets/images/2[Converted].png" alt="">
                        <div class="con_icon_txt">
                            <p>Font: HTML, CSS JavaScript, React </p>
                        </div>
                    </div>
                    <div class="research_item_txt2">
                        <img src="./assets/images/3[Converted].png" alt="">

                        <div class="con_icon_txt">
                            <p>Back end: Python, java, php, Django</p>
                        </div>
                    </div>
                    <div class="research_item_txt2">
                        <img src="./assets/images/1[Converted].png" alt="">

                        <div class="con_icon_txt">
                            <p>DATA: Mysql, MongoDB...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-heading ">
        <div class="">
            <div class="txtt1">
                <h2><?php echo $lang['w_coding'] ?></h2>
                <p><?php echo $lang['w_coding_dsc'] ?></p>
            </div>

            <div class="cation_conten txtt2">
                <div class="cation_Item">
                    <div class="cation_sum_txt">
                        <p> <b>1. </b><?php echo $lang['w_coding_dsc1'] ?></p>
                    </div>
                    <img src="assets/images/20.jpeg" alt="">
                </div>
                <div class="cation_Item">
                    <img src="assets/images/education_img2 (1).jpeg" alt="">
                    <div class="cation_sum_txt">
                        <p> <b>2. </b><?php echo $lang['w_coding_dsc2'] ?></p>
                    </div>
                </div>
                <div class="cation_Item">
                    <img src="assets/images/13.jpeg" alt="">
                </div>
                <div class="cation_Item">
                    <img src="assets/images/education_img2 (3).jpeg" alt="">
                    <div class="cation_sum_txt">

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('head_foot/footer.php') ?>
