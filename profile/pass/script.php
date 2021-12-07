<?php
    session_start();

    $dbc = require './../../database/db.php';

    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }
    
    //variables
    $password = $_POST['password'];
    $repass = $_POST['repass'];

    //error check
    if(empty($password) || empty($repass)) {
        $_SESSION['errors'] = "Please fill all the fileds in.";
        header("location: index.php");
    }
    if($password !== $repass) {
        $_SESSION['errors'] = "Passwords don't match.";
        header("location: index.php");
    }

    //if no errors insert into database
    if(!isset($_SESSION['errors'])) {
        $query = "UPDATE `user` SET `password` = '$password' WHERE userid = $userID";
        mysqli_query($dbc, $query);
        header("location: newpass.php");

    }
?>