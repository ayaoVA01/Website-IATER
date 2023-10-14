<?php

use PHPMailer\PHPMailer\PHPMailer;


session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['user_login']) == 0) {
   header('location:../admin/index.php');
} else {
   $ids = $_SESSION['u_id'];
   // Code for Add New Sub Admi
   //time laos -------------------

   date_default_timezone_set('Asia/Vientiane');
   $laosDateTime = new DateTime();
   $laosDateT = $laosDateTime->format('Y-m-d');
   $month= $laosDateTime->format('m');
   
   $myq =mysqli_query($con, "SELECT * FROM tbladmin WHERE id='$ids'");
   $my_row=mysqli_fetch_array($myq);
   $day=$my_row['determine'];
   // ---------------------

   if (isset($_POST['submit'])) {
      $ids = $_SESSION['u_id'];
      if($_POST['reason']==True){
         $reason = $_POST['reason'];
      }else{
         $reason = $_POST['reason2'];
      }
      $dateStart = $_POST['dateStart'];
      $dateEnd = $_POST['dateEnd'];
      $section = $_POST['section'];
      $message = $_POST['message'];
      $status = '';

      $startDate = new DateTime($dateStart);
      $endDate = new DateTime($dateEnd);

      
      // Loop through each day between the start and end date
      $t=1;
      while ($startDate <= $endDate) {
         $list= $startDate->format('Y-m-d');
         $startDate->modify('+1 day');
         $t++;
         
      }
      $days =$day-$t;
      
      if($month==1){
         $days=15;
         
      }
      if($days<1){
         echo "<script>alert('you have no day not emplty.');</script>";

      }else{
         $query_day = mysqli_query($con, "UPDATE tbladmin SET determine='$days' WHERE id=$ids");
                     
         if ($_POST['message'] == '') {
            echo "<script>alert('Please inter your Conversation.');</script>";
         }
         if ($_POST['message'] !== '') {
            $query = mysqli_query($con, "INSERT into sendmail1(staff_id,reason,	dateStart,dateEnd,section,message,status) values('$ids','$reason','$dateStart',' $dateEnd','$section ','$message','$status')");
         }

         $queryd = mysqli_query($con, "SELECT * from tbladmin where id=$ids");
         $row = mysqli_fetch_array($queryd);

         $mailsend = mysqli_query($con, "SELECT * from sendmail1  where staff_id=$ids and id=31");
         $rowmss = mysqli_fetch_array($mailsend);

      
         if ($query) {
            
            try {
            require '../vendor/autoload.php';
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer();
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
            //Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'iATERlaos2020@gmail.com';
            $mail->Password = 'ahcdeazrqjkmfdtv';
            $mail->SMTPSecure = 'tls';
            // $mail->SMTPDebug=2;
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('iATERlaos2020@gmail.com', $row['AdminUserName']);
            $mail->addAddress('odxmb31@gmail.com', 'PEAK');
            // $idmail = $rowmss['id'];/
            $idmail2 = $rowmss['message'];
            $msql =mysqli_query($con,"SELECT * FROM sendmail1 WHERE staff_id=$ids order by id DESC limit 1");
            
            $cont_id =mysqli_fetch_array($msql);
            $c_id = $cont_id['id'];
            $link = "http://localhost:8082/Website-IATER/staff/allow-page.php?cont_id=$c_id";
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Staff of iATER contact.';
            $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon", "logo1.jpg");
            $mail->AddEmbeddedImage("../assets/images/logo2.jpg", "my-icon2", "logo2.jpg");
            
            $mail->Body = "<body>

                  <div style='margin-left: auto; margin-right:auto; padding:30px;'>

                     <img style='width: 70px;height: 45px;object-fit: cover;margin: 20px;' src='cid:my-icon' alt='iATER icon'>
                     <div style='border: solid 0.2px; border-radius:5px; width:100%; margin-left:250'>
                        <div>
                           <div class='card-box'>
                                 <h4 style='padding-left: 10px;'><b>Thank you for see my box! </b></h4>
                                 <hr />
                                 <div style='padding: 20px;'>
                                    <h4>$idmail2</h4>
                                    <div style='padding-left: 12px;'>
                                    </div>
                                    <a href='$link' class='btn btn-primary' style='text-decoration: none;'>
                                                   <div style='padding: 10px;
                                                               width: 80px;
                                                               background-color: #03a4ed;
                                                               border-radius: 5px;
                                                               text-align: center;
                                                               color: burlywood;'>
                                                               <p>Reply</p>
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
                                       object-fit: cover;' src='cid:my-icon2' alt='>
                     <p class='text'>Copyright © iAETR Institute of Advanced Technology Education & Research</p>
               </div>
            </div>
            </body>";
            if ($mail->send()) {
               echo "<script>alert('Send contact successfully Please Wait for pending.');</script>";
               header('location: list-contact.php');
               exit;
            } else {
               echo "$mail->ErrorInfo";
            }
         } catch (Exception $e){
            // code to handle the exception
            echo "Error: " . $e->getMessage();
         }
      }
   }
   }
  

?>
<?php ?>

   <?php include('includes/topheader.php'); ?>
   <!-- Top Bar End -->
   <!-- ========== Left Sidebar Start ========== -->
   <?php include('includes/leftsidebar.php'); ?>
   <!-- Left Sidebar End -->
   <div class="content-page">
      <!-- Start content -->
      <div class="content">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="page-title-box">
                     <h4 class="page-title">Add Contact</h4>
                     <ol class="breadcrumb p-0 m-0">
                        <li>
                           <a href="#">dashboard</a>
                        </li>
                        <li>
                           <a href="#">Contact</a>
                        </li>
                        <li class="active">
                           Add Contact
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
                   
                     <h4 class="m-t-0 header-title"><b>Add a new Contact </b></h4> <h1> <?php echo $my_row['determine']; ?></h1>
                     <hr />
                     <div class="row">
                        <form  action="" name="addsuadmin" method="POST" id="comment_form">
                           <div class="container">
                              <div class="row" style="display: flex; ">&nbsp;&nbsp;&nbsp;&nbsp;
                                 <div class="form-group form-check">
                                    <input type="checkbox" name="reason" value="Vacation" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">vacation</label> 
                                 </div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                 <div class="form-group form-check">
                                 <input type="checkbox"  class="form-check-input" id="exampleCheck1">
                                 <label class="text" for="exampleCheck2">More:</label>
                                    <input type="text" name="reason2" class="form-check-input " id="exampleCheck1" style="font-size: 10px;" require>
                                    
                                 </div>
                              </div>
                              <div class="">
                                 <label for="datepicker" class="">&nbsp;&nbsp;&nbsp;Pick start <br>
                                    <input class="inp" name="dateStart" type="date" id="datepicker" autocomplete="off" require>
                                 </label>	-
                                 <label for="datepicker" class="">&nbsp;&nbsp;&nbsp; Pick end <br>
                                    <input class="inp" name="dateEnd" type="date" id="datepicker" autocomplete="off">
                                 </label>	

                                    OR
                                 <select name="section" id="">
                                    <option value=""></option>
                                    <option value="MORNING">MORNING</option>
                                    <option value="AFTERNOOM">AFTERNOOM</option>
                                 </select>
                                 <p style="font-size:10px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if you have a long vacation don't select morming or afternoom.</p>
                              </div>
                              

                           </div>
                           
                           <div class="form-group col-md-6">
                              <label for="password" type="message">Descripture</label>
                              <!-- <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required> -->
                              <textarea name="message" class="form-control" rows="6" style="border-radius: 5px;" require></textarea>
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" id="submit" name="submit" value="send">
                                    Submit</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
         <!-- container -->
      </div>
      <!-- content -->
      <?php include('includes/footer.php'); ?>

      
      
   <?php } ?>