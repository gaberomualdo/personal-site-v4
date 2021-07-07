<?php // cookies banner --> initialized in main.js ?>
<script src="https://private.xtrp.io/projects/cookies_insert/cookiesBanner.js"></script>

<?php // embed social links in JavaScript ?>
<script>const __siteSocialLinks = [<?php

$all_links = $site_details["author"]["social_urls"];
$site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
array_push($all_links, [ "url" => $site_url, "name" => "Website", "theme_color" => "#3498db" ]);

foreach($all_links as $link) {
    echo "{ name: '" . $link['name'] . "', url: '" . $link['url'] . "', theme: '" . $link['theme_color'] . "' },";
}

?>];</script>

<?php
// main scripts
$main_js_file_url = '/views/assets/bundle/dist/main.js';
echo '<script src="' . $main_js_file_url . '?v=' . filemtime(resolve_from_root($main_js_file_url)) . '"></script>';

// only add page js if exists
$js_file_url = "/views/assets/bundle/dist/" . $filename . "/index.js";
if(file_exists(resolve_from_root($js_file_url))) {
    echo '<script src="' . $js_file_url .'?v=' . filemtime(resolve_from_root($js_file_url)) . '"></script>';
}
?>
