<?php

include_once("../api_template.php");

// intro, along with list of projects
echo json_encode([
    "intro" => json_decode(file_get_contents("../../content/code/page_intro.json")),
    "projects" => sortListOfBlocksByDate(json_decode(getListOfExtractedJSONFromFilesInDirectory("../../content/code/")))
], JSON_PRETTY_PRINT);

?>