<?php // cookies banner --> initialized in main.js ?>
<script src="https://private.xtrp.io/projects/cookies_insert/cookiesBanner.js"></script>

<?php // embed social links in JavaScript ?>
<script>const __siteSocialLinks = [<?php

$all_links = $site_details["author"]["social_urls"];
array_push($all_links, [ "url" => $request->getServerName(), "name" => "Website", "theme_color" => "#3498db" ]);

foreach($all_links as $link) {
    echo "{ name: '" . $link['name'] . "', url: '" . $link['url'] . "', theme: '" . $link['theme_color'] . "' },";
}

?>];</script>

<?php // main scripts ?>
<script src="/views/assets/bundle/dist/main.js?v=1"></script>
<?php
// only add page js if exists
if(file_exists(resolve_from_root("/views/assets/bundle/dist/" . $filename . "/index.js"))) {
    echo '<script src="/views/assets/bundle/dist/' . $filename . '/index.js?v=1"></script>';
}
?>
