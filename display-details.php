<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
   $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
   //Verifying CSRF Token
   if (!empty($_POST['csrftoken'])) {
      if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
         $name = $_POST['name'];
         $email = $_POST['email'];
         $comment = $_POST['comment'];
         $postid = intval($_GET['nid']);
         $st1 = '0';
         $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
         if ($query) :
            echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
            unset($_SESSION['token']);
         else :
            echo "<script>alert('Something went wrong. Please try again.');</script>";

         endif;
      }
   }
}
$postid = intval($_GET['nid']);

$sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      $visits = $row["viewCounter"];
      $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
      $con->query($sql);
   }
} else {
   echo "no results";
}


?>

<head>
   <link rel="stylesheet" href="assets/css/display.css">
</head>

<body>
   <!-- Page Content -->
   <?php include('head_foot/top.php') ?>
   <div class="container_fluid">
      <div class="row_site">
         <!-- Blog Post -->
         <?php
         $pid = intval($_GET['nid']);
         $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
         $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
         while ($row = mysqli_fetch_array($query)) {
         ?>
            <div class="card_box">
               <div class="card-body">
                  <h1 class="card_title"><?php echo htmlentities($row['posttitle']); ?></h1>
                  <!--category-->
                  <a class="badge bg-success text-decoration-none link-light" href="#" style="color:#fff"><?php echo htmlentities($row['category']); ?></a>
                  <p>
                     by <?php echo htmlentities($row['postedBy']); ?> on | <?php echo htmlentities($row['postingdate']); ?>
                     <?php if ($row['lastUpdatedBy'] != '') : ?>
                        Last Updated by <?php echo htmlentities($row['lastUpdatedBy']); ?> on<?php echo htmlentities($row['UpdationDate']); ?>
                  </p>
               <?php endif; ?>
               <p class="link_more_tap"><b>More:</b>
                  <a href="" target="_blank">Facebook</a> |
                  <a href="" target="_blank">Whatsapp</a> |
                  <a href="" target="_blank">Address</a>
                  <b>Visits:<?php print $visits; ?></b>
               </p>
               <hr>
               <img class="img_fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
               <p class="card-text"><?php
                                    $pt = $row['postdetails'];
                                    echo (substr($pt, 0)); ?></p>
               </div>
            </div>
         <?php } ?>
         <?php include('includes/sidebar.php') ?>
      </div>
   </div>
   <?php include('head_foot/footer.php') ?>