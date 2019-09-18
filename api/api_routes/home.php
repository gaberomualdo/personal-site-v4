<?php
/*
This API route returns any and all info for the homepage ("/"), such as info on the welcome card, etc.
*/

$api_routes["/"] = function() {
    // declare global vars
    global $api_routes;

    // variable for list of "blocks" (e.g. a blog post, project, about page, etc.)
    $total_blocks = [];

    // get values from every page, and add each block in every page to total blocks variable
    
    // arrays of blocks from all sections
    $blocks_from_each_section = [
        "blog" => $api_routes["/blog/"]()["posts"],
        "code" => $api_routes["/code/"]()["projects"]
    ];

    // loop through list of block sections 
    foreach($blocks_from_each_section as $block_name => $blocks_list) {
        // loop through blocks from current block section and add to $total_blocks array
        foreach($blocks_list as $block) {
            $block["type"] = $block_name;
            array_push($total_blocks, $block);
        }
    }

    // sort blocks in total blocks variable by last updated time
    $total_blocks = sortListOfBlocksByDate($total_blocks);
    
    // opening card
    $home_opening_card = json_decode(file_get_contents(__DIR__ . "/../content/home/home_opening_card.json"), true);
    
    // return everything
    return [
        "home_opening_card" => $home_opening_card,
        "blocks" => $total_blocks
    ];
};
?>