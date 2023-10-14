
<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['user_login']) == 0) {
   header('location:../admin/index.php');
} else {

   $id = $_SESSION['u_id'];
//time laos
   date_default_timezone_set('Asia/Vientiane');
   $laosDateTime = new DateTime();
   $laosDateT = $laosDateTime->format('Y-m-d');
   $month= $laosDateTime->format('m');
 
  
   ?>
<?php include('includes/topheader.php'); ?>
<!-- Top Bar End -->
<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php'); ?>
<!-- Left Sidebar End -->

<div class="content-page">
    <!-- Start content -->
    <div class="content ">
    <div class="row">
        <div class="container">
                <div class="col-xs-12">
                   <div class="page-title-box">
                      <h4 class="page-title">Today</h4>
                      <ol class="breadcrumb p-0 m-0">
                      <li>
                           <a href="staff-dashbord.php">dashboard</a>
                        </li>
                        <li>
                           <a href="absent-list.php">absent-list</a>
                        </li>
                        <li class="active">
                           Today
                        </li>
                      </ol>
                      <div class="clearfix"></div>
                   </div>
                </div>
             </div>
                <div class="container">
                    <!-- Start content -->
                    <div class="card-box container">

                        <table border="1"  class="table table-bordered">
                            <thead align="center">
                                <tr>
                                    <td scope="col"><b>No</b></td>
                                    <td scope="col"><b>Name</b></td>
                                    <td scope="col"><b>Morning</b> <br><span style="font-size: 10px;">8:00-11:30</span> </td>
                                    <td scope="col"><b>Afternoon</b> <br><span style="font-size: 10px;">1:30-7:30</span></td>
                                </tr>
                           
                            </thead>
                            <tbody class="table-group-divider">
                                
                                
                                <?php
                                    
                                    $start_date = new DateTime('11-10-2023'); // set start date
                                    $end_date = new DateTime('20-10-2023'); // set end date

                                    $sql_sm=mysqli_query($con, "SELECT * FROM sendmail1 WHERE status='YES' and datestart<='$laosDateT' and dateEnd >='$laosDateT'");
                                    $rowcount_sm=mysqli_num_rows($sql_sm);

                                    if($rowcount_sm==0)
                                       {
                                       ?>

                                    <tr>
                                       <td colspan="4" align="center">
                                          <h3 style="color:red">No record found</h3>
                                       </td>
                                    <tr>

                                    <?php } else {
                                         $c=1;
                                          while($row_sm=mysqli_fetch_array($sql_sm))
                                          {
                                            
                                          ?>
                                    
                                            <tr>
                                            
                                                    <?php 
                                                        $uid= $row_sm['staff_id'];
                                                        $query=mysqli_query($con,"SELECT * FROM tbladmin WHERE id='$uid'");
                                                        $row=mysqli_fetch_array($query);
                                                        $start=$row_sm['dateStart'];
                                                        $end=$row_sm['dateEnd'];
                                                    ?>
                                                        <?php if($start==$end){ ?>
                                                            <td align="center" scope="row"><?php echo $c ;?></td>
                                                            <td> <?php echo ($row['AdminUserName'])?></td>
                                                            <?php if ($row_sm['section']=="AFTERNOON"){ ?>
                                                                <td></td>
                                                            <?php }else{?>
                                                                <td class="text-center" ><a href="?reas=<?php echo $row_sm['staff_id']; ?>" style="display:block; height:100%; width:100%; background-color:#ccc;">views</a></td>
                                                                
                                                            <?php }?>

                                                            <?php if ($row_sm['section']=="MORNING"){ ?>
                                                                <td></td>
                                                            <?php }else{?>
                                                                <td class="text-center" ><a href="?reas=<?php echo $row_sm['staff_id']; ?>" style="display:block; height:100%; width:100%; background-color:#ccc;">views</a></td>
                                                                
                                                            <?php }?>
                                                        <?php }?>

                                                        <?php if ($laosDateT>=$row_sm['dateStart'] && $laosDateT < $row_sm['dateEnd']){ ?>
                                                            <td align="center" scope="row"><?php echo $c ;?></td>
                                                            <td> <?php echo ($row['AdminUserName'])?></td>

                                                            <td class="text-center" ><a href="?reas=<?php echo $row_sm['staff_id']; ?>" style="display:block; height:100%; width:100%; background-color:#ADD8E6;">views</a></td>
                                                            <td class="text-center" ><a href="?reas=<?php echo $row_sm['staff_id']; ?>" style="display:block; height:100%; width:100%; background-color:#ADD8E6;">views</a></td>
                                                              
                                                            
                                                            <?php }else{?>
                                                            
                                                        <?php }?>
                                                      

                                            </tr> 
                                            
                                            
                                        <?php $c++;}?>

                                    <?php } ?>
                              
                                
                            </tbody>
                        </table>
                        <?php 
                        
                            $rs=$_GET['reas'];
                            $rson=mysqli_query($con, "SELECT * FROM sendmail1 WHERE staff_id='$rs' and dateEnd >='$laosDateT'");
                            $rson_fetch=mysqli_fetch_array($rson);

                        
                            ?>
                        
                            <div class="container">
                                <div id="contectd" class="w3-modal">
                                    <div class="w3-modal-content w3-animate-top contact"style="height: 40%; width:50%; border-radius: 5px;"; >
                                     
                                        <div class="w3-container " style="margin-top: 50px;">
                                        
                                                <div class="card text-center p-2 ">
                                                    <?php
                                                    // $rs2=$_GET['reas'];
                                                    $query2=mysqli_query($con,"SELECT * FROM tbladmin WHERE id='$rs' and userType=2");
                                                    $row2=mysqli_fetch_array($query2);
                                                    ?>
                                                    <div class="card-header">
                                                        <h3><?php echo $row2['AdminUserName'] ?> </h3>
                                                        <!-- <h3><?php echo $laosDateT?> </h3> -->
                                                        
                                                    </div>
                                                    <div class="card-body">
 
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
                                    
                                    
                                    <!-- container -->
                                </div>
                            </div>
                            <!-- container -->

            
    </div>
    <!-- content -->
    <?php include('includes/footer.php'); ?>
    <?php } ?>