<?php
/* this file has controllers for the site */

// list of routes, and api routes
$routes = [
    [
        "route" => "/",
        "api_route" => "https://api.xtrp.io/home/",
        "view_filename" => "home.php"
    ],
    [
        "route" => "/about/",
        "api_route" => "https://api.xtrp.io/about/",
        "view_filename" => "about.php"
    ],
    [
        "route" => "/blog/",
        "api_route" => "https://api.xtrp.io/blog/",
        "view_filename" => "blog.php"
    ],
    [
        "route" => "/code/",
        "api_route" => "https://api.xtrp.io/code/",
        "view_filename" => "code.php"
    ],
    [
        "route" => "/resume/",
        "api_route" => "https://api.xtrp.io/resume/",
        "view_filename" => "resume.php"
    ]
];

// for each route, add to router and display view
foreach($routes as $route) {
    $router->get($route["route"], function() use( &$route ) {
        // get site details data from api/site_details/ and store in var
        $site_details = json_decode(file_get_contents("https://api.xtrp.io/site_details/"), true);
            
        // get data from api/about/ and store in var
        $page_data = json_decode(file_get_contents($route["api_route"]), true);

        // display view
        include_once "views/" . $route["view_filename"];
    });
}

// RSS feed
$router->get("/feed/", function() {
    // site details
    $site_details = json_decode(file_get_contents("https://api.xtrp.io/site_details/"), true);
    $site_title = $site_details["full_title"];
    $site_author_name = $site_details["author"]["name"];

    // all blog posts
    $blog_posts = json_decode(file_get_contents("https://api.xtrp.io/blog/"), true);

    // extra vars
    $current_full_year = date("Y");
    $latest_blog_post_datetime = date("c", strtotime($blog_posts[0]["last_updated"]));

    // return RSS feed
    header("Content-type: text/xml");

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

    // loop through posts and add RSS
    foreach($blog_posts as $post) {
        $post_title = $post["title"];
        $post_url = "/blog/" . str_replace("-", "/", $post["last_updated"]) . "/" . $post["filename"] . "/";
        $post_content = $post["content"];
        $post_datetime = date("c", strtotime($post["last_updated"]));

        echo <<<EOT
        <entry>
            <title type="html">{$post["title"]}</title>
            <link href="{$post_url}" rel="alternate" type="text/html" title="{$post_title}"/>
            <published>{$post_datetime}</published>
            <id>{$post_url}/id>
            
            <content type="html" xml:base="{$post_url}"> {$post_content} </content>
            
            <author>
                <name>{$site_author_name}</name>
            </author>
        </entry>
        EOT;
    }
    
    // end of feed
    echo "</feed>";

    // yay!
});

// errors
$router->error("method_not_allowed", function() {
    include_once "views/method_not_allowed.php";
});
$router->error("page_not_found", function() {
    include_once "views/page_not_found.php";
});

?>