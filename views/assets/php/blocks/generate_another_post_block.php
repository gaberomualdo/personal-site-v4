<?php

function generate_another_post_block($ind) {
    global $page_data;

    $post = $page_data["more_posts"][$ind];
    $post_title = $post["title"];
    if(strlen($post_title) > 70) {
        $post_title = substr($post_title, 0, 70) . "...";
    }
    
    return '
    <a href="' . $post["url"] . '" class="side_block another_post_block">
        <div class="image_container">
            <img alt="' . $post["title"] . '" src="' . $post["thumbnail_url"] . '">
        </div>
        <div class="content">
            <h1 class="title">' . $post_title . '</h1>
        </div>
    </a>
    ';
}

?>