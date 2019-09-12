<?php
$router->get("/about/", function(){
    // get data from api/about/
    $api_data = json_decode(file_get_contents("http://localhost:6000/api/about/"), true);
    var_dump($api_data);
});
?>