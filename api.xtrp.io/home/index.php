<?php
/*
This API route returns any and all info for the homepage ("/"), such as info on the welcome card, etc.
*/

include_once("../api_template.php");


(function(){
    // variable for list of "blocks" (e.g. a blog post, project, about page, etc.)
    $total_blocks = [];

    // get values from every page, and add each block in every page to total blocks variable
    
    // arrays of blocks from all sections
    $blocks_from_each_section = [
        "blog" => json_decode(shell_exec("php ../blog/index.php"), true)["posts"],
        "code" => json_decode(shell_exec("php ../code/index.php"), true)["projects"]
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
    $home_opening_card = json_decode(file_get_contents("../content/home/home_opening_card.json"));
    
    // return everything as JSON
    echo json_encode([
        "home_opening_card" => $home_opening_card,
        "blocks" => $total_blocks
    ], JSON_PRETTY_PRINT);
})();
?>