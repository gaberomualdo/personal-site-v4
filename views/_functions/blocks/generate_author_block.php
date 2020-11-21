<?php

function generate_author_block() {
    global $page_data;
    global $site_details;

    $social_links_HTML = "";
    foreach($site_details["author"]["social_urls"] as $social_url) {
        $social_links_HTML .= "<a href='" . $social_url["url"] . "' target='_blank'>" . $social_url["svg"] . "</a>";
    }

    return '
    <div class="side_block author_block">
        <div class="content">
            <div class="top_area">
                <div class="left">
                    <img alt="Gabriel Romualdo Picture" src="/api/content/static_files/profile_picture.png">
                </div>
                <div class="right">
                    <h1><a href="/about/">Gabriel Romualdo</a></h1>
                    <div class="social_links">
                        ' . $social_links_HTML . '
                    </div>
                </div>
            </div>
            <p>
                ' . $site_details["description"] . '
            </p>
            <ul class="link_list">
                <a href="/about/"><p>About</p></a>
                <a href="/blog/"><p>Blog</p></a>
                <a href="/projects/"><p>Projects</p></a>
                <a href="/resume/"><p>Résumé</p></a>
            </ul>
        </div>
    </div>
    ';
}

?>