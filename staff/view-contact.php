<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['user_login'])==0)
     { 
   header('location:../admin/index.php');
   }
   else{
    $id = $_SESSION['u_id'];
    $u_id = $_GET['u_id'];
   if($_GET['action']='del')
   {
   $postid=intval($_GET['pid']);
   $query=mysqli_query($con,"update tblposts set Is_Active=0 where id='$postid'");
   if($query)
   {
   $msg="Post deleted ";
   }
   else{
   $error="Something went wrong . Please try again.";    
   } 
   }
   ?>
<!-- Top Bar Start -->
<?php include('includes/topheader.php');?>
<!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
<!-- Start content -->
<div class="content">
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
            <div class="page-title-box">
               <h4 class="page-title">View my Contact</h4>
               <ol class="breadcrumb p-0 m-0">
                  <li>
                     <a href="#">New Contact</a>
                  </li>
                  <li>
                     <a href="#">Contact List</a>
                  </li>
                  <li class="active">
                  View my Contact  
                  </li>
               </ol>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <!-- end row -->
      <div class="row">
         <div class="col-sm-12">
            <div class="card-box">
               <div class="table-responsive">
                  <table class="table table-bordered" id="example">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Reason</th>
                           <th>Start</th>
                           <th>End</th>
                           <th>Date time</th>
                           <th>Status</th>
                    
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query=mysqli_query($con,"SELECT * FROM sendmail1 WHERE id=$u_id");
                           $rowcount=mysqli_num_rows($query);
                           if($rowcount==0)
                           {
                           ?>
                        <tr>
                           <td colspan="4" align="center">
                              <h3 style="color:red">No record found</h3>
                           </td>
                        <tr>
                           <?php 
                              } else {
                              while($row=mysqli_fetch_array($query))
                              {
                              ?>
                        <tr>
                            <?php if($row['status']=='YES'){ ?>
                                <td class="col-lg-6"><?php echo htmlentities($row['message']);?></td>
                                <td><?php echo htmlentities($row['reason']);?></td>
                                <td><?php echo htmlentities($row['dateStart']);?></td>
                                <td><?php echo htmlentities($row['dateEnd']);?></td>
                                <td><?php echo htmlentities($row['time'])?></td>
                           <td class="bg-primary text-center"><?php echo htmlentities($row['status'])?></td>
                           <?php }?>


                           <?php if($row['status']=='NO'){ ?>
                              <td class="col-lg-6"><?php echo htmlentities($row['message']);?></td>
                                <td><?php echo htmlentities($row['reason']);?></td>
                                <td><?php echo htmlentities($row['dateStart']);?></td>
                                <td><?php echo htmlentities($row['dateEnd']);?></td>
                                <td><?php echo htmlentities($row['time'])?></td>
                           <td class=" bg-danger text-center"><?php echo htmlentities($row['status'])?></td>
                           <?php }?>

                           <?php if($row['status']==''){ ?>
                              <td class="col-lg-6"><?php echo htmlentities($row['message']);?></td>
                                <td><?php echo htmlentities($row['reason']);?></td>
                                <td><?php echo htmlentities($row['dateStart']);?></td>
                                <td><?php echo htmlentities($row['dateEnd']);?></td>
                                <td><?php echo htmlentities($row['time'])?></td>
                           <td class=" bg-warning text-center"><?php echo htmlentities($row['status'])?>pending...</td>
                           <?php }?>

                        </tr>
                        <?php } }?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- container -->
</div>
<!-- content -->
<?php include('includes/footer.php');?>
   
<?php } ?>