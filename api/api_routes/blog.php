<?php

$api_routes["/blog/"] = function() {
    // intro, along with list of posts
    return [
        "intro" => json_decode(file_get_contents(__DIR__ . "/../content/blog/page_intro.json"), true),
        "posts" => sortListOfBlocksByDate(getListOfExtractedObjectsFromFilesInDirectory(__DIR__ . "/../content/blog/"))
    ];
};
?>