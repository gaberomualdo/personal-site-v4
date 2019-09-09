<?php
/*
This file defines a template for each API route file, which includes a JSON header, and libraries used. It will be included at the beginning of each file that defines an API route.
*/

// JSON header
header("Content-Type: application/json");

// ParseDown for converting Markdown to HTML
include_once("../../resources/parsedown/Parsedown.php");
$Parsedown = new Parsedown();

// function for extracting JSON of Markdown HTML, and included metadata from contents of markdown file
function extractJSONFromMarkdownFile($file_contents) {
    global $Parsedown;
    
    // for xtrp.io, a convention is used where JSON can be written at the top of a file, without braces, with a "===" separating the JSON and contents of the file
    
    // variables for file parsed HTML, and JSON metadata
    $file_HTML = $Parsedown->text(explode("===", $file_contents)[1]);
    $file_metadata_JSON = json_decode("{" . explode("===", $file_contents)[0] . "}");
    
    // concatenate two variables into JSON and return
    $return_object = array_merge((array) $file_metadata_JSON, ["file_content" => $file_HTML]);
    return json_encode($return_object, JSON_PRETTY_PRINT);
}
?>