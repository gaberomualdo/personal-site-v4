<?php // prism scripts, only add for blog_post page ?>
<?php
if($filename == "blog_post") {
    echo '<script src="/views/resources/prism/prism.js"></script>';
}
?>

<?php // main scripts ?>
<script src="/views/assets/js/script.js?v=3"></script>
<?php
// only add page js if exists
if(in_array($filename . ".js", scandir(dirname(__FILE__) . "/../js/pages/"))) {
    echo '<script src="/views/assets/js/pages/' . $filename . '.js?v=3"></script>';
}
?>
<?php // lazyload scripts ?>
<script src="/views/assets/js/lazyload.js?v=3"></script>

<?php // cookies banner ?>
<script src="https://private.xtrp.io/projects/cookies_insert/cookiesBanner.js"></script>
<script>
__createCookiesBanner(925, 16, "xtrp.io");
</script>
