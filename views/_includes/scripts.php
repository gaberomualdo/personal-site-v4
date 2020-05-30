<?php // cookies banner --> initialized in main.js ?>
<script src="https://private.xtrp.io/projects/cookies_insert/cookiesBanner.js"></script>

<?php // main scripts ?>
<script src="/views/assets/bundle/dist/main.js"></script>
<?php
// only add page js if exists
if(file_exists(resolve_from_root("/views/assets/bundle/dist/" . $filename . "/index.js"))) {
    echo '<script src="/views/assets/bundle/dist/' . $filename . '/index.js"></script>';
}
?>
