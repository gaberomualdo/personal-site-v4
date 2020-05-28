<?php

// XML type header
header("Content-type: text/xml");

// config include
include __DIR__ . "/_config.php";

// start of sitemap
echo <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
EOT;

// main pages of sitemap
foreach($page_data["main_pages"] as $main_page) {
    echo "<url>";
    echo "<loc>https://" . $request->getServerName() . $main_page["route"] . "</loc>";
    echo "<changefreq>" . $main_page["updated"] . "</changefreq>";
    echo "<priority>" . $main_page["priority"] . "</priority>";
    echo "</url>";
}

// blog posts
foreach($page_data["blog_posts"] as $post) {
    echo "<url>";
    echo "<loc>https://" . $request->getServerName() . $post["url"] . "</loc>";
    echo "<lastmod>" . $post["last_updated"] . "</lastmod>";
    echo "<priority>0.5</priority>";
    echo "</url>";
}

// end of sitemap
echo "</urlset>";

?>