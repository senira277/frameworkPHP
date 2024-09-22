<?php
session_start();
// Any PHP code 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../app/core/init.php";

function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}


$app = new App();
$app->run();








