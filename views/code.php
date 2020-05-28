<?php include __DIR__ . "/_config.php" ?>
<?php include get_path_of_function("generate_blocks.php") ?>

<?php $filename = "code"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

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

            <?php include get_path_of_include("footer.php") ?>
        </div>

        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>