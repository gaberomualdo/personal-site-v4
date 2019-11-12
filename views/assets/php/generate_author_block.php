<?php

function generate_author_block() {
    global $page_data;
    global $site_data;

    $social_links_HTML = "";
    foreach($site_details["author"]["social_urls"] as $social_url) {
        $social_links_HTML .= "<a href='" . $social_url["url"] . "' target='_blank'>" . $social_url["svg"] . "</a>";
    }

    return '
    <div class="side_block more_posts_block">
        <div class="content">
            <div class="top_area">
                <img class="left" alt="Fred Adams Picture" src="/api/content/static_files/profile_picture.png">
                <div class="right">
                    <h1>Fred Adams</h1>
                    <div class="social_links">
                        ' . $social_links_HTML . '
                    </div>
                </div>
            </div>
            <p>
            
            </p>
        </div>
    </div>
    ';
}

?>