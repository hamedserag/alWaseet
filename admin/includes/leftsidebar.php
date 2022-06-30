            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Navigation</li>
                            <li class="has_sub">
                                <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> لوحة القيادة </span> </a>
                            </li>
                            <?php if ($_SESSION['rank'] == 0) { ?>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> القوائم </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="add-category.php">اضافه قائمه</a></li>
                                        <li><a href="manage-categories.php">تعديل القوائم</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span>القوائم المنسدله </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="add-subcategory.php">اضافه قائمه منسدله</a></li>
                                        <li><a href="manage-subcategories.php">تعديل القوائم المنسدله</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> الصفح </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="aboutus.php">صفحه عن الوسيط</a></li>
                                        <li><a href="contactus.php">صفحه تواصل معنا</a></li>
                                        <li><a href="terms.php">حقوق الاستخدام</a></li>
                                    </ul>
                                </li>
                            <?php } ?>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> الاخبار </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-post.php">اضافه خبر</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-posts.php">تعديل الاخبار</a></li><?php } ?>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="trash-posts.php">الاخبار المحذوفه</a></li><?php } ?>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> التعليقات </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="unapprove-comment.php">تعليقات منتظره التاكيد </a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-comments.php">تعليقات موكده</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> ارقام مهمه </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-importantnum.php">اضافه رقم مهم</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-importantnum.php">تعديل الارقام المهمه</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> الوظائف الشاغره </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-job.php">اضافه وظيقه شاغره</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-jobs.php">تعديل الوظائق الشاغره</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> مطبخ الوسيط </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="add-kitchenpost.php">اضافه وصفه</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-kitchen.php">تعديل الوصفات</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> اعلانات </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="view-advertisemembers.php">عرض طلبات الاعلانات</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-advertisemembers.php">تعديل طلبات الاعلانات</a></li><?php } ?>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="add-ad.php">اضافه اعلان</a></li><?php } ?>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-ads.php">تعديل الاعلانات</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> الاخبار العاجله </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="view-fastnewsusers.php">عرض مستخدمين الاخبار العاجله</a></li>
                                    <?php if ($_SESSION['rank'] == 0) { ?><li><a href="manage-fastnews.php">تعديل مستخدمين الاخبار العاجله</a></li><?php } ?>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> خدمات اخري </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="view-opinions.php">استطلاع الراي</a></li>
                                    <li><a href="add-pdf.php">اضافه النسخه الورقيه</a></li>
                                    <li><a href="add-vid.php">اضافه فيديو</a></li>
                                    <li><a href="add-pic.php">اضافه صوره</a></li>
                                    <li><a href="add-radio.php">اضافه راديو</a></li>
                                    <li><a href="add-tv.php">اضافه تلفزيون</a></li>
                                    <li><a href="add-books.php">اضافه كتاب / مقال</a></li>
                                </ul>
                            </li>
                            <?php if ($_SESSION['rank'] == 0) { ?>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> تعديل الخدمات الاخري </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="manage-vid.php">تعديل الفيديوهات</a></li>
                                        <li><a href="manage-pic.php">تعديل الصور</a></li>
                                        <li><a href="manage-radio.php">تعديل الراديو</a></li>
                                        <li><a href="manage-tv.php">تعديل التلفزيون</a></li>
                                        <li><a href="manage-books.php">تعديل الكتب  / المقالات</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                    <div class="help-box">
                        <h5 class="text-muted m-t-0">تحتاج مساعده ؟</h5>
                        <p>تواصل مع CodexX </p>
                        <p style="font-size:1rem;"><span class="text-custom">Email:</span> <br /> eng.hamedserag@gmail.com</p>
                    </div>
                </div>
                <!-- Sidebar -left -->
            </div>