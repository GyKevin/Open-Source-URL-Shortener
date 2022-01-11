<?php
session_start();

//database connect
$dbc = require './database/db.php';
$res = $dbc->query("SELECT * FROM `url` WHERE longurl='{$_POST['longurl']}' ORDER BY shorturl");
$row = $res->fetch_assoc();

//public variables
$url = $_POST["longurl"];
$baseurl = "http://localhost/URL-Shortener/r/?url=";
$rand_numb = rand(111111,999999);

//error checking
if(!filter_var($url, FILTER_VALIDATE_URL)) {
    $_SESSION["errors"] = "url is invalid";
    header('location: index.php');
}

if(empty($url)) {
    $_SESSION['errors'] = 'Field is empty.';
    header('Location: index.php');
}

//functions
function rand_string() {
    $length = 8;
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charlength = strlen($char);
    $randstring = '';
    for($i = 0; $i < $length; $i++) {
        $randstring .= $char[rand(0, $charlength - 1)];
    }

    return $randstring;
}

//insert into db and echo shortened url
if(!isset($_SESSION["errors"])) {
    $rand_shorturl = rand_string();
    $query = "INSERT INTO `url` (idurl, shorturl, longurl, clicks) VALUES ('$rand_numb', '$rand_shorturl', '$url', '0')";
    $dbc->query($query);
}

//redirect url
 $_SESSION['link'] = $baseurl.$rand_shorturl;
header('location: index.php');
?>