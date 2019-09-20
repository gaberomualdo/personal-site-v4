<?php

// this function takes in an object of a blog post and returns a "block" with all the blog post details, etc.

function generate_blog_block($block) {
    // HTML to return
    $HTMLToReturn = "";

    // block opening tag and photo class is added correspondingly
    $HTMLToReturn .= "<div class='block";
    if(array_key_exists("photo_url", $block)) {
        $HTMLToReturn .= " photo'><img src='" . $block["photo_url"] . "'>";
    } else {
        $HTMLToReturn .= "'>";
    }

    // variables
    $block_title = $block["title"];
    $block_url = "/blog/" . str_replace("-", "/", $block["last_updated"]) . "/" . $block["filename"] . "/";

    $block_preview = strip_tags($block["content"]);
    $block_preview = str_replace(PHP_EOL, ' ', $block_preview);
    if(strlen($block_preview) > 500) {
        $block_preview = substr($block_preview, 0, 500) . "... <a href='" . $block_url . "'>(more)</a>";
    }
    
    $block_date = date("F j, Y", strtotime($block["last_updated"]));

    // content
    $HTMLToReturn .= '
    <div class="content">
        <div class="type_label blog">blog</div>
        <div class="top">
            <a class="title" href="' . $block_url . '">' . $block_title . '</a>
            <ul class="details">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 12v-6h-2v8h7v-2h-5z"/></svg>
                    <p>' . $block_date . '</p>
                </li>
            </ul>
        </div>
        <p>' . $block_preview . '</p>
    </div>
    </div>
    ';

    return $HTMLToReturn;
}

?>