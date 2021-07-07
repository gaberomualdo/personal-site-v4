<?php
/*
This file defines a template for each API route file, and libraries used. It includes all necessary api PHP files.
*/

// ParseDown for converting Markdown to HTML
include_once __DIR__ . "/resources/parsedown/Parsedown.php";
include_once __DIR__ . "/resources/parsedown/ParsedownExtra.php";

$Parsedown = new ParsedownExtra();

// function for extracting object of Markdown HTML, and included metadata from contents of markdown file
function extractObjectFromMarkdownFile($file_contents) {
    global $Parsedown;
    
    // for this site, a convention is used where JSON can be written at the top of a file, without braces, with a "===" separating the JSON and contents of the file
    
    // variables for file parsed HTML, and JSON metadata
    $file_HTML = $Parsedown->text(explode("===", $file_contents)[1]);
    $file_metadata_JSON = json_decode("{" . explode("===", $file_contents)[0] . "}");
    
    // concatenate two variables into JSON and return
    $return_object = array_merge((array) $file_metadata_JSON, ["content" => $file_HTML]);
    return $return_object;
}

// function for extracting object from all files in given directory, and returning a JSON array of those extracted JSON
function getListOfExtractedObjectsFromFilesInDirectory($directory) {
    // list of extracted objects and filenames
    $extracted_objects = [];
    $objects_to_extract_filenames = scandir($directory);
    
    // loop through filenames and extract content and add to array if appropriate
    foreach($objects_to_extract_filenames as $object_to_extract_filename) {
        // if filename ends with ".markdown", add to array
        $endString = ".markdown";

        if(substr($object_to_extract_filename, -(strlen($endString))) === $endString) {
            array_push($extracted_objects, extractObjectFromMarkdownFile( file_get_contents($directory . $object_to_extract_filename)));
        }
    }
    
    // return array as JSON
    return $extracted_objects;
}

// function for looping through a list of "blocks", and sorting them in order from most recent
function sortListOfBlocksByDate($blocks) {
    // this function uses the QuickSort Algorithm.
    if(count($blocks) <= 1) {
        return $blocks;
    }else {
        $pivot = $blocks[0];
        
        $itemsAbovePivot = [];
        $itemsBelowPivot = [];

        for($i = 1; $i < count($blocks); $i++) {
            $block = $blocks[$i];
            if( strtotime( $pivot["last_updated"] ) > strtotime( $block["last_updated"] ) ) {
                array_push($itemsAbovePivot, $block);
            }else {
                array_push($itemsBelowPivot, $block);
            }
        }

        return array_merge( sortListOfBlocksByDate($itemsBelowPivot), [$pivot], sortListOfBlocksByDate($itemsAbovePivot) );
    }
}

// variable for api routes
$api_routes = [];

// include all api files
include_once __DIR__ . "/api_routes/about.php";
include_once __DIR__ . "/api_routes/blog.php";
include_once __DIR__ . "/api_routes/code.php";
include_once __DIR__ . "/api_routes/resume.php";
include_once __DIR__ . "/api_routes/home.php";
include_once __DIR__ . "/api_routes/site_details.php";

?>