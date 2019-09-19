<?php

// header
header("Content-type: text/xml");

// vars include
include __DIR__ . "/assets/php/vars.php";

// vars
$current_full_year = date("Y");
// default latest time
$latest_blog_post_datetime = "2019-09-18";

// set latest time if possible

if($page_data["blog_posts"] && count($page_data["blog_posts"]) > 0){
   $latest_blog_post_datetime = date("c", strtotime($page_data["blog_posts"][0]["last_updated"]));
}
$site_title = $site_details["full_title"];
$site_author_name = $site_details["author"]["name"];

// return RSS feed

echo <<<EOT
<?xml version='1.0' encoding='UTF-8'?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <link href="/feed/" rel="self" type="application/atom+xml"/>
    <link href="/" rel="alternate" type="text/html"/>
    <id>/</id>
    <title type="html">{$site_title}</title>
    <updated>{$latest_blog_post_datetime}</updated>

    <author>
        <name>{$site_author_name}</name>
    </author>

    <rights> (c) {$current_full_year} {$site_author_name} </rights>
EOT;

if($page_data["blog_posts"]) {
    // loop through posts and add RSS
    foreach($page_data["blog_posts"] as $post) {
        $post_title = $post["title"];
        $post_url = "/blog/" . str_replace("-", "/", $post["last_updated"]) . "/" . $post["filename"] . "/";
        $post_content = html_entity_decode($post["content"], null, "UTF-8");
        $post_datetime = date("c", strtotime($post["last_updated"]));

        echo <<<EOT
        <entry>
            <title type="html">{$post["title"]}</title>
            <link href="{$post_url}" rel="alternate" type="text/html" title="{$post_title}"/>
            <published>{$post_datetime}</published>
            <id>{$post_url}</id>
            
            <content type="html" xml:base="{$post_url}"> {$post_content} </content>
            
            <author>
                <name>{$site_author_name}</name>
            </author>
        </entry>
        EOT;
    }
}

// end of feed
echo "</feed>";

// yay!

?>