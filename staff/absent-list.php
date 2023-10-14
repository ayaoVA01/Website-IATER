
<?php 
 session_start();
 include('includes/config.php');
 error_reporting(0);
 if (strlen($_SESSION['user_login']) == 0) {
    header('location:../admin/index.php');
 } else {
   $id = $_SESSION['u_id'];

   ?>
<?php include('includes/topheader.php'); ?>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php'); ?>
<!-- Left Sidebar End -->
<div class="content-page">
    <div class="content ">
        <div class="row">
            <div class="container">
                <div class="col-xs-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Today</h4>
                        <ol class="breadcrumb p-0 m-0">
                        <li>
                           <a href="#">dashboard</a>
                        </li>
                        <li>
                           <a href="absent-today.php">today</a>
                        </li>
                        <li class="active">
                           Absent-list
                        </li>
                     </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Start content -->
            <div class="container">
                <!-- Start content -->
                <div class="card-box ">

                    <table border="1"  class="table table-bordered">
                        <thead align="center">
                            <tr>
                                <td scope="col"><b>No</b></td>
                                <td scope="col"><b>Reason</b></td>
                                <td scope="col"><b>Date</b></td>
                                <td scope="col"><b>Action</b> </td>
                            </tr>
                        
                        </thead>

                        <?php
                         $sql_sm=mysqli_query($con, "SELECT * FROM sendmail1 WHERE staff_id='$id' and status='YES' ");
                         $rowcount_sm=mysqli_num_rows($sql_sm);
                        
                        ?>
                        <tbody class="table-group-divider">

                            <?php 
                            $o=1;
                             while($sql_fatch=mysqli_fetch_array($sql_sm)){;

                            ?>

                            <tr>
                            <td><?php echo $o; ?></td>

                                <td><?php echo $sql_fatch['reason']?></td>

                                <?php if($sql_fatch['dateStart']==$sql_fatch['dateEnd']) {?>
                                    <td class="text-center"><?php echo $sql_fatch['dateStart']?> <b>In:</b> <?php echo $sql_fatch['section']?> </td>
                                    <?php }else{?>
                                    <td class="text-center"><?php echo $sql_fatch['dateStart'] ." <b>to</b> " . $sql_fatch['dateEnd'];?></td>
                                <?php }?>

                                <td align="center"><a  href="?action=<?php echo $sql_fatch['id']; ?>"><i class="fa-regular fa-eye"></i></a></td>
                            </tr>

                            <?php $o++; }?>
                        </tbody>

                    </table>

                     <?php 
                     $ac=$_GET['action'];
                     $rson=mysqli_query($con, "SELECT * FROM sendmail1 WHERE staff_id='$id' and id='$ac' and status='YES' ");
                     $rson_fetch=mysqli_fetch_array($rson);

                     ?>

                        <div class="container">
                            <div id="contectd" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top contact"style="height: 40%; width:50%; border-radius: 5px;"; >
                                    
                                    <div class="w3-container" style="margin-top: 50px;">
                                    
                                            <div class="card text-center p-2 ">

                                                <div class="card-body">
                                                    <h4><?php echo $rson_fetch['reason']?></h4>
                                                    <?php if($rson_fetch['dateStart']==$rson_fetch['dateEnd']) {?>

                                                    <p class="card-title">Date: <b><?php echo $rson_fetch['dateStart']?></b> In: <b><?php echo $rson_fetch['section']?></b> </p>
                                                    <?php }else{?>
                                                    <p class="card-title">Date:  <b> <?php echo $rson_fetch['dateStart']?> </b>to <b><?php echo $rson_fetch['dateEnd']?> </b></p>
                                                    <?php }?>
                                                    <p class="card-text"><?php echo $rson_fetch['message']?></p>

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
 <!-- container -->
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- content -->
<?php include('includes/footer.php'); ?>

<?php }?>