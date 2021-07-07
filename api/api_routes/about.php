<?php

$api_routes["/about/"] = function() {
    // declare global vars
    global $api_routes;
    
    $about_page_file_content = file_get_contents(__DIR__ . "/../content/about/about_page.markdown");

    $content = extractObjectFromMarkdownFile($about_page_file_content);
    return $content;
};

?>