<?php include __DIR__ . "/assets/php/vars.php" ?>

<?php $filename = "about"; ?>

<!DOCTYPE html>
<html lang="en">

    <?php include __DIR__ . "/assets/html/head.php" ?>

    <body>
        <div class="container">
            <?php include __DIR__ . "/assets/html/nav.php" ?>

            <ul class="block_list">
                <?php // about card ?>
                <div class="block about">
                    <div class="content">
                        <h1 class="big_title title">About</h1>
                        <?php echo $page_data["content"]; ?>
                    </div>
                </div>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
            <?php include __DIR__ . "/assets/html/scripts.php" ?>
        </div>
    </body>

</html>