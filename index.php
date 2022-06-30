<?php
session_start();
include('includes/config.php');
$_SESSION['catid'] = 0;
//increment visitors
//number of fake visits
$fakeVisitsCeil = 3;
//visitor counter
$query = mysqli_query($con, "SELECT secCounter FROM visitorcounter WHERE id=1");
$result = mysqli_fetch_array($query);
$secCounter = (int)$result['secCounter'];
if ($secCounter >= $fakeVisitsCeil) {
  mysqli_query($con, "UPDATE visitorcounter SET secCounter=0");
  mysqli_query($con, "UPDATE visitorcounter SET counter = counter+1");
} else {
  $secCounter++;
  mysqli_query($con, "UPDATE visitorcounter SET secCounter='" . $secCounter . "'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>El Waseet | Home Page</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">
  <link href="css/global.css" rel="stylesheet">
  <?php include('includes/links.php'); ?>
</head>
<body>
  <!-- Navigation -->
  <?php include('includes/header.php'); ?>
  <!-- Page Content -->
  <div class="container mt-5">
    <!--<img class="bgImg" src="images/bg4.jpg" style="width:100vw;position:fixed;height:100vh;top:0;left:0;filter: grayscale(100%);">-->
    <div class="row justify-content-around">
      <!-- Blog Entries Column -->
      <div class="col-md-9 col-sm-12 mt-5">
        <!-- Blog Post -->
        <div class="container-fluid">
          <!-- wide banner top -->
          <?php include('includes/ad.php'); ?>
          <div class="row">
            <!-- element -->
            <?php
            if (isset($_GET['pageno'])) {
              $pageno = $_GET['pageno'];
            } else {
              $pageno = 1;
            }
            $no_of_records_per_page = 6;
            $offset = ($pageno - 1) * $no_of_records_per_page;
            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
            $result = mysqli_query($con, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);
            ?>

          </div>

          <style>
            .active.carousel-item {
              padding-left: 0;
            }

            .catHomeHeader {
              background-color: #2c2c2c;
              color: #fff;
              border-right: 2px solid #EF4343;
              padding: 10px 10px;
            }

            .carousel,
            .carousel-item,
            .carousel-item .postContainer,
            .carousel-item .postContainer .post {
              height: 60vh;
              width: 100%;
            }

            .carouselPostImg {
              height: 80%;
            }

            .catHeaderLink {
              height: 100%;
              color: #EF4343;
              font-size: 1.1rem;
              padding-top: 8px;
            }

            @media screen and (max-width: 956px) {
              .catHeader {
                font-size: 1.1rem;
                padding-top: 8px;
              }
            }
            
          </style>
          <div class="row">
            <h1 class="catHomeHeader col-12">احدث الاخبار</h1>
          </div>
          <div class="row mt-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner pb-5">
                <?php $query = mysqli_query($con, "select tblposts.id as pid,tblposts.SubCategoryId as scid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page "); ?>
                <?php $firstCarousel = true;
                while ($row = mysqli_fetch_array($query)) {
                ?>
                  <div class="carousel-item <?php if ($firstCarousel) {
                                              echo ("active");
                                              $firstCarousel = false;
                                            } ?>">
                    <div class="col-lg-12 col-sm-12 postContainer" style="text-align: right;">
                      <div class="post">
                        <img class="postImg carouselPostImg" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                        <div class="contentContainer carouselContent">
                          <div class="catContainer">
                            <p class="postCategory"><a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> </p>
                            <p class="postSubCategory"><a href="sub-category.php?catid=<?php echo htmlentities($row['scid']) ?>"><?php echo htmlentities($row['subcategory']); ?></a> </p>
                          </div>
                          <p class="postDate"><?php echo htmlentities($row['postingdate']); ?></p>
                          <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>">
                            <p class="postTitle"> <?php echo htmlentities($row['posttitle']); ?></p>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  } ?>

              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <!--END OF LATEST NEWS-->
          <?php
          $catquery = mysqli_query($con, "SELECT `id`, `CategoryName` FROM `tblcategory` WHERE Is_Active = 1");
          while ($catrow = mysqli_fetch_array($catquery)) {
            $id = $catrow['id'];
            $query = mysqli_query($con, "select tblposts.id as pid,tblposts.SubCategoryId as scid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 and tblposts.CategoryId = '$id' order by tblposts.id desc  LIMIT 0, 3 ");

          ?>
            <div class="row catHomeHeader justify-content-between my-4">
              <a class="col-6 text-left catHeaderLink" href="category.php?catid=<?php echo htmlentities($id) ?>">●<span>●</span> المزيد</a>
              <h1 class="col-6 catHeader"><?php echo ($catrow['CategoryName']) ?></h1>

            </div>
            <div class="row justify-content-end mb-2 pb-3" style="border-bottom: 1px solid #EF4343;">
              <?php
              while ($row = mysqli_fetch_array($query)) {
              ?>
                <div class="col-lg-4 col-sm-12 mt-4 postContainer" style="text-align: right;">
                  <div class="post">
                    <img class="postImg" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                    <div class="contentContainer">
                      <div class="catContainer">
                        <p class="postCategory"><a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a> </p>
                        <p class="postSubCategory"><a href="sub-category.php?catid=<?php echo htmlentities($row['scid']) ?>"><?php echo htmlentities($row['subcategory']); ?></a> </p>
                      </div>
                      <p class="postDate"><?php echo htmlentities($row['postingdate']); ?></p>
                      <a href="news-details.php?nid=<?php echo htmlentities($row['pid']) ?>">
                        <p class="postTitle"> <?php echo htmlentities($row['posttitle']); ?></p>
                      </a>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          <?php
          }
          ?>


          <!-- wide banner bottom -->
          <?php include('includes/ad.php'); ?>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <?php include('includes/footer.php'); ?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  </head>
</body>

</html>