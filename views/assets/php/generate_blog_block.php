<?php

// this function takes in an object of a blog post and returns a "block" with all the blog post details, etc.

function generate_blog_block($block, $full_block = false) {
    // HTML to return
    $HTMLToReturn = "";

    // block opening tag and photo class is added correspondingly
    $HTMLToReturn .= "<div class='post_block block";
    if(array_key_exists("photo_url", $block) && !$full_block) {
        $HTMLToReturn .= " photo'><div class='image_container'><img src='" . $block["photo_url"] . "' alt='" . $block["title"] . "'></div>";
    } else {
        $HTMLToReturn .= "'>";
    }

    // variables
    $block_title = $block["title"];
    $block_url = "/blog/" . str_replace("-", "/", $block["last_updated"]) . "/" . $block["filename"] . "/";

    $block_preview;

    if(!$full_block) {
        $block_preview = strip_tags($block["content"]);
        $block_preview = str_replace(PHP_EOL, ' ', $block_preview);
        if(strlen($block_preview) > 500) {
            $block_preview = substr($block_preview, 0, 500) . "... <a href='" . $block_url . "'>(more)</a>";
        }
        $block_preview = "<p>" . $block_preview . "</p>";
    } else {
        $block_preview = $block["content"];
    }
    
    $block_date = date("F j, Y", strtotime($block["last_updated"]));

    $block_title_HTML = '<h1 class="title">' . $block_title . '</h1>';
    if(!$full_block) {
        $block_title_HTML = '<h1 class="title"><a href="' . $block_url . '">' . $block_title . '</a></h1>';
    }

    // content
    $HTMLToReturn .= '
    <div class="content">
        <div class="type_label blog">blog</div>
        <div class="top">
            ' . $block_title_HTML . '
            <ul class="details">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 12v-6h-2v8h7v-2h-5z"/></svg>
                    <p>' . $block_date . '</p>
                </li>
            </ul>
        </div>
        ' . $block_preview . '
    </div>
    </div>
    ';

    return $HTMLToReturn;
}

?>