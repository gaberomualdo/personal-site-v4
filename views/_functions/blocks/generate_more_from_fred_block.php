<?php

function generate_more_from_fred_block() {
    global $page_data;
    
    $more_posts_HTML = "";

    // loop through more posts and add HTML to var
    // first two posts taken by the sidebar in blog posts
    foreach(array_slice($page_data["more_posts"], 2) as $key => $more_post) {
        $block_preview = $more_post["preview_text"];
        $preview_char_length = 150;
        if(strlen($block_preview) > $preview_char_length) {
            $block_preview = substr($block_preview, 0, $preview_char_length) . "...";
        }
        
        $more_posts_HTML .= "
        <div class='block' href='" . $more_post["url"] . "'>
            <a href='" . $more_post["url"] . "'>
                <div class='top'><img src='" . $more_post["thumbnail_url"] . "' alt='" . str_replace("'", "\'", $more_post["title"]) . "' /></div>
                <div class='bottom'>
                    <h1>" . $more_post["title"] . "</h1>
                    <p class='preview'>" . $block_preview . "</p>
                    <p class='meta'>" . date("F j, Y", strtotime($more_post["date"])) . " &nbsp;&bull;&nbsp; " . $more_post["min_read"] . " min read</p>
                </div>
            </a>
        </div>
        ";
    }
    
    return '
    <div class="more_posts_block">
        <div class="content">
            <h1 class="title">Read These Next</h1>
            <div class="block_row">
                ' . $more_posts_HTML . '
            </div>
        </div>
    </div>
    ';
}

?>