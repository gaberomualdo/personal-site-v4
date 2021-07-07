<?php
/*
This API route returns any and all info for the homepage ("/"), such as info on the welcome card, etc.
*/

$api_routes["/home/"] = function() {
    // declare global vars
    global $api_routes;

    // variable for list of "blocks" (e.g. a blog post, project, about page, etc.)
    $total_blocks = $api_routes["/blog/"]()["posts"];

    // sort blocks in total blocks variable by last updated time
    $total_blocks = sortListOfBlocksByDate($total_blocks);
    
    // opening card
    $home_opening_card = json_decode(file_get_contents(__DIR__ . "/../content/home/home_opening_card.json"), true);
    
    // block row
    $home_block_row = json_decode(file_get_contents(__DIR__ . "/../content/home/home_block_row.json"), true);

    // return everything
    return [
        "home_opening_card" => $home_opening_card,
        "home_block_row" => $home_block_row,
        "blocks" => $total_blocks
    ];
};
?>