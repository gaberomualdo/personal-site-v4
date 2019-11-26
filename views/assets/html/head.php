<!--
  ______ _____  ______ _____             _____          __  __  _____ 
 |  ____|  __ \|  ____|  __ \      /\   |  __ \   /\   |  \/  |/ ____|
 | |__  | |__) | |__  | |  | |    /  \  | |  | | /  \  | \  / | (___  
 |  __| |  _  /|  __| | |  | |   / /\ \ | |  | |/ /\ \ | |\/| |\___ \ 
 | |    | | \ \| |____| |__| |  / ____ \| |__| / ____ \| |  | |____) |
 |_|    |_|  \_\______|_____/  /_/    \_\_____/_/    \_\_|  |_|_____/ 
-->

<head>
    <?php // humans.txt ?>
    <link type="text/plain" rel="author" href="/humans.txt">

    <?php // basic meta tags ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <?php // apple-specific meta tags ?>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="format-detection" content="telephone=no">

    <?php // SEO :) ?>
    <meta name="robots" content="index, follow">
    <meta name="author" content="<?=$site_details["author"]["name"] ?>">
    <meta name="description" content="<?=$page_details["description"] ?>">
    
    <meta name="twitter:card" content="summary">

    <meta property="og:title" content="<?=$page_details["title"] ?>">
    <meta property="og:site_name" content="<?=$site_details["full_title"] ?>">
    <meta property="og:description" content="<?=$page_details["description"] ?>">
    <meta property="og:url" content="<?=$request->getRequestURI() ?>">

    <?php // add OpenGraph image if applicable ?>
    <?php
    if($filename == "blog_post") {
        if (array_key_exists("thumbnail_url", $page_data)) {
            echo "<meta property='og:image' content='" . $request->getServerName() . $page_data["thumbnail_url"] . "'>";
        }
    }
    ?>

    <script type="application/ld+json">
    {
        "@type": "WebSite",
        "@context": "http://schema.org",
        "url": "https://xtrp.io/",
        "name": "<?=$site_details["author"]["name"] ?>",
        "author": {
            "@type": "Person",
            "name": "<?=$site_details["author"]["name"] ?>"
        },
        "sameAs": [
            <?php
            foreach($site_details["author"]["social_urls"] as $index => $social_url) {
                if($index > 0) {
                    echo ",";
                }
                echo '"' . $social_url["url"] . '"';
            }
            ?>
        ],
        "description": "<?=$site_details["description"] ?>"
    }
    </script>

    <?php // page title ?>
    <title><?=$page_details["title"] ?></title>

    <?php // google analytics ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?=$site_details["ganalytics_id"] ?>"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?=$site_details["ganalytics_id"] ?>');
    </script>

    <?php // favicon ?>
    <link rel="apple-touch-icon" sizes="57x57" href="/views/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/views/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/views/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/views/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/views/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/views/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/views/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/views/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/views/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/views/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/views/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/views/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/views/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/views/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php // skeleton stylesheets ?>
    <link rel="stylesheet" href="/views/resources/skeleton/normalize.min.css?v=6">
    <link rel="stylesheet" href="/views/resources/skeleton/skeleton.min.css?v=6">
    
    <?php // finally, CSS! ?>
    <link rel="stylesheet" href="/views/assets/css/main.css?v=6">
    <?php
    // only add page js if exists
    if(in_array($filename . ".css", scandir(dirname(__FILE__) . "/../css/pages/"))) {
        echo '<link rel="stylesheet" href="/views/assets/css/pages/' . $filename . '.css?v=6">';
    }
    ?>
</head>