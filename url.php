<?php
    session_start();

    //global variables
    $userID = null;
    $url = $_POST['longurl'];
    //$baseurl = 'http://h1ren.xyz/r/?url=';
    $baseurl = 'http://localhost/URL-Shortener/r/?url=';
    
    //user error
    if(!filter_var($url, FILTER_VALIDATE_URL)) {
        $_SESSION['errors'] = 'Url is invalid.';
        header('Location: index.php');
    }
    if(empty($url)) {
        $_SESSION['errors'] = 'Field is empty.';
        header('Location: index.php');
    }

    //functions
    function rand_string() {
        $length = 6;
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlength = strlen($char);
        $randstring = '';
        for($i = 0; $i < $length; $i++) {
            $randstring .= $char[rand(0, $charlength - 1)];
        }

        return $randstring;
    }



    //cookie checker
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    
    //connect to database
    $dbc = require './database/db.php';
    $res = $dbc->query("SELECT * FROM `url` WHERE longurl='{$_POST['longurl']}' ORDER BY user_userid");
    $row = $res->fetch_assoc();

    //connection error
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    //insert into database
    if(!isset($_SESSION['errors'])) {
        $short = rand_string();
        $query = "INSERT INTO `url` (longurl, shorturl, user_userid) VALUES ('$url', '$short', '$userID') ON DUPLICATE KEY UPDATE shorturl = '$short'";
        $dbc->query($query); 
    }
    } else {
        //connect to database
        $dbc = require './database/nouser_db.php';
        $res = $dbc->query("SELECT * FROM `url` WHERE longurl='{$_POST['longurl']}'");
        $row = $res->fetch_assoc();
    
        //connection error
        if (mysqli_connect_errno()) {
            printf("Connection failed: ", mysqli_connect_errno());
            exit();
        }

        //insert into database
        if(!isset($_SESSION['errors'])) {
            $short = rand_string();
            $query = "INSERT INTO `url` (longurl, shorturl) VALUES ('$url', '$short') ON DUPLICATE KEY UPDATE shorturl = '$short'";
            $dbc->query($query); 
        }

    }

        //get redirect
        $_SESSION['link'] = $baseurl.$short;
        header("Location: index.php");
?>