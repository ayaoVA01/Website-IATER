
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
                                <td scope="col"><b>Name</b></td>
                                <td scope="col"><b>Hous</b></td>
                                <td scope="col"><b>Days</b></td>
                                <td scope="col"><b>Action</b> </td>
                            </tr>
                        
                        </thead>

                        <?php
                         $sql_sm=mysqli_query($con, "SELECT * FROM tbladmin WHERE userType='2' ");
                         $rowcount_sm=mysqli_num_rows($sql_sm);
                        
                        ?>
                        <tbody class="table-group-divider">

                            <?php 
                            $o=1;
                             while($sql_fatch=mysqli_fetch_array($sql_sm)){;

                            ?>

                            <tr>
                            <td><?php echo $o; ?></td>

                                <td><?php echo $sql_fatch['AdminUserName']?></td>
                                <td><?php echo "Hour"?></td>
                                    <?php 

                                        $determine= $sql_fatch['determine'];

                                        for ($i = 1, $j = $determine; $j <= 15; $i++, $j++) {
                                            
                                          }
                                    ?>

                                    <td class="text-center"><?php echo $i?></td>

                                <td align="center"><a  href="absent-admin-detail.php?u_abs=<?php echo $sql_fatch['id']; ?>"><i class="fa-regular fa-eye"></i></a></td>
                            </tr>

                            <?php $o++; }?>
                        </tbody>

                    </table>
                    <?php
                        for ($i=1, $j = 8.5; $j <= 15; $i++, $j++) {
                            echo "Index: " . $i . ", Value: " . $j . "<br>";
                        }
                        ?>
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