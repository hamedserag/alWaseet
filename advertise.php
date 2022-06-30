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
            $number = preg_replace('~[\\\\/:*?"<>|]~', ' ', $_POST['number']);
            $details = preg_replace('~[\\\\/:*?"<>|]~', ' ', $_POST['details']);
            $query = mysqli_query($con, "INSERT INTO `advertise`(`name`, `mail`, `number`,`details`) VALUES ('$name','$email','$number','$details')");
            if ($query) {
                echo "<script>alert('تم ارسال الرساله لفريق العمل');</script>";
                unset($_SESSION['token']);
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>الوسيط | اعلن معنا</title>

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
    <div class="container mb-5 pb-5">

        <div class="row justify-content-end py-5 my-5">

            <div class="row justify-content-center mt-4" style="margin-top: -8%">
                <div class="col-12">
                    <h1>قم بالاعلان علي الوسيط</h1>
                </div>
                <div class="col-md-11">
                    <form name="Comment" method="post">
                        <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="number" class="form-control" placeholder="رقم الواتساب" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="details" class="form-control" placeholder="ملخص عن الاعلان" required>
                        </div>
                        <button type="submit" class="btn btn-primary cmtBtn" name="submit">ادخال</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </div>

    <?php include('includes/footer.php'); ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>