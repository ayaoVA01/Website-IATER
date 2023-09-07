<?php $page = 'blogs';
include('head_foot/top.php') ?>

<?php include('includes/config.php'); 
?>

<head>
   <link rel="stylesheet" href="assets/css/blogs.css">
</head>

<div class="blog">
   <div div class="header-text"></div>
   <div class="blog_contanner">
      <h4 class="blog_txt">Recent <span>News</span></h4>
      <?php
      if (isset($_GET['pageno'])) {
         $pageno = $_GET['pageno'];
      } else {
         $pageno = 1;
      }
      
      $no_of_records_per_page = 3;
      $offset = ($pageno - 1) * $no_of_records_per_page;
      $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
      $result = mysqli_query($con, $total_pages_sql);
      $total_rows = mysqli_fetch_array($result)[0];
      $total_pages = ceil($total_rows / $no_of_records_per_page);
      $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblposts.postedBy,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
      while ($row = mysqli_fetch_array($query)) {?>
      
         <div class="blog_grid">
            <div class="blog_grid_side">
               <a href="display-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="a_image_t">
                  <img class="card_img_top" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
               </a>
               <div class="card-body">
                  <div class="con_txt">
                     <!--category-->
                     <div class="gog_abtn">
                        <div><a class="categor_abtn abtn1" href="#"><?php echo htmlentities($row['category']); ?></a></div>
                        <div><a class="categor_abtn abtn2" href="#">by <?php echo htmlentities($row['postedBy']); ?></a></div>
                     </div>
                     <p class="post_date"><small> Posted on <?php echo htmlentities($row['postingdate']); ?></small></p>
                     <div class="btn_a">
                        <a href="display-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="a_image_l">
                           <h5 class="card-title"><?php echo htmlentities($row['posttitle']); ?></h5>
                        </a>
                     </div>
                  </div>
                  <div class="btn_readM">
                     <a href="display-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="a_image_btn">
                        Read more
                     </a>
                  </div>
               </div>
            </div>
         </div>
      <?php } ?>
   </div>
</div>

<div class="next_page">
   <?php 
      if($pageno>1)
      {
         echo "<a href='blog.php?pageno=".($pageno-1)."' class='btn_imary1'>Previous</a>";
      }
      for ($i = 1; $i <= $total_pages; $i++) {
         if($i == @$_GET['pageno']) {
            ?> <a class="btn_imary" href="?pageno=<?php echo $i ?>"><?php echo $i ?></a> <?php
         }else{
            ?> <a class="btn_imary1" href="?pageno=<?php echo $i ?>"><?php echo $i ?></a> <?php
         }
      }
      if($i>$pageno)
      {
         echo "<a href='blog.php?pageno=".($pageno+1)."' class='btn_imary1'>Next</a>";
      }
   ?>  
</div>

<?php include('head_foot/footer.php') ?>