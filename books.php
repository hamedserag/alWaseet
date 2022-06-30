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
                        .post object {
                            width: 100%;
                            height: 800px;
                        }
                    </style>
                    <script>
                        Iframe
                    </script>
                    <div class="row">
                        <?php

                        $query = mysqli_query($con, "SELECT `id`, `url`,`title` FROM `media` WHERE `type`=2 ORDER BY `id` DESC");
                        $rowcount = mysqli_num_rows($query);
                        if ($rowcount == 0) {
                            echo "لا يوجد كتب حاليا";
                        } else { ?>
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-12 mt-4 postContainer" style="text-align: right;">
                                    <div class="post col-lg-12 col-sm-12">
                                        <p class="postTitle py-2"><?php echo htmlentities($row['title']); ?></p>
                                        <object class="pdfViewer" type="application/pdf" width="100%" height="100%" data="admin/media/<?php echo htmlentities($row['url']); ?>#zoom=FitW">
                                            <p>عذرا جهازك لا يدعم عرض النسخه الورقيه <a download rel="noopener noreferrer" target="_blank" href="admin/pdf/<?php echo htmlentities($row['url']); ?>">اضغط هنا للتحمبل و القراءه</a></p>
                                        </object>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
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