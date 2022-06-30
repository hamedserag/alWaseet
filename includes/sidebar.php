<link rel="stylesheet" href="css/sidebar.css">
<div class="col-md-3 mt-5 sideBar">

  <!--drop down-->
  <div class="dropdown dropdownSideBar mb-2" id="subcatcontainer">
    <!-- query to get elements -->
    <?php
    $query = mysqli_query($con, "SELECT Subcategory,SubCategoryId FROM tblsubcategory WHERE CategoryId='" . $_SESSION['catid'] . "'");
    ?>
    <!-- drop down button -->
    <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php $firstRow = mysqli_fetch_array($query);
      echo htmlentities($firstRow['Subcategory']) ?>
    </button>
    <!-- drop down items -->
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="subcatmenu">
      <?php if ($firstRow) { ?>
        <a class="dropdown-item firstRow subcategoryElement" href="sub-category.php?catid=<?php echo htmlentities($firstRow['SubCategoryId']) ?>" ; ?><?php echo htmlentities($firstRow['Subcategory']); ?> </a>
      <?php
      }
      $rowcount = mysqli_num_rows($query);
      while ($row = mysqli_fetch_array($query)) { ?>
        <a class="dropdown-item subcategoryElement" href="sub-category.php?catid=<?php echo htmlentities($row['SubCategoryId']) ?>" ; ?><?php echo htmlentities($row['Subcategory']); ?> </a>
      <?php } ?>
    </div>
  </div>

  <script>
    var subcatmenu = document.querySelectorAll(".subcategoryElement");
    if (subcatmenu.length == 0) {
      document.getElementById("subcatcontainer").style.display = "none";
    }
  </script>
  <!--end drop down-->



  <!-- Search Widget -->
  <div class="container search" id="searchBar">
    <div class="row justify-content-center">
      <form name="search" action="search.php" method="post">
        <div class="input-group">
          <input type="text" name="searchtitle" class="form-control" required>
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">ابحث</button>
          </span>
        </div>
      </form>
    </div>
  </div>
  <!--end of Search Widget -->

  <!-- new news Widget -->
  <div class="container mt-4 newNews">
    <div class="row pr-3 pt-2 justify-content-end">
      <p class="headerNN"> اخر الاخبار </p>
    </div>
    <div class="row newNewsContent justify-content-end pr-4 pl-4">
      <?php
      $query = mysqli_query($con, "SELECT * FROM `tblposts` ORDER BY id DESC LIMIT 8");
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <a class="col-12" href="news-details.php?nid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['PostTitle']); ?></a>
      <?php } ?>
    </div>
  </div>
  <!--most commented-->
  <div class="container mt-4 newNews">
    <div class="row pr-3 pt-2 justify-content-end">
      <p class="headerNN"> الاكثر تعليقا </p>
    </div>
    <div class="row newNewsContent justify-content-end pr-4 pl-4">
      <?php
      $postCountMC = 7;
      $posts = 0;
      $query = mysqli_query($con, "SELECT postId , COUNT('postId') AS value_occurrence FROM tblcomments GROUP BY postId ORDER BY value_occurrence DESC LIMIT " . $postCountMC);
      while ($row = mysqli_fetch_array($query)) {
        $titleQuery = mysqli_query($con, "SELECT PostTitle FROM tblposts WHERE id=" . $row['postId']);
        $titleRes = mysqli_fetch_array($titleQuery);
        showLinks($row['postId'], $titleRes['PostTitle']);
        if ($posts >= $postCountMC) {
          break;
        }
        $posts++;
      }
      ?>
    </div>
  </div>

  <!--most read-->
  <div class="container mt-4 newNews">
    <div class="row pr-3 pt-2 justify-content-end">
      <p class="headerNN"> الاكثر قراءه </p>
    </div>
    <div class="row newNewsContent justify-content-end pr-4 pl-4">
      <?php
      $postCountMC = 7;
      $query = mysqli_query($con, "SELECT `id`,`PostTitle`,`count` FROM `tblposts` ORDER BY count DESC");
      for ($i = 0; $i < $postCountMC; $i++) {
        $row = mysqli_fetch_array($query);
        if ($row['PostTitle'] != "") {
          showLinks($row['id'], $row['PostTitle']);
        }
      }
      ?>
    </div>
  </div>
  <?php

  //show links function
  function showLinks($id, $title)
  {
  ?>
    <a class="col-12" href="news-details.php?nid=<?php echo htmlentities($id) ?>"><?php echo htmlentities($title); ?></a>
  <?php
  }
  ?>
  <style>
    .opinions {
      height: 120px;
    }

    .cmtBtn {
      background-color: #EF4343;
      color: #fff;
    }
  </style>
  <script>
    var str = `<div class='row pr-3 pt-2 justify-content-end'><p class='headerService'>شكرا علي مشاركتكم في استطلاع الراي</p></div>`
  </script>
  <div class="container mt-4 newNews opinions" id="opinions">
    <div class="row pr-3 pt-2 justify-content-end">
      <p class="headerService"> هل تتوقع موجه رابعه من فيروس كورونا </p>
      <form action="" method="post">
        <input class="cmtBtn btn" type="submit" name="btn_submit" value="لا اهتم" />
        <input class="cmtBtn btn" type="submit" name="btn_submit" value="لا" />
        <input class="cmtBtn btn" type="submit" name="btn_submit" value="نعم" />
      </form>
    </div>
    <?php

    if (isset($_REQUEST['btn_submit'])) {

      switch ($_REQUEST['btn_submit']) {
        case "نعم":
          mysqli_query($con, "INSERT INTO `opinions`(`answer`) VALUES ('0')");
          break;
        case "لا":
          mysqli_query($con, "INSERT INTO `opinions`(`answer`) VALUES ('1')");
          break;
        case "لا اهتم":
          mysqli_query($con, "INSERT INTO `opinions`(`answer`) VALUES ('2')");
          break;
      }
      echo ("<script> document.getElementById('opinions').innerHTML = str ;document.getElementById('opinions').style.height = '75px';</script>");
    }
    ?>
  </div>
  <!-- services Widget -->
  <div class="container mt-4 services">
    <div class="row pr-3 pt-2 justify-content-end">
      <p class="headerService"> خدمات الوسيط </p>
    </div>
    <div class="row servicesContent justify-content-end pr-4 pl-4">
      <a class="col-12" href="adhan.php">مواقيت الصلاه</a>
      <a class="col-12" href="weather.php?cityId=0">درجات الحراره</a>
      <a class="col-12" href="exchangeRates.php?curId=43">اسعار العملات</a>
      <a class="col-12" href="goldRate.php">اسعار الذهب</a>

      <a class="col-12" href="pdf.php">النسخه الورقيه</a>
      <a class="col-12" href="jobs.php">وظائف شاغره</a>
      <a class="col-12" href="kitchen.php">مطبخ الوسيط</a>
      <a class="col-12" href="importantnumbers.php">ارفام تهمك</a>
      <a class="col-12" href="advertise.php">اعلن معنا</a>
      <a class="col-12" href="fastnews.php">اشترك فى خدمة الأخبار العاجلة</a>
      <a class="col-12" href="searchwords.php">كلمات دلاليه</a>
      <a class="col-12" href="pic.php">صور الوسيط</a>
      <a class="col-12" href="vid.php">فيديوهات الوسيط</a>
      <a class="col-12" href="radio.php">راديو الوسيط </a>
      <a class="col-12" href="tv.php">تلفزيون الوسيط </a>
      <a class="col-12" href="books.php"> كتاب و مقالات </a>
    </div>
  </div>
  <!--end of Side Widget -->
  <!--ad-->
  <div class="container mt-4 ad">

  </div>
</div>