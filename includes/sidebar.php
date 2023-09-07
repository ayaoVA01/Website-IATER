<head>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="assets/css/sidebars123.css">
</head>

<div class="sidebaar_blog ">
   <!-- Search Widget -->
   <div class="card_search">
      <h5 class="txt_search">Search</h5>
      <div class="card-body">
         <form name="search" action="search.php" method="post">
            <div class="input-group">
               <input type="text" name="searchtitle" class="form-control rounded-0" placeholder="Search for..." required>
               <span class="input-group-btn">
                  <button class="btn btn_sch btn-secondary rounded-0" type="submit"><i class="fa fa-search"></i></button>
               </span>
         </form>
      </div>
   </div>
</div>

<!-- Side Widget -->
<div class="sidebaar_blog">
   <h5 class="card_header">Popular News</h5>
   <div class="card_body">
      <?php
      $query1 = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId  order by viewCounter desc limit 5");
      while ($result = mysqli_fetch_array($query1)) {

      ?>
         <div class="link_pol">
            <a href="display-details.php?nid=<?php echo htmlentities($result['pid']) ?>" class="text_d_bold "><i class='bx bx-wifi-0 bcon_font'></i><?php echo htmlentities($result['posttitle']); ?></a>
         </div>
      <?php } ?>
   </div>
</div>
<!-- Side Widget -->
<div class="sidebaar_blog sideba_blog">
   <h5 class="card-header border-0 bg-white">Top Trending</h5>
   <div class="card-body">
      <ul class="mb-0 list-unstyled">
         <?php
         $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId limit 8");
         while ($row = mysqli_fetch_array($query)) {

         ?>
            <li class="m_align_center">
               <img class="m_rounded" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
               <a href="display-details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="text_d_bold"><?php echo htmlentities($row['posttitle']); ?></a>
            </li>
         <?php } ?>
      </ul>
   </div>
</div>