<?php include __DIR__ . "/_config.php" ?>
<?php include get_path_of_function("generate_blocks.php") ?>
<?php include get_path_of_function("create_paginated_blocks.php"); ?>

<?php $filename = "blog"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="container">
            <?php // blocks ?>
            <div class="block_list">
                <?php // intro card ?>
                <div class="block intro">
                    <div class="content post_content">
                        <h1 class="big_title title">Blog</h1>
                        <?php echo $page_data["intro"]["content"]; ?>
                    </div>
                </div>

                <?php // blog post blocks ?>
                <?php
                $query_params = $request->getQueryParams();
                if(array_key_exists('page', $query_params) && is_numeric($query_params['page'])) {
                    $current_page = intval($query_params['page']);
                    create_paginated_blocks($page_data["posts"], "blog", 15, $current_page);
                } else {
                    create_paginated_blocks($page_data["posts"], "blog", 15, 1);
                }
                ?>
            </div>
        </div>

        <?php include get_path_of_include("footer.php") ?>
        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>