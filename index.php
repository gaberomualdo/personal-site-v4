<?php

/* Router class */
include_once("router/Request.php");
include_once("router/Router.php");

/* request object for current HTTP request */
$request = new Request;

/* create router with current request as "$router", and store in variable */
$router = new Router($request, array("GET", "POST"));

/* controllers (main.php includes all necessary controllers) */
include_once("controller/main.php");

?>