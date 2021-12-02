<?php
    session_start();

    //connect to database
    $dbc = require './../../database/db.php';
    $res = $dbc->query("SELECT * FROM user WHERE username='{$_POST['username']}' AND password='{$_POST['password']}' ORDER BY username");
    $row = $res->fetch_assoc();

    //connection error
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    //variables
    $username = $_POST['username'];
    $password = $_POST['password'];

    //form validation errors
    if(!$row['email'] || !$row['password']) {
        $_SESSION['errors'] = 'Username or password is invalid';
        header("location: index.php");
        exit();
    }

    //data validation
    $_SESSION["userid"] = $row['iduser'];
    $_SESSION["email"] = $row['email'];
    setcookie("userid", $row['iduser'], 0 , "/"); /*time() + (86400)  = 1 day */
    setcookie("demo", "", -1, "/");
    header("location: ./../index.php");

?>