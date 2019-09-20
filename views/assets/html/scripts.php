<?php // prism scripts ?>
<script src="/views/resources/prism/prism.js"></script>

<?php // main scripts ?>
<script src="/views/assets/js/script.js"></script>
<script src="/views/assets/js/pages/<?=$filename ?>.js"></script>

<script>
<?php
echo "console.log('site_details');console.log(`";
var_dump($site_details);
echo "`);";

echo "console.log('page_details');console.log(`";
var_dump($page_details);
echo "`);";

echo "console.log('page_data');console.log(`";
var_dump($page_data);
echo "`);";

echo "console.log('filename: " . $filename . "');";
?>
</script>