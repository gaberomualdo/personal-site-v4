<?php

// this function takes in an object of a blog post and returns a "block" with all the blog post details, etc.

function generate_blog_block($block, $full_block = false) {
    // define global variables
    global $site_details;

    // HTML to return
    $HTMLToReturn = "";

    // variables
    $block_title = $block["title"];
    $block_url = "/blog/" . str_replace("-", "/", $block["last_updated"]) . "/" . $block["filename"] . "/";

    $block_preview;

    if(!$full_block) {
        $block_preview = strip_tags($block["content"]);
        $block_preview = str_replace(PHP_EOL, ' ', $block_preview);
        if(strlen($block_preview) > 400) {
            $block_preview = substr($block_preview, 0, 400) . "... <a class='expand_post_preview' href='" . $block_url . "'>(more)</a>";
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

    // text content class is "preview_text" if not full block
    $text_content_class = "";
    if(!$full_block) {
        $text_content_class = "preview_text";
    }

    // content class is "less_padding_on_mobile" if full block
    $content_class = "";
    if($full_block) {
        $content_class = "less_padding_on_mobile";
    }

    // block opening tag and photo class is added correspondingly
    $HTMLToReturn .= "<div class='post_block block";
    if(array_key_exists("thumbnail_url", $block) && !$full_block) {
        $HTMLToReturn .= " photo'><a class='image_container' href='" . $block_url . "'><img src='" . $block["thumbnail_url"] . "' alt='" . $block_title . "'></a>";
    } else {
        $HTMLToReturn .= "'>";
    }

    // content
    $HTMLToReturn .= '
    <div class="content with_label ' . $content_class . '">
        <a class="type_label blog" href="/blog/">blog</a>
        <div class="top">
            ' . $block_title_HTML . '
            <ul class="details">
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>
                <p>' . $site_details["author"]["name"] . '</p>
            </li>
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 12v-6h-2v8h7v-2h-5z"/></svg>
                    <p>' . $block_date . '</p>
                </li>
            </ul>
        </div>
        <div class="text_content post_content ' . $text_content_class .'">' . $block_preview . '</div>
    </div>
    </div>
    ';

    return $HTMLToReturn;
}

?>