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
                echo generate_author_block();
                echo generate_share_post_block($page_data);
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
        <script>

        // some code taken from user Dean Taylor from https://stackoverflow.com/questions/400212/how-do-i-copy-to-the-clipboard-in-javascript
        const copyURL = (url) => {
            var textArea = document.createElement("textarea");
            textArea.value = url;
            textArea.style.position="fixed";  //avoid scrolling to bottom
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();

            try {
                var successful = document.execCommand('copy');
            } catch (err) {
                console.error('Fallback: Oops, unable to copy', err);
            }

            document.body.removeChild(textArea);
        }


        </script>
    </body>

</html>