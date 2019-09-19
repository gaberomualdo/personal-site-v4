<div class="nav_background <?php
if($filename!="home") {
    if($filename!="blog_post"){
        echo "photo_" . $filename . "";
    } else if (array_key_exists("photo_url", $page_data)) {
        echo "photo_blog_post\" style=\"--photo-url: url('" . $page_data["photo_url"] . "')";
    }
}
?>"></div>

<nav <?php
if($filename!="home") {
    if($filename!="blog_post"){
        echo "class='photo'";
    } else if (array_key_exists("photo_url", $page_data)) {
        echo "class='photo'";
    }
}
?>>
    <h1 class="title">
        <?=$site_details["title"] ?>
    </h1>
    <ul class="links">
        <a href="/" <?php if($filename=="home"){ echo "class='active'"; } ?>>Home</a>
        <a href="/about/" <?php if($filename=="about"){ echo "class='active'"; } ?>>About</a>
        <a href="/blog/" <?php if($filename=="blog" || $filename=="blog_post"){ echo "class='active'"; } ?>>Blog</a>
        <a href="/code/" <?php if($filename=="code"){ echo "class='active'"; } ?>>Code</a>
        <a href="/resume/" <?php if($filename=="resume"){ echo "class='active'"; } ?>>Resume</a>
    </ul>
</nav>