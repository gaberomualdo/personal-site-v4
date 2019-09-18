<?php

$api_routes["/resume/"] = function() {
    return [
        "content" => json_decode(file_get_contents(__DIR__ . "/../content/resume/resume_details.json"), true)
    ];
};
?>