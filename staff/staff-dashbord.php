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

?>
   <?php include('includes/topheader.php'); ?>
   <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
   <!-- ========== Left Sidebar Start ========== -->
   <?php include('includes/leftsidebar.php'); ?>
   <!-- Left Sidebar End -->
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
                     <h4 class="page-title">Staff Dashboard</h4>
                     <ol class="breadcrumb p-0 m-0">
                     <?php 
                        $user =mysqli_query($con, "SELECT AdminUserName FROM tbladmin WHERE id=$id ");
                        $rows =mysqli_fetch_array($user)
                    ?>
                     <li ><?php echo htmlentities($rows['AdminUserName']);?></li>

                    <li class="active p-4">dashboard</li>
                     </ol>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="row">
            <a href="absent-today.php">
                  <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="card-box widget-box-one text-center">
                     <i class="bi bi-list-nested mdi  widget-one-icon"></i>
                        <!-- <i class="mdi mdi-chart-areaspline widget-one-icon"></i> -->
                        <div class="wigdet-one-content">
                           <p class="m-0 text-secondary" title="Statistics">TODAY</p>
                           <?php
                            $sql_sm=mysqli_query($con, "SELECT * FROM sendmail1 WHERE status ='YES' and datestart<='$laosDateT' and dateEnd >='$laosDateT'");
                            $rowcount_sm=mysqli_num_rows($sql_sm);
                           ?>
                           <h2><?php echo htmlentities($rowcount_sm); ?> <small></small></h2>
                        </div>
                     </div>
                  </div>
               </a>

               <a href="list-contact.php">
                  <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="card-box widget-box-one text-center">
                        <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                        <div class="wigdet-one-content">
                           <p class="m-0 text-secondary" title="Statistics">history Contact</p>
                           <?php $query = mysqli_query($con, "select * from sendmail1 where staff_id=$id");
                           $countcat = mysqli_num_rows($query);
                           ?>
                           <h2><?php echo htmlentities($countcat); ?> <small></small></h2>
                        </div>
                     </div>
                  </div>
               </a>
               <!-- end col -->
               <a href="pending.php">
                  <div class="col-lg-2 col-md-2 col-sm-6">
                     <div class="card-box widget-box-one text-center">
                        <i class="mdi mdi-layers widget-one-icon"></i>
                        <div class="wigdet-one-content">
                           <p class="m-0 text-secondary" title="User This Month">Pending</p>
                           <?php $query = mysqli_query($con, "SELECT * from sendmail1 where staff_id=$id and status=''");
                           $countposts = mysqli_num_rows($query);
                           ?>
                           <h2><?php echo htmlentities($countposts); ?> <small></small></h2>
                        </div>
                     </div>
                  </div>
               </a>

               <?php $query = mysqli_query($con, "SELECT * from sendmail1 where status='NO'");
                           $countsubcat = mysqli_num_rows($query);
                           ?>

               <a href="new-contact.php">
                  <div class="col-lg-4 col-md-4 col-sm-6">
                     <div class="card-box  widget-box-one text-center">
                     <i class="bi mdi bi-plus-circle widget-one-icon"></i>
                        <div class="wigdet-one-content">
                           <p class="m-0 text-secondary" title="User This Month">ADD</p>
                           
                           <!-- <h2><?php echo htmlentities($countsubcat); ?> <small></small></h2> -->
                        </div>
                     </div>
                  </div>
                  <!-- end col -->
               </a>

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
                                 <th>Date time</th>
                                 <th>Status</th>
                                 <th>Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 $query=mysqli_query($con,"SELECT * FROM sendmail1 WHERE staff_id=$id order by -id");
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
                                    <td class="col-lg-8"><?php echo substr($row['message'],0,80);?>...</td>
                                    <td><?php echo htmlentities($row['time'])?></td>
                                    <td class="bg-primary text-center"><?php echo htmlentities($row['status'])?></td>
                                    <td><a href="view-contact.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 
                                    <?php }?>
                                    
                                 </td>
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
      <?php include('includes/footer.php'); ?>

   </div>
   <!-- ============================================================== -->
   <!-- End Right content here -->
   <!-- ============================================================== -->
   <!-- Right Sidebar -->
   <div class="side-bar right-bar">
      <a href="javascript:void(0);" class="right-bar-toggle">
         <i class="mdi mdi-close-circle-outline"></i>
      </a>
      <h4 class="">Settings</h4>
      <div class="setting-list nicescroll">
         <div class="row m-t-20">
            <div class="col-xs-8">
               <h5 class="m-0">Notifications</h5>x
               <p class="text-muted m-b-0"><small>Do you need them?</small></p>
            </div>
            <div class="col-xs-4 text-right">
               <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
         </div>
         <div class="row m-t-20">
            <div class="col-xs-8">
               <h5 class="m-0">API Access</h5>
               <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
            </div>
            <div class="col-xs-4 text-right">
               <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
         </div>
         <div class="row m-t-20">
            <div class="col-xs-8">
               <h5 class="m-0">Auto Updates</h5>
               <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
            </div>
            <div class="col-xs-4 text-right">
               <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
         </div>
         <div class="row m-t-20">
            <div class="col-xs-8">
               <h5 class="m-0">Online Status</h5>
               <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
            </div>
            <div class="col-xs-4 text-right">
               <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small" />
            </div>
         </div>
      </div>
   </div>
   <!-- /Right-bar -->
   </div>
   <!-- END wrapper -->

<?php } ?>