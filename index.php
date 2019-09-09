<?php
/* includes */

/* Router class */
include_once("router/Request.php");
include_once("router/Router.php");

$request = new Request;
$router = new Router($request, array("GET", "POST"));

/* controllers (main.php includes all necessary controllers) */
include_once("controllers/main.php");

?>