<?php

$api_routes["/about/"] = function() {
    // declare global vars
    global $api_routes;
    
    $about_page_file_content = file_get_contents(__DIR__ . "/../content/about/about_page.markdown");
    
    $blog_posts = $api_routes["/blog/"]()["posts"];

    // choose 3 random posts to put in the "more from fred" section
    shuffle($blog_posts);
    $current_blog_post_index = 0;
    $more_posts = [];
    while(count($more_posts) < 3) {
        $current_more_post = $blog_posts[$current_blog_post_index];

        $current_more_post_url = "/blog/" . str_replace("-", "/", $current_more_post["last_updated"]) . "/" . $current_more_post["filename"] . "/";
        array_push($more_posts, [ "title" => $current_more_post["title"], "url" => $current_more_post_url, "thumbnail_url" => $current_more_post["thumbnail_url"] ]);
        
        $current_blog_post_index++;
    }

    $content = extractObjectFromMarkdownFile($about_page_file_content);
    $content["more_posts"] = $more_posts;
    return $content;
};

?>