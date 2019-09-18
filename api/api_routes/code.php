<?php

$api_routes["/code/"] = function() {
    // intro, along with list of projects
    return [
        "intro" => json_decode(file_get_contents(__DIR__ . "/../content/code/page_intro.json"), true),
        "projects" => sortListOfBlocksByDate(getListOfExtractedObjectsFromFilesInDirectory(__DIR__ . "/../content/code/"))
    ];
};
?>