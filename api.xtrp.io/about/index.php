<?php

include_once("../api_template.php");

(function(){
    $about_page_file_content = file_get_contents("../../content/about/about_page.markdown");

    echo extractJSONFromMarkdownFile($about_page_file_content);
})();

?>