<?php

// this function takes in an object of a blog post and returns a "block" with all the blog post details, etc.

function generate_blog_block($block, $full_block = false) {
    // define global variables
    global $site_details;

    // determine whether blog post is 'new' or not
    
    $block_is_new = false;
    $new_days_cap = 10;
    $s_in_day = (60 * 60 * 24);

    $current_time = time();
    $block_time = strtotime($block["last_updated"]);
    if(($current_time - $block_time) / $s_in_day < $new_days_cap) {
        $block_is_new = true;
    }

    // HTML to return
    $HTMLToReturn = "";

    // variables
    $block_title = $block["title"];
    $block_url = "/blog/" . str_replace("-", "/", $block["last_updated"]) . "/" . $block["filename"] . "/";

    $block_preview;

    if(!$full_block) {
        $block_preview = $block["preview_text"];
        if(strlen($block_preview) > 170) {
            $block_preview = substr($block_preview, 0, 170) . "...";
        }
        $block_preview = "<p>" . $block_preview . "</p>";
    } else {
        $block_preview = $block["content"];
    }
    
    $block_date = date("F j, Y", strtotime($block["last_updated"]));

    $block_min_read = ceil(str_word_count(strip_tags($block["content"])) / 275);

    $block_title_HTML = $block_title;
    if(!$full_block) {
        $block_title_HTML = '<a href="' . $block_url . '">' . $block_title . '<span class="go-icon">&rarr;</span></a>';
    }
    $block_title_HTML = '<h1 class="title">' . $block_title_HTML . '</h1>';

    // content class is "blog_post_full_content" if full block
    $content_class = "";
    if($full_block) {
        $content_class = "blog_post_full_content";
    }

    // author detail section is filled if full block
    $author_detail_section = "";
    if($full_block) {
        // this section is not necessary for now.
        // $author_detail_section = '<li>
        //     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"></path></svg>
        //     <p>' . $site_details["author"]["name"] . '</p>
        // </li>';
    }

    // min read detail section is filled if not full block
    $min_read_detail_section = '<li>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18.513 7.119c.958-1.143 1.487-2.577 1.487-4.036v-3.083h-16v3.083c0 1.459.528 2.892 1.487 4.035l3.086 3.68c.567.677.571 1.625.009 2.306l-3.13 3.794c-.936 1.136-1.452 2.555-1.452 3.995v3.107h16v-3.107c0-1.44-.517-2.858-1.453-3.994l-3.13-3.794c-.562-.681-.558-1.629.009-2.306l3.087-3.68zm-4.639 7.257l3.13 3.794c.652.792.996 1.726.996 2.83h-1.061c-.793-2.017-4.939-5-4.939-5s-4.147 2.983-4.94 5h-1.06c0-1.104.343-2.039.996-2.829l3.129-3.793c1.167-1.414 1.159-3.459-.019-4.864l-3.086-3.681c-.66-.785-1.02-1.736-1.02-2.834h12c0 1.101-.363 2.05-1.02 2.834l-3.087 3.68c-1.177 1.405-1.185 3.451-.019 4.863z"/></svg>
        <p>' . $block_min_read . ' min read</p>
    </li>';

    // block opening tag and photo class is added correspondingly
    $include_image = array_key_exists("thumbnail_url", $block) && array_key_exists("thumbnail_small_url", $block) && !$full_block;
    $HTMLToReturn .= "<div class='block post_block";
    if($include_image) {
        $HTMLToReturn .= " photo'>";
        $HTMLToReturn .= "<a class='image_container' href='" . $block_url . "'><img class='lazy_load' src='" . $block["thumbnail_small_url"] . "' data-src='" . $block["thumbnail_url"] . "' alt='" . $block_title . "'></a>";
    } else {
        $HTMLToReturn .= "'>";
    }

    // content
    $HTMLToReturn .= '
    <div class="content ' . $content_class . '">
        <div class="top">
            ' . $block_title_HTML . '
            <ul class="details">
                ' . $author_detail_section . '
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm1 12v-6h-2v8h7v-2h-5z"/></svg>
                    <p>' . $block_date . '</p>
                </li>
                ' . $min_read_detail_section . '
                ' . ($block_is_new ? '<li class="type_label new">New</li>' : '') . '
            </ul>
        </div>
        <div class="text_content post_content">' . $block_preview . '</div>
    </div>';

    $HTMLToReturn .= "</div>";

    return $HTMLToReturn;
}

?>
