<?php
/*
This API route simply returns the site details file defined in /contents/. This file includes information on the site title, description, author name, etc.
*/
$api_routes["/site_details/"] = function() {
    return json_decode(file_get_contents(__DIR__ . "/../content/site_details.json"), true);
};
?>