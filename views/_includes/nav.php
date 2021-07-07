<div class="nav_background <?php
if($filename!="home" && $filename!="error" && $filename!="links") {
    if($filename!="blog_post"){
        echo "lazy_load photo photo_" . $filename . "\" style=\"--photo-url: url('/views/assets/img/" . $filename . "_page.jpg')";
    } else if (array_key_exists("photo_url", $page_data)) {
        echo "photo photo_blog_post\" style=\"--photo-url: url('" . $page_data["photo_url"] . "')";
    }
}
?>"></div>

<nav class='not_top <?php
if($filename!="home" && $filename!="error" && $filename!="links") {
    if($filename!="blog_post"){
        echo "photo";
    } else if (array_key_exists("photo_url", $page_data)) {
        echo "photo";
    }
}
?>'>

    <script>
        document.querySelector("body > nav").classList.remove("not_top");
    </script>
    
    <a class="title" href="/">
        <?=$site_details["title"] ?>
    </a>
    
    <button class="mobile_link_toggler" aria-label="Toggle Links">
        <svg class="menu_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>
        <svg class="close_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M23 20.168l-8.185-8.187 8.185-8.174-2.832-2.807-8.182 8.179-8.176-8.179-2.81 2.81 8.186 8.196-8.186 8.184 2.81 2.81 8.203-8.192 8.18 8.192z"/></svg>
    </button>

    <ul class="links">
        <a href="/" <?php if($filename=="home"){ echo "class='active'"; } ?>>Home</a>
        <a href="/about/" <?php if($filename=="about"){ echo "class='active'"; } ?>>About</a>
        <a href="/blog/" <?php if($filename=="blog"){ echo "class='active'"; } ?>>Blog</a>
        <a href="/projects/" <?php if($filename=="code"){ echo "class='active'"; } ?>>Projects</a>
        <a href="/resume/" <?php if($filename=="resume"){ echo "class='active'"; } ?>>Résumé</a>
    </ul>
</nav>
<div class="nav_mobile_overlay"></div>
