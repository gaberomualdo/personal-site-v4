<?php

function generate_more_from_fred_block($side_block) {
    global $page_data;

    $block_class = "block";
    if($side_block) {
        $block_class = "side_block";
    }
    
    $more_posts_HTML = "";

    // loop through more posts and add HTML to var
    foreach($page_data["more_posts"] as $more_post) {
        $more_posts_HTML .= "<a href='" . $more_post["url"] . "'>" . $more_post["title"] . "</a>";
    }
    
    return '
    <div class="' . $block_class . ' more_posts_block">
        <div class="content">
            <h1 class="title">More from Fred</h1>
            <ul class="link_list">
                ' . $more_posts_HTML . '
            </ul>
        </div>
    </div>
    ';
}

?>