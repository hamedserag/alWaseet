<!--nav style-->


<!--nav-->
<link rel="stylesheet" href="css/nav.css">
<style>
*{
  transition: 1s;
}
  .subcatDropdown {
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
    border-right: 1px solid rgba(96, 96, 96, 0.3);
  }
</style>
<nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light">
  <div class="container">
    <div class="row navRow justify-content-between">
      <a class="navbar-brand d-inline pl-3" href="index.php"> <img src="images/logo.png" alt=""> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-12" id="navbarResponsive">
        <ul class="navbar-nav row justify-content-start">
          <li class="categoryItem">
            <a href="index.php"> الرئيسية </a>
          </li>
          <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
          while ($row = mysqli_fetch_array($query)) {
            $catid = $row['id'];
            $subQuery = mysqli_query($con, "SELECT SubCategoryId,Subcategory FROM tblsubcategory WHERE `CategoryId`='$catid'");
            if ($subrow = mysqli_fetch_array($subQuery)) {
          ?>
              <li class="categoryItem">
                <div class="dropdown">
                  <button class="subcatDropdown <?php if ($catid == $_GET['catid']) {
                                                  echo ("active");
                                                } ?>" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlentities($row['CategoryName']); ?>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="sub-category.php?catid=<?php echo ($subrow['SubCategoryId']) ?>"><button class="dropdown-item" type="button"> <?php echo ($subrow['Subcategory']) ?> </button></a>
                    <?php
                    while ($subrow = mysqli_fetch_array($subQuery)) {
                    ?>
                      <a href="sub-category.php?catid=<?php echo ($subrow['SubCategoryId']) ?>"><button class="dropdown-item" type="button"> <?php echo ($subrow['Subcategory']) ?> </button></a>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </li>
              
            <?php
            } else {
            ?>
              <li class="categoryItem">
                <a class="<?php if ($catid == $_GET['catid']) {
                            echo ("active");
                          } ?>" href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
              </li>
          <?php
            }
          } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>