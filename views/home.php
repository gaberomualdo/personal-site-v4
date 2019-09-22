<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_code_block.php" ?>
<?php include __DIR__ . "/assets/php/generate_blog_block.php" ?>

<?php $filename = "home"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <?php // blocks ?>
            <ul class="block_list">
                <?php // welcome card ?>
                <div class="block welcome">
                    <div class="content post_content">
                        <div class="picture">
                            <img class="default_view" alt="Welcome Photo" src="<?=$page_data["home_opening_card"]["card_image_url"]["laptop_view"]?>">
                        </div>
                        <div class="text">
                            <div class="top">
                                <div class="left">
                                    <img class="mobile_view" alt="Welcome Photo" src="<?=$page_data["home_opening_card"]["card_image_url"]["mobile_view"]?>">
                                </div>
                                <div class="right">
                                    <h1 class="catchy_header">
                                        <?php
                                        // create catchy header HTML

                                        // catchy header text
                                        $text_to_display = "Hey, I'm " . $site_details["author"]["name"] . "!";

                                        // text split into words
                                        $words_to_display = explode(" ", $text_to_display);

                                        // loop through words and echo generated HTML
                                        foreach ($words_to_display as $index => $word) {
                                            echo '<span class="word_container"><span class="word_animated" style="transition-delay: ' . (0.2 + (0.1 * $index)) . 's;">' . $word . '</span></span> ';
                                        }
                                        ?>
                                    </h1>
                                    <ul class="social_links animated" style="opacity: 0;">
                                        <?php
                                        foreach($site_details["author"]["social_urls"] as $social_url) {
                                            echo "<a href='" . $social_url["url"] . "' style='--theme-color: " . $social_url["theme_color"] . ";' target='_blank'>" . $social_url["name"] . "</a>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="text_content animated" style="opacity: 0;">
                                <?=$page_data["home_opening_card"]["card_HTML"]?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php // a buncha blocks ?>
                <?php
                foreach($page_data["blocks"] as $block) {
                    if($block["type"] == "code") {
                        echo generate_code_block($block);
                    } else if ($block["type"] == "blog") {
                        echo generate_blog_block($block);
                    }
                }
                ?>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>