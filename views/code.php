<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_code_block.php" ?>

<?php $filename = "code"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <?php // blocks ?>
            <ul class="block_list">
                <?php // intro card ?>
                <div class="block intro">
                    <div class="content post_content">
                        <h1 class="big_title title">Code</h1>
                        <?php echo $page_data["intro"]["content"] ?>
                    </div>
                </div>

                <?php // projects blocks ?>
                <?php
                // if there are less than 15, simply display; if not, display 15, and then use client-side JS to progressively show more
                if(count($page_data["projects"]) <= 15) {
                    foreach($page_data["projects"] as $block) {
                        echo generate_code_block($block);
                    }
                }else {
                    for($i = 0; $i < 15; $i++) {
                        echo generate_code_block($page_data["projects"][$i]);
                    }

                    echo "<script>let postBlocksToLoadOnScroll = [";
                    for($n = 15; $n < count($page_data["projects"]); $n++) {
                        echo "\"" . base64_encode(generate_code_block($page_data["projects"][$n])) . "\", ";
                    }
                    echo "];</script>";
                }
                ?>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>