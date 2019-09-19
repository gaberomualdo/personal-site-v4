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
    
    <meta property="og:title" content="<?=$page_details["title"] ?>">
    <meta property="og:site_name" content="<?=$site_details["full_title"] ?>">
    <meta property="og:description" content="<?=$page_details["description"] ?>">
    <meta property="og:url" content="<?=$request->getRequestURI() ?>">

    <script type="application/ld+json">
    {
        "sameAs": [
            <?php
            foreach($site_details["author"]["social_urls"] as $social_url) {
                echo '"' . $social_url["url"] . '",
                ';
            }
            ?>
        ],
        "@type":"WebSite",
        "url":"https://xtrp.io/",
        "publisher":
        {"@type":"Organization",
            "logo": {
                "@type": "ImageObject",
                "url": "/views/assets/favicon/favicon.png"
            },
            "name": "<?=$site_details["author"]["name"] ?>"
        },
        "name": "<?=$site_details["author"]["name"] ?>",
        "author": {
            "@type": "Person",
            "name": "<?=$site_details["author"]["name"] ?>"
        },
        "description": "<?=$site_details["description"] ?>",
        "headline": "<?=$site_details["full_title"] ?>",
        "@context":"http://schema.org"
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

    <?php // finally, CSS! ?>
    <link rel="stylesheet" href="/views/assets/css/main.css">
    <link rel="stylesheet" href="/views/assets/css/pages/<?=$filename ?>.css">
</head>