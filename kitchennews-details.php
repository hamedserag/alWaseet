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
            $name = preg_replace('~[\\\\/:*?"<>|]~', ' ', $_POST['name']);
            $email = preg_replace('~\\\\/:?"<>~', ' ', $_POST['email']);
            $comment = preg_replace('~[\\\\/:*?"<>|]~', ' ', $_POST['comment']);
            $postid = intval($_GET['nid']);

            $st1 = '0';
            $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
            if ($query) {
                echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
                unset($_SESSION['token']);
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }
    }
}

$query = mysqli_query($con, "SELECT count FROM tblposts WHERE id=" . intval($_GET['nid']));
$result = mysqli_fetch_array($query);
mysqli_query($con, "UPDATE tblposts SET count = count+1 WHERE id=" . intval($_GET['nid']));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>الوسيط | اقرا المزيد</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/news-detail.css" rel="stylesheet">
    <?php include('includes/links.php'); ?>
</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row justify-content-end">


            <!-- Blog Entries Column -->
            <div class="col-12 mb-3 pb-3" style="border-bottom: 1px solid #969696;">

                <!-- Blog Post -->
                <?php
                $pid = intval($_GET['nid']);
                $query = mysqli_query($con, "SELECT `id`, `title`, `details`, `image`, `postingdate` FROM `kitchen` WHERE `id`='$pid'");
                while ($row = mysqli_fetch_array($query)) { ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-sm-12">
                            <img style="width: 100%;" class="img-fluid" src="admin/postimages/<?php echo htmlentities($row['image']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                        </div>
                        <div class="col-lg-12 col-sm-12 mt-4">
                            <h2 class="card-title"><?php echo htmlentities($row['title']); ?></h2>
                        </div>
                        <div class="col-lg-12 col-sm-12 mb-4" style="border-bottom: 1px solid #969696;">
                            <p>
                                <b> رفع بتاريخ </b>
                                <?php echo htmlentities($row['postingdate']); ?>
                                <?php $pt = $row['details']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <div>
                                <?php echo (substr($pt, 0)); ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php include('includes/sidebar.php'); ?>
                    </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>