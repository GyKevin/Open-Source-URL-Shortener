<?php
    session_start();

    //connect to database
    $DB_DATABASE = "shorturl";
    $DB_HOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    $dbc = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    $res = $dbc->query("SELECT * FROM user WHERE username='{$_POST['username']}' AND password='{$_POST['password']}' ORDER BY username");
    $row = $res->fetch_assoc();

    if($row) {
        $_SESSION["userid"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        header("location: homepage/index.php");
    } else {
        echo "shit don't work";
    }
?>