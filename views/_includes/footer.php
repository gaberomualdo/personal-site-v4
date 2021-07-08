<footer>
    <div class="row sitemap">
        <?php
        foreach($site_details['main_pages'] as $page) {
            echo "<a href='" . $page["route"] . "'>" . $page["title"] . "</a>";
        }
        ?>
    </div>
    <div class="row socials">
        <?php
        foreach(array_merge($site_details["author"]["social_urls"], $site_details["author"]["other_urls"]) as $social_url) {
            echo "<a rel='noreferrer' target='_blank' aria-label='" . $social_url["name"] . "' href='" . $social_url["url"] . "'>" . $social_url["svg"] . "</a>";
        }
        ?>
    </div>
    <div class="row meta">
        <?php
        $social_url_email = "";
        foreach($site_details["author"]["social_urls"] as $social_url) {
            if($social_url["name"] == "Email") {
                $social_url_email = str_replace("mailto:", "", $social_url["url"]);
            }
        }
        ?>
        <p>&copy; Gabriel Romualdo 2019&ndash;<?=date("Y")?>. Contact me at <a href="mailto:<?=$social_url_email?>"><?=$social_url_email?></a>.</p>
    </div>
</footer>