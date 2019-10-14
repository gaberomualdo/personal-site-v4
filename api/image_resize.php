<?php
/*
This file takes in a GET variable of a relative path to an image (from root of site), and resizes and compresses that image, and returns it
*/

if ($_GET["p"] && file_exists($_GET["p"])) {

    //Set the content-type header as appropriate
    $image_info = getimagesize($file_out);
    switch ($image_info[2]) {
        case IMAGETYPE_JPEG:
            header("Content-Type: image/jpeg");
            break;
        case IMAGETYPE_GIF:
            header("Content-Type: image/gif");
            break;
        case IMAGETYPE_PNG:
            header("Content-Type: image/png");
            break;
       default:
            header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
            break;
    }

    // Set the content-length header
    header('Content-Length: ' . filesize($file_out));

    // Write the image bytes to the client
    readfile($file_out);

} else { // Image file not found
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}

?>