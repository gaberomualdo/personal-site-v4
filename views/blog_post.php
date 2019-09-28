<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_blog_block.php" ?>

<?php $filename = "blog_post"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="block_list">
                <?php // blog post ?>
                <?php
                echo generate_blog_block($page_data, true);
                ?>

                <?php // more from fred ?>
                <div class="block more_posts_block">
                    <div class="content">
                        <h1 class="title">More from Fred</h1>
                        <ul class="post_list">
                            <?php
                            // loop through more posts and display
                            foreach($page_data["more_posts"] as $more_post) {
                                echo "<a href='" . $more_post["url"] . "'>" . $more_post["title"] . "</a>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>