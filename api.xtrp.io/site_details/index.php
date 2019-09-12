<?php
/*
This API route simply returns the site details file defined in /contents/. This file includes information on the site title, description, author name, etc.
*/

include_once("../api_template.php");

echo json_encode(json_decode(file_get_contents("../content/site_details.json")), JSON_PRETTY_PRINT);
?>