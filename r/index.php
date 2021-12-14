<?php
    session_start();
    //global variables
    $userID = null;
    $geturl = null;

    //get url
    if(isset($_GET['url'])) {
    $geturl = $_GET['url'];
    }

    //cookie checker
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];

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

    } else {
        //connect to database
        $dbc = require './../database/nouser_db.php';
        $res = $dbc->query("SELECT * FROM `url` WHERE shorturl = '$geturl' ORDER BY longurl");
        $row = $res->fetch_assoc();
                
        $shorturl = $row['longurl'];
        if(isset($_GET['url'])) {
        header("location: " . $shorturl);
        } else {
            $_SESSION['errors'] = "you havent't given a url";
        }
    }


?>