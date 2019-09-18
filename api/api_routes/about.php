<?php

$api_routes["/about/"] = function() {
    $about_page_file_content = file_get_contents(__DIR__ . "/../content/about/about_page.markdown");
    
    return extractObjectFromMarkdownFile($about_page_file_content);
};

?>