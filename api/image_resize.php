<?php
/*
This file takes in a GET variable of a relative path to an image (from root of site), and resizes and compresses that image, and returns it
*/

/*
Some code in this file was taken from ban-geoengineering on https://stackoverflow.com/questions/900207/return-a-php-page-as-an-image
*/

if ($_GET["p"] && file_exists(".." . $_GET["p"])) {
    // filename
    $filename_of_image = ".." . $_GET["p"];

    

    // set the content-type header and create image variable
    $image_info = getimagesize($filename_of_image);

    switch ($image_info[2]) {
        case IMAGETYPE_JPEG:
            header("Content-Type: image/jpeg");
            $image = imagecreatefromjpeg($filename_of_image);
            break;
        case IMAGETYPE_GIF:
            header("Content-Type: image/gif");
            $image = imagecreatefromgif($filename_of_image);
            break;
        case IMAGETYPE_PNG:
            header("Content-Type: image/png");
            $image = imagecreatefrompng($filename_of_image);
            break;
        default:
            header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
    }

    // resize image
    $targetPixelCount = 180000;

    if($image_info[0] * $image_info[1] > $targetPixelCount){
        $scaleFactor = ($image_info[0] * $image_info[1] / $targetPixelCount) ** 0.5;
        $image = imagescale($image, round($image_info[0] / $scaleFactor));
    }

    // enable alpha channel
    imagealphablending($image, true);
    imagesavealpha($image, true);

    // image quality variable
    $quality = 20;

    // write the image bytes to the client
    switch ($image_info[2]) {
        case IMAGETYPE_JPEG:
            imagejpeg($image, NULL, $quality);
            break;
        case IMAGETYPE_GIF:
            imagegif($image, NULL);
            break;
        case IMAGETYPE_PNG:
            imagepng($image, NULL, round(abs(($quality - 100) / 11.111111)));
    }

    imagedestroy($image);
} else {
    // image not found, return 404 error
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}

?>