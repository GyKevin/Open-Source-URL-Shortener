<?php
    session_start();

    //connect to database
    $dbc = require './../database/db.php';
    $res = $dbc->query("SELECT * FROM user WHERE email='{$_POST['email']}' AND password='{$_POST['password']}' ORDER BY email");
    $row = $res->fetch_assoc();

    //connection error
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    //variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    //form validation errors
    if(!$row['email'] || !$row['password']) {
        $_SESSION['errors'] = 'Email or password is invalid';
        header("location: index.php");
        exit();
    }

    //data validation
    $_SESSION["userid"] = $row['userid'];
    $_SESSION["email"] = $row['email'];
    setcookie("iduser", $row['userid'], 0 , "/"); /*time() + (86400)  = 1 day */
    setcookie("demo", "", -1, "/");
    header("location: ./../index.php");

?>