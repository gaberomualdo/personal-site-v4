<footer>
    <p>&copy; <?=$site_details["author"]["name"] ?> 2019&ndash;Present</p>
    <ul class="links">
        <?php
        foreach($site_details["author"]["social_urls"] as $social_url) {
            echo "<a href='" . $social_url["url"] . "' style='--theme-color: " . $social_url["theme_color"] . ";'>" . $social_url["name"] . "</a>";
        }
        ?>
    </ul>
</footer>