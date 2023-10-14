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
               <h4 class="page-title">History contact</h4>
               <ol class="breadcrumb p-0 m-0">
               <?php 
               $querys=mysqli_query($con,"SELECT * FROM tbladmin WHERE id=$u_id and userType=2  ");
               $rowname=mysqli_fetch_array($querys);
               ?>
                  <li>
                     <a href="#"><?php echo substr($rowname['AdminUserName'],0,80);?></a>
                  </li>
                  <li>
                     <a href="#">Staff list</a>
                  </li>
                  <li class="active">
                  History contact 
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
                        <tr >
                           <th class="text-center">No</th>
                           <th class="text-center">Name and Lastname</th>
                           <th class="text-center">Email</th>
                           
                           <th class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           $query=mysqli_query($con,"SELECT * FROM sendmail1 WHERE staff_id=$u_id order by -id");
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
                                 $c=1;
                              while($row=mysqli_fetch_array($query))
                              {
                              ?>
                              
                        <tr>

                           <?php if($row['status']=='NO'){ ?>
                                <td class="text-danger"><?php echo $c; ?></td>
                              <td class="text-danger col-lg-8"><?php echo substr($row['message'],0,80);?>...</td>
                              <td class="text-danger"><?php echo htmlentities($row['time'])?></td>
                              <td class=" bg-danger text-center">  <?php echo htmlentities($row['status'])?></td>
                              <td><a href="allow-page.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 

                              <?php }?>

                              <?php if($row['status']=='YES'){ ?>
                                <td class=""><?php echo $c; ?></td>
                              <td class="col-lg-8"><?php echo substr($row['message'],0,80);?>...</td>
                              <td><?php echo htmlentities($row['time'])?></td>
                              <td class="bg-primary text-center"><?php echo htmlentities($row['status'])?></td>
                              <td><a href="allow-page.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 

                              <?php }?>
                              <?php if($row['status']==''){ ?>
                                <td class=""><?php echo $c; ?></td>
                              <td class="col-lg-8"><?php echo substr($row['message'],0,80);?>...</td>
                              <td><?php echo htmlentities($row['time'])?></td>
                              <td class="bg-warning text-center"><?php echo htmlentities($row['status'])?> pending...</td>
                              <td><a href="allow-page.php?u_id=<?php echo htmlentities($row['id']);?>"  class="btn btn-primary btn-sm" ><i class="bi bi-eye"></i></a> 

                              <?php }?>
                           </td>
                        </tr>
                        
                        <?php $c++; } }?>
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