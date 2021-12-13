<?php
    session_start();
    //cookie checker
    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }
    $geturl = null;
    if(isset($_GET['url'])) {
        $geturl = $_GET['url'];
    }

    //connect to database
    $dbc = require './../database/db.php';
    $res = $dbc->query("SELECT * FROM `url` WHERE user_userid = '$userID' AND shorturl = '$geturl' ORDER BY user_userid");
    $row = $res->fetch_assoc();
    
    $shorturl = $row['longurl'];
    if(isset($_GET['url'])) {
    header("location: " . $shorturl);
    } else {
        $_SESSION['errors'] = "you havent't given a url";
    }

?>