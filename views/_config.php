<?php

// declare globals
global $site_details;
global $page_details;
global $page_data;
global $filename;
global $request;

global $functions_dir;
global $includes_dir;

global $root_dir;

// includes and functions directories
$functions_dir = "/views/_functions";
$includes_dir = "/views/_includes";

// get root dir and set variable
$ROOT_DIR_DEFAULT = "/home/xtrp/xtrp.io";

(function() {
    global $root_dir;

    // keep on going up levels (cap 50 levels up) until finds this_is_root.txt
    $current_root_dir = __DIR__ . "/";
    
    $level = 0;
    for($level = 0; $level < 50; $level++) {
        $current_root_dir = $current_root_dir . "../";
        $this_is_root_test_path = $current_root_dir . "this_is_root.txt";

        if(file_exists($this_is_root_test_path)) {
            break;
        }
    }

    // if failed, revert to fallback hard coded value
    if($level == 50) {
        $current_root_dir = $ROOT_DIR_DEFAULT;
    }

    // resolve "../" to real path
    $root_dir = realpath($current_root_dir);
})();

// function to include file from includes directory
function get_path_of_include($includes_file) {
    global $includes_dir;
    return resolve_from_root($includes_dir . "/" . $includes_file);
}

// function to include file from functions directory
function get_path_of_function($functions_file) {
    global $functions_dir;
    return resolve_from_root($functions_dir . "/" . $functions_file);
}

// function to resolve path from root directory
function resolve_from_root($path) {
    global $root_dir;
    return $root_dir . $path;
}

?>