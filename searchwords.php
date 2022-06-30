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

    <title>الوسيط | خدمه الاخبار العاجله</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="css/news-detail.css" rel="stylesheet">
    <?php include('includes/links.php'); ?>
</head>

<body>
    <style>
        .keywords p {
            padding: 10px;
            background-color: #EF4343;
            border-radius: 5px;
            margin: 5px;
            color: #fff;
        }
    </style>
    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container mb-5 pb-5">

        <div class="row justify-content-end mt-5 pt-5">
            <h4>يمكنك البحث عن موقع الوسيط من خلال</h4>
        </div>
        <div class="row justify-content-end mt-2 keywords">
            <p>الوسيط</p>
            <p>اخبار الوسيط</p>
            <p>اخبار الوسيط العاجله</p>
            <p>خدمه الاخبار العاجله الوسيط</p>
            <p>اخبار مصريه</p>
            <p>اخبار عالميه بصيغه مصريه</p>
            <p>الوسيط الدولي</p>
            <p>اخبار محافظات الوسيط</p>
            <p>اخبار العرب و العالم الوسيط</p>
            <p>اخبار العرب الوسيط الدولي</p>
            <p>الوسيط الرياضيه</p>
            <p>منوعات الوسيط الدولي</p>
            <p>اخبار الوسيط الدولي</p>
            <p>نقل و ملاحة الوسيط الدولي</p>
            <p>الوسيط الدولي الفني</p>
            <p>اخبار الفن الوسيط الدولي</p>
            <p>صفحه الوسيط الاخباريه</p>
            <p>صفحه الوسيط الدولي</p>
            <p>محليات الوسيط</p>
            <p>جريده الوسيط الدولي</p>
            <p>ثقافه الوسيط</p>
            <p>اخبار محليه</p>
            <p>النسخه الورقيه لجريده الوسيط الدولي</p>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>