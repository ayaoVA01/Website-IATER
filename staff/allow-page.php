<?php 
use PHPMailer\PHPMailer\PHPMailer;
   session_start();
   include('includes/config.php');

   error_reporting(0);
   if (strlen($_SESSION['user_login']) == 2) {
    header('location:../admin/index.php');
 } else {
    $id = $_SESSION['u_id'];
    $c_t =$_GET['cont_id'];
    $queryuser = mysqli_query($con, "SELECT * from tbladmin where id=$id");
    $rowuser = mysqli_fetch_array($queryuser);
    if(isset($_POST['yes'])){
        $msl_stt=mysqli_query($con,"SELECT status FROM sendmail1 WHERE id=$c_t");
        $stt=mysqli_fetch_array($msl_stt);
        if($stt['status'] == "YES"){
            echo "<script>alert('The answer already exists.');</script>";
        }else{

        $status = "YES";

        $query = mysqli_query($con, "UPDATE sendmail1 SET status='$status' WHERE id=$c_t");

        if ($query) {
           
            require '../vendor/autoload.php';
          
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'iATERlaos2020@gmail.com';
            $mail->Password = 'ahcdeazrqjkmfdtv';
            $mail->SMTPSecure = 'tls';
            // $mail->SMTPDebug=2;
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('iATERlaos2020@gmail.com', "iATER");
            $mail->addAddress($rowuser['AdminEmailId'], $rowuser['AdminUserName']);
            $mail->isHTML(true);  
            $idmail = $rowmss['id'];
            $idmail2 = $rowmss['message'];
            $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon");
            $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon2");
   
            
            $link = "http://localhost:8082/Website-IATER/staff/list-contact.php";
                                           
            $mail->Subject = 'Have some answer for you.';
            
            $mail->Body = "<body>
                                <div style='margin-left: auto; margin-right:auto; padding:30px;'>

                                <img style='width: 70px;height: 45px;object-fit: cover;margin: 20px;' src='cid:my-icon' alt='iATER icon'>
                                <div style='border: solid 0.2px; border-radius:5px; width:100%; margin-left:250'>
                                <div>
                                    <div class='card-box'>
                                            <h4 style='padding-left: 10px;'><b>Have already answered YES</b></h4>
                                            <hr />
                                            <div style='padding: 20px;'>
                                            <h4>Click the bottom for view list.</h4>
                                            <div style='padding-left: 12px;'>
                                            </div>
                                            <a href='$link' class='btn btn-primary' style='text-decoration: none;'>
                                                <div style='padding: 10px;
                                                            width: 80px;
                                                            background-color: #03a4ed;
                                                            border-radius: 5px;
                                                            text-align: center;
                                                            color: burlywood;'>
                                                            <p>View</p>
                                                            
                                                </div>
                                            </a>
                                            </form>
                                            </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                    <div style='width: 100%;
                                        text-align: center;
                                        margin-top: 2rem;'>
                        <img style='width: 40px;
                                            height: 20px;
                                            object-fit: cover;' src='cid:my-icon2' alt=''>
                        <p>Copyright © iAETR Institute of Advanced Technology Education & Research</p>
                    </div>
                    </div>
                    </body>";
                if($mail->send()){
                        echo "<script>alert('Submit YES successfully.');</script>";
                }  

            
        }else{
           echo "<script>alert('ssomething went wrong!');</script>";
        }}
    }
    if(isset($_POST['no'])){
        $msl_stt=mysqli_query($con,"SELECT status FROM sendmail1 WHERE id=$c_t");
        $stt=mysqli_fetch_array($msl_stt);
        if($stt['status'] == "NO"){
            echo "<script>alert('The answer already exists.');</script>";
        }else{
        $status = "NO";
        require '../vendor/autoload.php';
          
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'iATERlaos2020@gmail.com';
        $mail->Password = 'ahcdeazrqjkmfdtv';
        $mail->SMTPSecure = 'tls';
        // $mail->SMTPDebug=2;
        $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('iATERlaos2020@gmail.com', "iATER");
        $mail->addAddress($rowuser['AdminEmailId'], $rowuser['AdminUserName']);
        $mail->isHTML(true);  
        $idmail = $rowmss['id'];
        $idmail2 = $rowmss['message'];
        $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon");
        $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon2");

        
        $link = "http://localhost:8082/Website-IATER/staff/list-contact.php";
                                       
        $mail->Subject = 'Have some answer for you.';
        
        $mail->Body = "<body>
                            <div style='margin-left: auto; margin-right:auto; padding:30px;'>

                            <img style='width: 70px;height: 45px;object-fit: cover;margin: 20px;' src='cid:my-icon' alt='iATER icon'>
                            <div style='border: solid 0.2px; border-radius:5px; width:100%; margin-left:250'>
                            <div>
                                <div class='card-box'>
                                        <h4 style='padding-left: 10px;'><b>Have already answered NO</b></h4>
                                        <hr/>
                                        <div style='padding: 20px;'>
                                        <h4>Click the bottom for view list.</h4>
                                        <div style='padding-left: 12px;'>
                                        </div>
                                        <a href='$link' class='btn btn-primary' style='text-decoration: none;'>
                                            <div style='padding: 10px;
                                                        width: 80px;
                                                        background-color: #03a4ed;
                                                        border-radius: 5px;
                                                        text-align: center;
                                                        color: burlywood;'>
                                                        <p>View</p>
                                            </div>
                                        </a>
                                        </form>
                                        </div>
                                </div>
                            </div>
                            </div>

                        </div>
                <div style='width: 100%;
                                    text-align: center;
                                    margin-top: 2rem;'>
                    <img style='width: 40px;
                                        height: 20px;
                                        object-fit: cover;' src='cid:my-icon2' alt=''>
                    <p>Copyright © iAETR Institute of Advanced Technology Education & Research</p>
                </div>
                </div>
                </body>";
        $mail->send();
        $query = mysqli_query($con, "UPDATE sendmail1 SET status='$status' WHERE id=$c_t");

        if ($query) {
           echo "<script>alert('Submit NO successfully.');</script>";
           // echo "<script type='text/javascript'> document.location = 'add-subadmins; </script>";
        }else{
           echo "<script>alert('something went wrong!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply</title>
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <div class="container col-lg-11">
        <form action="" method="post">
            <div class="card mt-5 col-lg-8" style="margin-left: auto; margin-right:auto;" >
                <div class="card-body">
                

                 <?php 
                        $user =mysqli_query($con, "SELECT AdminUserName FROM tbladmin WHERE id=$id ");
                        $rows =mysqli_fetch_array($user)
                    ?>
                        <h5 class="card-title"><i class="bi bi-person"></i> <?php echo htmlentities($rows['AdminUserName']); ?></h5> 

                    <?php 
                    ?>
                    <!-- <h5 class="card-title"><i class="bi bi-person"></i> <?php echo htmlentities($row['staff_id']); ?></h5>  -->
                    



                    <?php 
                            $msql =mysqli_query($con,"SELECT * FROM sendmail1 WHERE id=$c_t");
    
                            $row =mysqli_fetch_array($msql);
                    ?>
                    
                    <hr>
                    <div class="p-3">
                        <div class="d-flex container " style="margin-left: auto; margin-right:auto; ">
                            <div class="col-7">

                                <b>&nbsp;&nbsp;reason</b>
                                <p class="card-text"><?php echo htmlentities($row['reason']); ?></p>
                            </div>
                            <?php if($row['dateStart']!=$row['dateEnd']){ ?>
                            <div class="col-5 text-center" >
                                <div class="">
                                    
                                    <b>Ontime</b>
                                    <div class="d-column" style="margin-left: auto; margin-right:auto;">
                                        <p class="card-text"><?php echo htmlentities($row['dateStart']); ?><b>&nbsp;&nbsp;TO&nbsp;&nbsp;</b><?php echo htmlentities($row['dateEnd']); ?></p> 
                                        
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if($row['dateStart']==$row['dateEnd']){ ?>
                            <div class="col-5 text-center" >
                                <div class="">
                                    
                                    <b>Ontime</b>
                                    <div class="d-column" style="margin-left: auto; margin-right:auto;">
                                        <p class="card-text"><?php echo htmlentities($row['dateStart']); ?><b>&nbsp;&nbsp; In &nbsp;&nbsp;</b><?php echo htmlentities($row['section']); ?></p> 
                                        
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <br>

                        <p class="card-text"><?php echo htmlentities($row['message']); ?></p>
                        <p class="card-text position-absolute top-0 end-0 m-3"><strong>date:</strong>  <?php echo htmlentities($row['time']); ?></p>
                        
                    </div>

                    <?php if($row['status']=='YES'){ ?>
                    <p> <span class="text-body-tertiary">Already submit <?php echo htmlentities($row['status']); ?> and Have a good day😍.</span> </p>
                    <?php } ?>
                    <?php if($row['status']=='NO'){ ?>
                    <p><span class="text-body-tertiary">Already submit <?php echo htmlentities($row['status']); ?> and Have a good day😍.</span> </p>
                    <?php } ?>
                    <?php if($row['status']==''){ ?>
                        <p class="card-text text-body-tertiary">Please click YES or NO to allow me.</p>
                    <?php } ?>
                    
                    <div class=""style="margin-left: auto; margin-right:auto;">
                        <button class="btn btn-primary " type="submit" name="yes">YES</button>&nbsp; &nbsp; &nbsp; 
                        <button class="btn btn-secondary " type="submit" name="no" >NO</button>

                    </div>  
                
                </div>
            </div>
        </form>

    </div>

</body>

</html>
<?php } ?>