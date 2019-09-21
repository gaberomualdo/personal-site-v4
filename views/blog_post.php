<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_blog_block.php" ?>

<?php $filename = "blog_post"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="block_list">
                <?php // blog post ?>
                <?php
                echo generate_blog_block($page_data, true);
                ?>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>