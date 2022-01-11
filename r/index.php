<?php
session_start();

//global variables
$geturl = null;
$urlid = "null";

//get url
if(isset($_GET['url'])) {
    $geturl = $_GET['url'];
    }

//connect to db
$dbc = require './../database/db.php';
$res = $dbc->query("SELECT * FROM `url` WHERE shorturl = '$geturl' ORDER BY longurl");
$row = $res->fetch_assoc();

//click counter
$clicks = $row['clicks']+1;
$clicks_sql = "UPDATE url SET clicks = $clicks WHERE idurl = '".$row['idurl']."'";
$dbc->query($clicks_sql);

//redirect url
$redirect_url = $row['longurl'];
if(isset($_GET['url'])) {
    header("location: " . $redirect_url);
} else {
    $_SESSION['errors'] = "url is invalid";
}
?>