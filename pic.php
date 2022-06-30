<?php
session_start();
error_reporting(0);
include('includes/config.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>الوسيط | القائمه</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

    <?php include('includes/links.php'); ?>

</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>
    <!-- Page Content -->
    <div class="container">
        <div class="row justify-content-around" style="margin-top: 4%">
            <div id="moveHere" class="mt-5"></div>
            <!-- Blog Entries Column -->
            <div class="col-md-9 col-sm-12 mt-4">
                <!-- Blog Post -->
                <div class="container-fluid">
                    <!-- wide banner top -->
                    <div class="row mb-5">
                        <img class="wideBanner col-12" src="images/media/bannerWide.jpg" alt="">
                    </div>
                    <style>
                        .post img {
                            width: 100%;
                            height: 500px;
                            object-fit: contain;
                            background: rgba(41, 45, 51, 0.1);
                        }

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
                            font-size: 1.3rem;
                            padding-top: 8px;
                        }
                    </style>
                    <script>
                        Iframe
                    </script>
                    <!-- <div class="row">
                        <?php

                        $query = mysqli_query($con, "SELECT `id`, `url`,`title` FROM `media` WHERE `type`=0 ORDER BY `id` DESC");
                        $rowcount = mysqli_num_rows($query);
                        if ($rowcount == 0) {
                            echo "لا يوجد صور حاليا";
                        } else { ?>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-12 mt-4 postContainer" style="text-align: right;">
                                    <div class="post col-lg-12 col-sm-12">
                                        <p class="postTitle py-2"><?php echo htmlentities($row['title']); ?></p>
                                        <img src="admin/media/<?php echo htmlentities($row['url']); ?>" alt="<?php echo htmlentities($row['title']); ?>">
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div> -->
                    <div class="row mt-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner pb-5">
                                <?php $query = mysqli_query($con, "SELECT `id`, `url`,`title` FROM `media` WHERE `type`=0 ORDER BY `id` DESC"); ?>
                                <?php $firstCarousel = true;
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="carousel-item <?php if ($firstCarousel) {echo ("active");$firstCarousel = false;} ?>">
                                        <div class="col-lg-12 col-sm-12 postContainer" style="text-align: right;">
                                            <div class="post">
                                                <img class="postImg carouselPostImg" src="admin/media/<?php echo htmlentities($row['url']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                                                <div class="contentContainer carouselContent">
                                                <p class="postTitle py-2"><?php echo htmlentities($row['title']); ?></p>
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


                    <!-- wide banner bottom -->
                    <div class="row mt-5">
                        <img class="wideBanner col-12" src="images/media/bannerWide.jpg" alt="">
                    </div>
                </div>
                <!-- Pagination -->
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