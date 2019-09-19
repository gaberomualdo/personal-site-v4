<?php
// this file has controllers for the site

// display errors, VERY IMPORTANT
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// include api
include_once __DIR__ . "/../api/main.php";

// list of routes, and api routes
$routes = [
    [
        "route" => "/",
        "api_route" => "/home/",
        "view_filename" => "home.php",
        "title" => "Home",
        "priority" => "0.9",
        "updated" => "weekly"
    ],
    [
        "route" => "/about/",
        "api_route" => "/about/",
        "view_filename" => "about.php",
        "title" => "About",
        "priority" => "0.6",
        "updated" => "monthly"
    ],
    [
        "route" => "/blog/",
        "api_route" => "/blog/",
        "view_filename" => "blog.php",
        "title" => "Blog",
        "priority" => "0.8",
        "updated" => "weekly"
    ],
    [
        "route" => "/code/",
        "api_route" => "/code/",
        "view_filename" => "code.php",
        "title" => "Code",
        "priority" => "0.8",
        "updated" => "weekly"
    ],
    [
        "route" => "/resume/",
        "api_route" => "/resume/",
        "view_filename" => "resume.php",
        "title" => "Résumé",
        "priority" => "0.6",
        "updated" => "monthly"
    ]
];

// variables to be passed to views

// site details
$site_details = $api_routes["/site_details/"]();


// page details and data
$page_details;
$page_data;

// for each route, add to router and display view
foreach($routes as $route) {
    $router->get($route["route"], function() use( &$route ) {
        // declare use of global vars
        global $api_routes;
        global $page_data;
        global $page_details;
        global $site_details;

        // get page details and store in var
        
        // page title
        $page_title = $route["title"];
        if($page_title == "Home") {
            $page_title = $site_details["full_title"];
        }else {
            $page_title .= " | " . $site_details["full_title"];
        }
        
        $page_details = ["title" => $page_title, "description" => $site_details["description"]];

        // get data from api and store in var
        $page_data = $api_routes[$route["api_route"]]();

        // display view
        include_once __DIR__ . "/../views/" . $route["view_filename"];
    });
}

// blog posts!

// variable for list of posts with URLs and dates, to be used in sitemap
$blog_post_urls_and_dates = [];

// list of post objs
$blog_posts = $api_routes["/blog/"]()["posts"];

// loop through each post, add data to $blog_post_urls_and_dates, and route corresponding post path
foreach($blog_posts as $post) {
    $post_url = "/blog/" . str_replace("-", "/", $post["last_updated"]) . "/" . $post["filename"] . "/";
    $post_date = $post["last_updated"];
    array_push($blog_post_urls_and_dates, ["url" => $post_url, "last_updated" => $post_date]);

    // route path
    $router->get($post_url, function() use( &$post ) {
        // declare use of global vars
        global $page_data;
        global $page_details;

        // post preview: first 300 chars in post content
        $post_preview = strip_tags($post["content"]);
        $post_preview = str_replace(PHP_EOL, '', $post_preview);
        if(strlen($post_preview) > 300) {
            $post_preview = substr($post_preview, 0, 300) . "...";
        }
        
        // get page details and store in var
        $page_details = ["title" => $post["title"], "description" => $post_preview];
        
        // get page data and store in var
        $page_data = $post;

        // display view
        include_once __DIR__ . "/../views/blog_post.php";
    });
}

// RSS feed
$router->get("/feed/", function() {
    // declare use of global vars
    global $api_routes;
    global $page_data;
    
    // all blog posts
    $page_data = ["blog_posts" =>  $api_routes["/blog/"]()["posts"]];

    // include rss feed view
    include_once __DIR__ . "/../views/feed.php";
});

// Sitemap XML
$router->get("/sitemap/", function() {
    // declare use of global vars
    global $page_data;
    global $routes;
    global $blog_post_urls_and_dates;

    $page_data = ["main_pages" => $routes, "blog_posts" => $blog_post_urls_and_dates];

    // include sitemap view
    include_once __DIR__ . "/../views/sitemap.php";
});

// errors
$router->error("method_not_allowed", function() {
    // declare use of global vars
    global $request;
    global $page_data;
    global $page_details;

    // error view, with method not allowed variables
    $error_code = "method_not_allowed";
    $error_title = "Method Not Allowed";
    $error_description = "Sorry, it seems that the method " . $request->getRequestMethod() . " is not available for this URL. Return to <a href='/'>home</a> or try a different method.";
    
    // get page details and store in var
    $page_details = ["title" => $error_title, "description" => $error_description];
    
    // get page data and store in var
    $page_data = ["error_code" => $error_code, "error_title" => $error_title, "error_description" => $error_description];

    include_once __DIR__ . "/../views/error.php";
});

$router->error("is_using_ie", function() {
    // declare use of global vars
    global $page_data;
    global $page_details;

    // error view, with method not allowed variables
    $error_code = "using_ie";
    $error_title = "Internet Explorer Not Supported";
    $error_description = "Sorry, you are using Internet Explorer, which is not supported for this website. Try downloading a different browser such as <a href='https://www.google.com/chrome/'>Google Chrome</a>.";

    // get page details and store in var
    $page_details = ["title" => $error_title, "description" => $error_description];
    
    // get page data and store in var
    $page_data = ["error_code" => $error_code, "error_title" => $error_title, "error_description" => $error_description];
    
    include_once __DIR__ . "/../views/error.php";
});

$router->error("page_not_found", function() {
    // declare use of global vars
    global $page_data;
    global $page_details;

    // error view, with page not found variables
    $error_code = "page_not_found";
    $error_title = "Page Not Found";
    $error_description = "Sorry, it seems that this URL is pointing to a page that does not exist. Return to <a href='/'>home</a> or try another URL.";

    // get page details and store in var
    $page_details = ["title" => $error_title, "description" => strip_tags($error_description)];
    
    // get page data and store in var
    $page_data = ["error_code" => $error_code, "error_title" => $error_title, "error_description" => $error_description];
    
    include_once __DIR__ . "/../views/error.php";
});

?>