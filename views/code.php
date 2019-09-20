<?php include __DIR__ . "/assets/php/vars.php" ?>
<?php include __DIR__ . "/assets/php/generate_code_block.php" ?>

<?php $filename = "code"; ?>

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
                        <h1 class="big_title title">Code</h1>
                        <?php echo $page_data["intro"]["content"] ?>
                    </div>
                </div>

                <?php // projects blocks ?>
                <?php
                foreach($page_data["projects"] as $block) {
                    echo generate_code_block($block);
                }
                ?>
            </ul>

            <?php include __DIR__ . "/assets/html/footer.php" ?>
            <?php include __DIR__ . "/assets/html/scripts.php" ?>
        </div>
    </body>

</html>