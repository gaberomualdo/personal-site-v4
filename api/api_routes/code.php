<?php

$api_routes["/code/"] = function() {
    // intro, along with list of projects
    return [
        "intro" => json_decode(file_get_contents(__DIR__ . "/../content/code/page_intro.json"), true),
        // option 1: get projects from a list of markdown files:
        // "projects" => sortListOfBlocksByDate(getListOfExtractedObjectsFromFilesInDirectory(__DIR__ . "/../content/code/"))
        // option 2: get projects from a single JSON file:
        "projects" => json_decode(file_get_contents(__DIR__ . "/../content/code/projects.json"), true),
    ];
};
?>