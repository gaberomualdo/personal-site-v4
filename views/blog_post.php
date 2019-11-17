<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_blocks.php" ?>

<?php $filename = "blog_post"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="side_block_list">
                <?php
                //echo generate_author_block();
                echo generate_on_this_site_block(true);
                ?>
            </ul>
            <ul class="block_list">
                <?php
                // blog post
                echo generate_blog_block($page_data, true);
                echo generate_more_from_fred_block(false);                
                ?>

                
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>