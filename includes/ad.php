<?php
$queryAds = mysqli_query($con, "SELECT `id`, `url`,`title`,`active` FROM `media` WHERE `type`=3 AND active = 1 ORDER BY `id` DESC LIMIT 1");
$resultAds = mysqli_fetch_array($queryAds);
if ($resultAds) {
    $id = $resultAds['id'];
}else{
    $query = mysqli_query($con, "UPDATE `media` SET `active`=1 WHERE `type`=3");
    $queryAds = mysqli_query($con, "SELECT `id`, `url`,`title`,`active` FROM `media` WHERE `type`=3 AND active = 1 ORDER BY `id` DESC LIMIT 1");
    $resultAds = mysqli_fetch_array($queryAds);
    $id = $resultAds['id'];
}
?>
<style>
    .wideBanner {
        height: 200px;
        object-fit: cover;
    }
</style>
<div class="row mb-5">
    <p><?php  ?></p>
    <img class="wideBanner col-12" src="admin/media/<?php echo ($resultAds['url']) ?>" alt="">
</div>
<?php mysqli_query($con, "UPDATE `media` SET `active`=0 WHERE `id`=" . $id); ?>