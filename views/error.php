<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "error"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body class="loading">
        <?php include __DIR__ . "/assets/html/nav.php" ?>

        <div class="container">
            <ul class="block_list">
                <?php // error card ?>
                <div class="block error">
                    <div class="content post_content">
                        <?php // error image ?>
                        <div class="left">
                            <img src="/views/assets/img/error_image.png" alt="Error Picture of Person Shrugging Emoji" class="error_picture">
                        </div>

                        <?php // error title and description ?>
                        <div class="right">
                            <h1 class="error_title"><?php echo $page_data["error_title"]; ?></h1>
                            <p class="error_description"><?php echo $page_data["error_description"]; ?></p>
                        </div>
                    </div>
                </div>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
        </div>

        <?php include __DIR__ . "/assets/html/scripts.php" ?>
    </body>

</html>