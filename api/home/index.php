<?php
/*
This API route returns any and all info for the homepage ("/"), such as info on the welcome card, etc.
*/

header("Content-Type: application/json");

(function(){
    $home_opening_card = json_decode(file_get_contents("../../content/home/home_opening_card.json"));
    $home = ["home_opening_card" => $home_opening_card];
    echo json_encode($home, JSON_PRETTY_PRINT);
})();
?>