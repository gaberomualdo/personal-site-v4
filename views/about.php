<?php include __DIR__ . "/_config.php" ?>
<?php include get_path_of_function("generate_blocks.php") ?>

<?php $filename = "about"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="container">
            <div class="block_list">
                <?php // about card ?>
                <div class="block about">
                    <div class="content post_content">
                        <h1 class="big_title title">About</h1>
                        <?php echo $page_data["content"]; ?>
                    </div>
                </div>

                <?php
                echo generate_more_from_fred_block(false);
                ?>
            </div>
        </div>

        <?php include get_path_of_include("footer.php") ?>
        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>