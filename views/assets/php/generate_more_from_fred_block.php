<?php

function generate_more_from_fred_block() {
    global $page_data;

    $block_class = "block";
    
    $more_posts_HTML = "";

    $theme_colors = array("#2188ff", "#27ae60", "#e67e22");

    // loop through more posts and add HTML to var
    foreach($page_data["more_posts"] as $key => $more_post) {
        $more_posts_HTML .= "<a class='btn_text' style='--theme-color: " . $theme_colors[$key] . ";' href='" . $more_post["url"] . "'>" . $more_post["title"] . " &nbsp;&rarr;</a>";
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