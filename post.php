<?php
session_start();
include('includes/config.php');
//Genrating CSRF Token
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
</head>

<body>

    <!-- Page Content -->
    <div class="container">

        <div class="row justify-content-end">


            <!-- Blog Entries Column -->
            <div class="col-12 mb-3 pb-3" style="border-bottom: 1px solid #969696;">

                <!-- Blog Post -->
                <?php
                $pid = intval($_GET['nid']);
                $query = mysqli_query($con, "select tblposts.PostImage from tblposts where tblposts.id='$pid'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="col-lg-12 col-sm-12">
                        <img style="width: 100%;" class="img-fluid" src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                    </div>

                <?php } ?>

            </div>

            <!--Cmt Sect long Post-->
            



        </div>
        <!-- /.row -->

    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>