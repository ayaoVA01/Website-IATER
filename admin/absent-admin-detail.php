
<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['user_login'])==1)
   { 
   header('location:index.php');
   }
   else{
   $id = $_SESSION['u_id'];
   $id_abs=$_GET['u_abs'];

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
                         $sql_sm=mysqli_query($con, "SELECT * FROM sendmail1 WHERE staff_id='$id_abs' and status ='YES' ");
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

                                <td align="center"><a  href="absent-dt.php?action=<?php echo $sql_fatch['id'] ?>"><i class="fa-regular fa-eye"></i></a></td>
                            </tr>

                            <?php $o++; }?>
                        </tbody>

                    </table>

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