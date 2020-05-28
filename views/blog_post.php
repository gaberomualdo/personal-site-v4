<?php include __DIR__ . "/_config.php" ?>
<?php include get_path_of_function("generate_blocks.php") ?>

<?php $filename = "blog_post"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="scroll_progress_bar_container">
            <div class="scroll_progress_bar"></div>
        </div>

        <div class="container">
            <ul class="side_block_list">
                <?php
                echo generate_author_block();
                echo generate_share_post_block($page_data);
                echo generate_another_post_block(0);
                echo generate_another_post_block(1);
                ?>
            </ul>
            <ul class="block_list">
                <?php
                // blog post
                echo generate_blog_block($page_data, true);
                echo generate_more_from_fred_block(false);        
                ?>                
            </ul>

            <?php include get_path_of_include("footer.php") ?>
        </div>

        <?php include get_path_of_include("scripts.php") ?>
        <script>

        // some code taken from user Dean Taylor from https://stackoverflow.com/questions/400212/how-do-i-copy-to-the-clipboard-in-javascript
        const copyURL = (url) => {
            var textArea = document.createElement("textarea");
            textArea.value = url;
            textArea.style.position = "fixed"; // avoid scrolling to bottom
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
            } catch (err) {
                console.error('Copy failed.', err);
            }

            document.body.removeChild(textArea);
        }

        </script>
    </body>

</html>