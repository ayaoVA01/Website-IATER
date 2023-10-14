<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['login'])==0)
     { 
   header('location:index.php');
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
               <h4 class="page-title">History contact</h4>
               <ol class="breadcrumb p-0 m-0">
                  
                  <li>
                     <a href="#">Admin</a>
                  </li>
                  <li>
                     <a href="#">Posts</a>
                  </li>
                  <li class="active">
                     Manage Post  
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
                           <th class="col-lg-0 text-center">No</th>
                           <th class="col-lg-0">Name</th>
                           <th>Title</th>
                           <th>Date time</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query=mysqli_query($con,"SELECT * FROM sendmail1 order by -id");
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
                                 $count=1;
                              while($row=mysqli_fetch_array($query))
                              {
                                 $staff_id = $row['staff_id'];
                              ?>
                              
                              
                        <tr> 
                              <?php if($row['status']==''){ ?>
                              <td class="text-center"><?php echo $count; ?></td>
                           
                                 <?php $mqls=mysqli_query($con,"SELECT AdminUserName FROM tbladmin WHERE id=$staff_id "); 
                                 $rows=mysqli_fetch_array($mqls)
                                 ?>

                              <td><strong> <?php echo $rows['AdminUserName']; ?></strong></td>
                              <td><?php echo substr($row['message'],0,40);?>...</td>
                              <td><?php echo substr($row['time'],0,16)?></td>
                              <td class="bg-warning text-center"><?php echo htmlentities($row['status'])?>pending..</td>
                              <td><a href="allow-page.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 

                              <?php $count++; }?>
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