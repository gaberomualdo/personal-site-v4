<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "error"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body>
        <div class="container">
            <?php include __DIR__ . "/assets/html/nav.php" ?>

            <ul class="block_list">
                <?php // error card ?>
                <div class="block error">
                    <div class="content">
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
            <?php include __DIR__ . "/assets/html/scripts.php" ?>
        </div>
    </body>

</html>