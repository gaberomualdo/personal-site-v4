<footer>
    <p>&copy; Gabriel Romualdo 2019&ndash;<?=date("Y")?></p>
    <ul class="links right">
        <?php
        foreach($site_details["author"]["social_urls"] as $social_url) {
            echo "<a href='" . $social_url["url"] . "' style='--theme-color: " . $social_url["theme_color"] . ";'>" . $social_url["name"] . "</a>";
        }
        ?>
    </ul>
    <ul class="links left">
        <?php
        foreach($site_details["author"]["other_urls"] as $social_url) {
            echo "<a rel='noreferrer' href='" . $social_url["url"] . "'>" . $social_url["name"] . "</a>";
        }
        ?>
    </ul>
</footer>