<?php 
   session_start();
   include('includes/config.php');
   error_reporting(0);
   if(strlen($_SESSION['user_login'])==1)
     { 
   header('location:index.php');
   }else{
    $id = $_SESSION['u_id'];
    $u_id = $_GET['u_id'];
    if(isset($_POST['yes'])){
        $status = "YES";

        $query = mysqli_query($con, "UPDATE sendmail1 SET status='$status' WHERE id=$u_id");
       
        if ($query) {
           echo "<script>alert('Submit YES successfully.');</script>";
           // echo "<script type='text/javascript'> document.location = 'add-subadmins; </script>";
        }else{
           echo "<script>alert('something went wrong!');</script>";
        }
    }
    if(isset($_POST['no'])){
        $status = "NO";
       
        $query = mysqli_query($con, "UPDATE sendmail1 SET status='$status' WHERE id=$u_id");

        if ($query) {
           echo "<script>alert('Submit NO successfully.');</script>";
           // echo "<script type='text/javascript'> document.location = 'add-subadmins; </script>";
        }else{
           echo "<script>alert('something went wrong!');</script>";
        }
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

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
<div class="content-page">
    <div class="content col-8 p-5">
    <div class="container card-box">
        <div class="container">
            <div class="card">

                <form action="" method="post">
                    <div class="" style="margin-left: auto; margin-right:auto;" >
                        <div class="card-body">
                        
                        <?php 
                            $msql =mysqli_query($con,"SELECT * FROM sendmail1 WHERE id=$u_id");
        
                            while($row =mysqli_fetch_array($msql)){
                            $staff_id = $row['staff_id'];
                            ?>


                         <?php 
                                $user =mysqli_query($con, "SELECT AdminUserName FROM tbladmin WHERE id=$staff_id");
                                $rows =mysqli_fetch_array($user)
                            ?>
                                <h5 class="card-title"><i class="bi bi-person"></i> <?php echo htmlentities($rows['AdminUserName']); ?></h5> 
        
                            <?php 
                            ?>
                            
                            
                            <hr>
                                <div class="p-3">
                                   
                                    <p class="card-text"><?php echo htmlentities($row['message']); ?></p>
                                    <p class="card-text position-absolute top-0 end-0 m-3" style="top: -100px; float:right; position:relative;"><strong>Date:</strong>  <?php echo htmlentities($row['time']); ?></p>
                                    
                                </div>
                                <br><br>
                                <?php if($row['status']=='YES'){ ?>
                                <p> <span class="text-body-tertiary " style="font-size: 12px;">Already submit <?php echo htmlentities($row['status']); ?>.</span> </p>
                                <?php } ?>
                                <?php if($row['status']=='NO'){ ?>
                                    
                                <p><span class="text-body-tertiary" style="font-size: 12px;">Already submit <?php echo htmlentities($row['status']); ?>.</span> </p>
                                <?php } ?>
                                
                                <?php if($row['status']==''){ ?>
                                    <p style="font-size: 12px;">Please click YES or NO to allow me.</p>
                                <?php } ?>
                                <div tyle="margin-left: auto; margin-right:auto;">
                                    <button class="btn btn-primary " type="submit" name="yes">YES</button>&nbsp; &nbsp; &nbsp; 
                                    <button class="btn btn-secondary " type="submit" name="no" >NO</button>
                                </div>  
                                <?php 
                                }?>
                           
                            
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    </div>

</div>
   


<!-- content -->
<?php include('includes/footer.php');?>
   
