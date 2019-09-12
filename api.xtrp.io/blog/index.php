<?php

include_once("../api_template.php");

// intro, along with list of posts
echo json_encode([
    "intro" => json_decode(file_get_contents("../../content/blog/page_intro.json")),
    "posts" => sortListOfBlocksByDate(json_decode(getListOfExtractedJSONFromFilesInDirectory("../../content/blog/")))
], JSON_PRETTY_PRINT);

?>