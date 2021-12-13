<?php
    session_start();

    //cookie checker
    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }

    //connect to database
    $dbc = require './database/db.php';
    $res = $dbc->query("SELECT * FROM `url` WHERE longurl='{$_POST['longurl']}' ORDER BY user_userid");
    $row = $res->fetch_assoc();

    //connection error
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    //variables
    $url = $_POST['longurl'];
    //$baseurl = 'http://h1ren.xyz/r/?url=';
    $baseurl = 'http://localhost/URL-Shortener/r/?url=';

    //random string generator
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


    //user error
    if(!filter_var($url, FILTER_VALIDATE_URL)) {
        $_SESSION['errors'] = 'Url is invalid.';
        header('Location: index.php');
    }

    if(empty($url)) {
        $_SESSION['errors'] = 'Field is empty.';
        header('Location: index.php');
    }

    //insert into database
    if(!isset($_SESSION['errors']) || isset($userID)) {
        $short = rand_string();
        $query = "INSERT INTO `url` (longurl, shorturl, user_userid) VALUES ('$url', '$short', '$userID') ON DUPLICATE KEY UPDATE shorturl = '$short'";
        $dbc->query($query); 
        
        //get redirect
        $_SESSION['link'] = $baseurl.$short;
        header("Location: index.php");
        } else {
        $idreplace = 1111;
        $query = "INSERT INTO `url` (longurl, shorturl, user_userid) VALUES ('$url', '$short', '$idreplace') ON DUPLICATE KEY UPDATE shorturl = '$short'";
        $dbc->query($query);
        $_SESSION['link'] = $baseurl.$short;
        header("Location: index.php");
    }
?>