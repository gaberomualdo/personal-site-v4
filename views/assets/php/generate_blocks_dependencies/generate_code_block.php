<?php

// this function takes in an object of a coding project and returns a "block" with all the project details, etc.

function generate_code_block($block) {
    // HTML to return
    $HTMLToReturn = "";

    // variables
    $block_title = $block["title"];
    $block_content = $block["content"];
    $block_url = "";
    $block_details = "";
    $main_link_extra_attributes = "";

    // calculate block url and details
    if(array_key_exists("blog_post_url", $block)) {
        $block_details = '
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M4 4v20h20v-20h-20zm18 18h-16v-13h16v13zm-3-3h-10v-1h10v1zm0-3h-10v-1h10v1zm0-3h-10v-1h10v1zm2-11h-19v19h-2v-21h21v2z"/></svg>
        <p><a href="' . $block["blog_post_url"] . '">Blog Post</a></p></li>
        ' . $block_details;
        $block_url = $block["blog_post_url"];
    }
    if(array_key_exists("github_url", $block)) {
        $block_details = '
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
        <p><a target="_blank" href="' . $block["github_url"] . '">GitHub</a></p></li>
        ' . $block_details;
        $block_url = $block["github_url"];
        $main_link_extra_attributes = "target='_blank'";
    }
    if(array_key_exists("website_url", $block)) {
        $block_details = '
        <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 17c2.269-9.881 11-11.667 11-11.667v-3.333l7 6.637-7 6.696v-3.333s-6.17-.171-11 5zm12 .145v2.855h-16v-12h6.598c.768-.787 1.561-1.449 2.339-2h-10.937v16h20v-6.769l-2 1.914z"/></svg>
        <p><a target="_blank" href="' . $block["website_url"] . '">Website</a></p></li>
        ' . $block_details;
        $block_url = $block["website_url"];
        $main_link_extra_attributes = "target='_blank'";
    }

    // block opening tag and photo class is added correspondingly
    $HTMLToReturn .= "<div class='post_block block";
    if(array_key_exists("thumbnail_url", $block) && array_key_exists("thumbnail_small_url", $block)) {
        $HTMLToReturn .= " photo'><a " . $main_link_extra_attributes . " class='image_container' href='" . $block_url . "'><img class='lazy_load' src='" . $block["thumbnail_small_url"] . "' data-src='" . $block["thumbnail_url"] . "' alt='" . $block_title . "'></a>";
    } else {
        $HTMLToReturn .= "'>";
    }

    // content
    $HTMLToReturn .= '
    <div class="content">
        <div class="top">
            <h1 class="title"><a ' . $main_link_extra_attributes . ' href="' . $block_url . '">' . $block_title . '</a></h1>
            <ul class="details">
                ' . $block_details . '
            </ul>
        </div>
        <div class="text_content post_content preview_text code_block_content">' . $block_content . '</div>
    </div>
    </div>
    ';

    return $HTMLToReturn;
}

?>