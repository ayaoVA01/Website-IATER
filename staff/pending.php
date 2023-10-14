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
               <h4 class="page-title">Pending list</h4>
               <ol class="breadcrumb p-0 m-0">
                  <li>
                     <a href="#">Admin</a>
                  </li>
                  <li>
                     <a href="#">New contact</a>
                  </li>
                  <li class="active">
                     pending list 
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
                           <th>Date time</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query=mysqli_query($con,"SELECT * FROM sendmail1 WHERE staff_id=$id");
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
                           
                              <?php if($row['status']==''){ ?>
                              <td class="col-lg-6"><?php echo substr($row['message'],0,80);?>...</td>
                              <td><?php echo htmlentities($row['time'])?></td>
                              <td class="bg-warning text-center"><?php echo htmlentities($row['status'])?>pending..</td>
                              <td ><a href="view-contact.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 

                              <?php }?>
                              <!-- &nbsp;<a class="btn btn-danger btn-sm" href="manage-posts.php?pid=<?php echo htmlentities($row['postid']);?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o"></i></a>  -->
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
<?php include('includes/footer.php');?>
   
<?php } ?>