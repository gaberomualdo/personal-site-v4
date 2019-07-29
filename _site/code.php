<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Code | Fred Adams</title>
        
        <link rel="stylesheet" href="/assets/normalize.css">
        <link rel="stylesheet" href="/assets/skeleton.css">
        <link rel="stylesheet" href="/assets/main.css">

        <link rel="shortcut icon" href="/favicon.ico">
    </head>
    <body>
        <nav  style="background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(/assets/code.jpg)">
    <div class="top">
        <a href="/">Fred Adams</a>
        <ul>
            
            <a  href="/">Home</a>
            
            <a  class="active"  href="/code">Code</a>
            
            <a  href="/about">About</a>
            

        </ul>
    </div>
    <h1>Code</h1>
</nav>

        <div class="container">
            <div class="block" id="introduction">
    <p>I've been coding for around 5 years now. I started out programming using the popular language <a href="https://python.org/" target="_blank">Python</a>, but have since moved on to working with programming languages like JavaScript to built websites and web applications.</p>
    <p>I honestly build anything and everything that I feel like building &mdash; from games to useful tools, to open source projects. I've just recently started experimenting with mobile app development with <a href="https://flutter.dev/" target="_blank">Flutter</a>, as well as <a href="https://www.oracle.com/java/" target="_blank">Java</a> development.</p>
    <p>Below is every open-sourced bundle of pixels I've built since February 27, 2018. Check out what I've done! And by the way, you can also see all of these on my <a href="https://github.com/xtrp/" target="_blank">GitHub Profile</a>.</p>
    <p class="last_updated">Last Updated on 14 June, 2019</p>
</div>



<?php


if(new DateTime() - filemtime("projects.html") > 86400){
    include "projects.html";
    echo "<!-- projects list was cached from version on " . filemtime("projects.html") . " -->";
}else{
    echo "test";
    function requestRepos($page){
        $stream_context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => [
                    'User-Agent: PHP'
                ]
            ]
        ]);
        return json_decode(file_get_contents("https://api.github.com/users/xtrp/repos?type=public&sort=created&per_page=100&page=" . $page, true, $stream_context));
    }
    
    $github_repolist = requestRepos(1);
    
    $currentPage = 2;
    $status = true;
    
    while($status){
        $newPage = requestRepos($currentPage);
        if(count($newPage) > 0) {
            $github_repolist = array_merge($github_repolist, $newPage);
            $currentPage += 1;
        }else{
            $status = false;
        }
    }
    
    $echoText = "";
    
    foreach($github_repolist as $repo) {
        if($repo["archived"] == (false)){
            $echoText += '
            
            <div class="block post project">
                <div class="top" style="border: none;margin: 0;padding: 0;">
                    <h1>' . $repo["full_name"] . '</h1>
                    <p>
                        <span style="color: #444;margin-top: 1rem;">' . $repo["description"] . '</span>
            
                        <a style="margin-top: 1rem; margin-left: 1rem;" href="' . $repo["html_url"] . '">GitHub</a>
                        ' . ($repo["homepage"] != "" ? '<a style="margin-top: 1rem;margin-left: 1rem;" href="' . $repo["homepage"] . '">Website</a>' : '') . '
                    </p>
                </div>
                <p style="margin-top: 2.5rem;" class="last_updated">Code Last Updated on ' . date('F j, Y', $repo["updated_at"]) . '</p>
            </div>
            
            ';
        }
    }
    file_put_contents("projects.html", $echoText);
    echo $echoText;
    echo "<!-- projects list was not cached -->";
}
?>

            <footer>
    <p>&copy; Fred Adams <script>document.write(new Date().getFullYear());</script></p>
    <ul>
        <a href="mailto:xtrp127@gmail.com">Email</a>
        <a href="https://github.com/xtrp/">GitHub</a>
        <a href="https://dev.to/xtrp/">DEV</a>
        <a href="https://stackoverflow.com/users/10007107/fred-adams">Stack Overflow</a>
        <a href="https://instagram.com/xtrp127/">Instagram</a>
    </ul>
</footer>
        </div>
    </body>
</html>