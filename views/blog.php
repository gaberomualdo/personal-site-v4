<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "blog"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body>
        <div class="container">
            <?php include __DIR__ . "/assets/html/nav.php" ?>

            <?php // blocks ?>
            <ul class="block_list">
                <?php // intro card ?>
                <div class="block intro">
                    <div class="content">
                        
                    </div>
                </div>

                <?php // a buncha blocks ?>
                <?php
                foreach($page_data["posts"] as $block) {
                    echo generate_blog_block($block);
                }
                ?>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
            <?php include __DIR__ . "/assets/html/scripts.php" ?>
        </div>
    </body>

</html>