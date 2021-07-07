<?php include __DIR__ . "/_config.php"; ?>
<?php include get_path_of_function("generate_blocks.php"); ?>
<?php include get_path_of_function("create_paginated_blocks.php"); ?>

<?php $filename = "home"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="container">
            <?php // blocks ?>
            <div class="block_list">
                <?php // welcome card ?>
                <div class="block welcome">
                    <div class="content">
                        <div class="picture">
                            <img class="default_view lazy_load" alt="Welcome Photo" src="<?=$page_data["home_opening_card"]["card_image_url"]["laptop_view_small"]?>" data-src="<?=$page_data["home_opening_card"]["card_image_url"]["laptop_view"]?>">
                        </div>
                        <div class="text">
                            <div class="top">
                                <div class="left">
                                    <img class="mobile_view lazy_load" alt="Welcome Photo" src="<?=$page_data["home_opening_card"]["card_image_url"]["mobile_view_small"]?>" data-src="<?=$page_data["home_opening_card"]["card_image_url"]["mobile_view"]?>">
                                </div>
                                <div class="right">
                                    <h1 class="catchy_header">
                                        <?php
                                        // create catchy header HTML

                                        // catchy header text
                                        $text_to_display = "Hi, I'm " . $site_details["author"]["name"] . "!";

                                        // text split into words
                                        $words_to_display = explode(" ", $text_to_display);

                                        // loop through words and echo generated HTML
                                        $animation_delay = "";

                                        foreach ($words_to_display as $index => $word) {
                                            $animation_delay = (0.2 + (0.1 * $index)) . 's';
                                            echo '<span class="word_container"><span class="word_animated" style="animation-delay: ' . $animation_delay . ';">' . $word . '</span></span> ';
                                        }
                                        ?>
                                    </h1>
                                    <ul class="social_links animated fadeIn" style="animation-delay: <?php echo $animation_delay; ?>;">
                                        <?php
                                        
                                        foreach($site_details["author"]["social_urls"] as $social_url) {
                                            echo "<a rel='noreferrer' href='" . $social_url["url"] . "' style='--theme-color: " . $social_url["theme_color"] . ";' target='_blank'>" . $social_url["name"] . "</a>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="text_content post_content animated fadeIn" style="animation-delay: <?php echo (0.2 + (0.1 * count($words_to_display))) ?>s;">
                                <?=$page_data["home_opening_card"]["card_HTML"]?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block_row">
                    <?php
                        foreach($page_data["home_block_row"] as $block) {
                            echo "<div class='block'>
                                <a href='" . $block['url'] . "'>
                                    <div class='top' style='--bg: url(" . $block['bg_url'] . ");'>
                                        <h1>" . $block['title'] . "</h1>
                                        <div class='icon'>
                                            <h3>View Now <span>&rarr;</span></h3>
                                        </div>
                                    </div>
                                    <div class='bottom'>
                                        <p>" . $block['content'] . "</p>
                                    </div>
                                </a>
                            </div>";
                        }
                    ?>
                </div>

                <?php // a buncha blocks ?>
                <?php
                $query_params = $request->getQueryParams();
                if(array_key_exists('page', $query_params) && is_numeric($query_params['page'])) {
                    $current_page = intval($query_params['page']);
                    create_paginated_blocks($page_data["blocks"], "blog", 15, $current_page);
                } else {
                    create_paginated_blocks($page_data["blocks"], "blog", 15, 1);
                }
                ?>
            </div>
        </div>
        
        <?php include get_path_of_include("footer.php") ?>
        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>