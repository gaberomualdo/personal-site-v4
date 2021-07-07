<?php include __DIR__ . "/_config.php" ?>

<?php $filename = "links"; ?>

<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">

    <?php include get_path_of_include('head.php'); ?>

    <?php // Since these styles are quick I've opted to put them here instead of a CSS file ?>
    <style>
      .links_page > .description {
        text-align: center;
      }
      .links_page > .links_list > * {
        width: 100%;
        border: 1px solid #dedede;
        border-radius: 4px;
        box-sizing: border-box;
        line-height: 1.5;
        font-family: "Source Sans Pro", sans-serif;
        display: flex;
        margin-bottom: 0;
        overflow: hidden;
      }
      .links_page > .links_list > *:not(:last-child) {
        margin-bottom: 1rem;
      }
      .links_page > .links_list > * > * {
        display: block;
      }
      .links_page > .links_list > * > span {
        padding: .75rem 1.25rem;
        flex: 1 1 100%;
        opacity: .85;
      }
      .links_page > .links_list > * > a {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: .75rem;
        text-align: center;
        flex: 0 0 7.5rem;
        width: 7.5rem;
        background-color: #f0f0f0;
        border-left: 1px solid #dedede;

      }
    </style>

    <body class="loading">
        <?php include get_path_of_include("nav.php") ?>

        <div class="container">
            <div class="block_list">
                <div class="block post_content">
                    <div class="content post_content links_page">
                        <h1 class="big_title">Shortened Links</h1>
                        <p class="description">Here's a list of URLs on this site and their corresponding shortened links.</p>
                        <div class="links_list">
                        <?php

                        foreach($page_data as $link) {
                          $url = "/link/" . $link["key"] . "/";
                          echo "<p><span>" . $link["url"] . "</span><a href='" . $url . "'>" . $url . "</a></p>";
                        }

                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
        <?php include get_path_of_include("footer.php") ?>
        <?php include get_path_of_include("scripts.php") ?>
    </body>

</html>