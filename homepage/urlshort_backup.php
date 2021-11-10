<?php
    echo "hampter\n";

    //Connect to database
    function connectDatabase(){
    $DB_DATABASE = "shorturl";
    $DB_HOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    $dbc = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    $res = $dbc->query("SELECT * FROM urltable WHERE longURL='{$_POST['longURL']}' ORDER BY longURL");
    $row = $res->fetch_assoc();
    }

    function insertIntoDatabase() {
        $query = "INSERT INTO urltable ('longURL')
                  VALUES ('{$_POST['longURL']}')";
        connectDatabase()->query($query);
    }

    if(!isset($_POST['longURL']) || $_POST['longURL'] ==="") {
        header("Location: ./index.php");
    }

    insertIntoDatabase();

    /*
        to-do:
        > check if complete URL is in database
        >   if true: give existing shortened URL to user

        > add complete URL to database with a unique identifier
        > give url shortener site + unique identifier to user
            ( example: shorturl.com/[USER-ID]/[UNIQUE-IDENIFIER] )

        > if shortened URL is visited. get complete URL from database and user header() to redirect the user
            ( example: header("Location: https://example.com") )
    */
     

?>