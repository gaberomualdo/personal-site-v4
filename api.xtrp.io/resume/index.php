<?php

include_once("../api_template.php");

echo json_encode([
    "content" => json_decode(file_get_contents("../content/resume/resume_details.json"))
], JSON_PRETTY_PRINT);

?>