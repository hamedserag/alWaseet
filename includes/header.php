<!--nav style-->

<!--nav-->
<link rel="stylesheet" href="css/nav.css">
<style>
    @media screen and (min-width: 956px) {
        .navContainer {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }
    }

    @media screen and (max-width: 956px) {
        nav * {
            background: #fff;
        }

        nav {
            border-bottom: 5px solid #EF4343;
        }

        .navRow {
            width: 100%;
        }

        .navbar-collapse,
        .categoryItem {
            background-color: #2c2c2c;
        }

        .navbar-nav {
            padding-right: 0;
        }

        .navbar {
            padding: 0;
        }

        .categoryItem a {
            background: #2c2c2c;
            color: #fff !important;
            font-size: 1.4rem;
        }

        .navbar-nav .dropdown-item {
            font-size: 1.1rem;
        }

        .burgerIcon,
        .navbar-toggler {
            background: #EF4343;
            color: #fff;
            border-radius: 0;
            padding-right: 20px;
            padding-left: 15px;
        }

        .navbar-brand {
            position: relative;
            float: left;
        }

        .navContainer {
            -ms-flex-pack: end !important;
            justify-content: flex-end !important;
        }

    }
</style>
<nav onmouseleave="hide()" class="navbar fixed-top navbar-expand-lg" id="nav">
    <div class="container-fluid navContainer">
        <div class="row navRow justify-content-between">
            <a class="navbar-brand d-inline" href="index.php"> <img src="images/logo.png" alt=""> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars burgerIcon"></i>
            </button>
            <div class="collapse navbar-collapse col-12 row" id="navbarResponsive">
                <ul class="navbar-nav row justify-content-center col-12">
                    <li class="categoryItem">
                        <a class="
            <?php if ($_GET['catid'] == null) {
                echo ("active");
            } ?>" href="index.php"> الرئيسية
                        </a>
                    </li>
                    <li class="categoryItem hideLarge">
                        <a class="" href="pdf.php"> النسخه الورقيه
                        </a>
                    </li>
                    <?php $query = mysqli_query($con, "select id,CategoryName from tblcategory");
                    while ($row = mysqli_fetch_array($query)) {
                        $catid = $row['id'];
                        $subQuery = mysqli_query($con, "SELECT SubCategoryId,Subcategory FROM tblsubcategory WHERE `CategoryId`='$catid'");
                        if ($subrow = mysqli_fetch_array($subQuery)) {
                    ?>
                            <li class="categoryItem hideSmall">
                                <div class="dropdown">
                                    <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>">
                                        <button onmouseover="show(<?php echo ($catid) ?>)" class="subcatDropdown">
                                            <?php echo htmlentities($row['CategoryName']); ?>
                                        </button>
                                    </a>
                                    <div class="dropdown-menu" id="menu<?php echo ($catid) ?>">
                                        <a class="col-md-3 col-sm-3 dropdown-item" href="sub-category.php?catid=<?php echo ($subrow['SubCategoryId']) ?>"> <?php echo ($subrow['Subcategory']) ?></a>
                                        <?php
                                        while ($subrow = mysqli_fetch_array($subQuery)) {
                                        ?>
                                            <a class="col-md-3 col-sm-3 dropdown-item" href="sub-category.php?catid=<?php echo ($subrow['SubCategoryId']) ?>"><?php echo ($subrow['Subcategory']) ?></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <li class="categoryItem hideLarge" id="<?php echo ($catid) ?>">
                                <a <?php if ($row['id'] != 32) {
                                        echo htmlentities("href='category.php?catid=" . $row['id'] . "'");
                                    } else {
                                        echo ("onclick='more()'");
                                    } ?>><?php echo htmlentities($row['CategoryName']); ?></a>
                            </li>
                        <?php
                        } else {
                        ?>
                            <li onmouseover="hide()" class="categoryItem" id="<?php echo ($catid) ?>">
                                <a href="category.php?catid=<?php echo htmlentities($row['id']) ?>"><?php echo htmlentities($row['CategoryName']); ?></a>
                            </li>
                    <?php
                        }
                    } ?>
                </ul>
                <ul class="navbar-nav row col-12" id="SubNav"></ul>
            </div>
        </div>
    </div>
</nav>

<script>
    function show(id) {
        if (window.innerWidth > 956) {
            document.getElementById("SubNav").innerHTML = document.getElementById("menu" + id).innerHTML;
            document.getElementById("SubNav").style.display = "flex";
        }
        if (id == 29) {}
    }

    function more() {
        document.getElementById("SubNav").innerHTML = document.getElementById("menu32").innerHTML;
        document.getElementById("SubNav").style.display = "flex";
    }

    function hide() {
        document.getElementById("SubNav").innerHTML = "";
        document.getElementById("SubNav").style.display = "none";
    }
</script>