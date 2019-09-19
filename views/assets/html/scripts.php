<script src="/views/assets/js/script.js"></script>
<script src="/views/assets/js/pages/<?=$filename ?>.js"></script>

<script>
<?php
echo "console.log('site_details');console.log(JSON.parse(`";
echo json_encode($site_details);
echo "`));";

echo "console.log('page_details');console.log(JSON.parse(`";
echo json_encode($page_details);
echo "`));";

echo "console.log('page_data');console.log(JSON.parse(`";
echo json_encode($page_data);
echo "`));";

echo "console.log('filename: " . $filename . "');";
?>
</script>