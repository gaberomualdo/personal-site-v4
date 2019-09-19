<script src="/views/assets/js/script.js"></script>
<script src="/views/assets/js/pages/<?=$filename ?>.js"></script>

<script>
<?php
echo "console.log('site_details');console.log(JSON.parse(`";
var_dump($site_details);
echo "`));";

echo "console.log('page_details');console.log(JSON.parse(`";
var_dump($page_details);
echo "`));";

echo "console.log('page_data');console.log(JSON.parse(`";
var_dump($page_data);
echo "`));";

echo "console.log('filename');console.log(JSON.parse(`";
var_dump($filename);
echo "`));";
?>
</script>