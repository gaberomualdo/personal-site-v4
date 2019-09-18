<!--
  ______ _____  ______ _____             _____          __  __  _____ 
 |  ____|  __ \|  ____|  __ \      /\   |  __ \   /\   |  \/  |/ ____|
 | |__  | |__) | |__  | |  | |    /  \  | |  | | /  \  | \  / | (___  
 |  __| |  _  /|  __| | |  | |   / /\ \ | |  | |/ /\ \ | |\/| |\___ \ 
 | |    | | \ \| |____| |__| |  / ____ \| |__| / ____ \| |  | |____) |
 |_|    |_|  \_\______|_____/  /_/    \_\_____/_/    \_\_|  |_|_____/ 
-->

<head>
    <?php // manifest file ?>
    <link rel="manifest" href="/manifest.json" type="application/manifest+json">

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

    <?php // finally, CSS! ?>
    <link rel="stylesheet" href="/views/assets/css/main.css">
    <link rel="stylesheet" href="/views/assets/css/pages/<?=$filename ?>.css">
</head>