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

    // all blog posts
    $blog_posts = json_decode(file_get_contents("https://api.xtrp.io/blog/"), true);

    // include rss feed view
    include_once "views/feed.php";
});

// errors
$router->error("method_not_allowed", function() {
    include_once "views/method_not_allowed.php";
});
$router->error("page_not_found", function() {
    include_once "views/page_not_found.php";
});

?>