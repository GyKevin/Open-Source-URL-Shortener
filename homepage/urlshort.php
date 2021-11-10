<?php
    //Connect to database
    $DB_DATABASE = "shorturl";
    $DB_HOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    try {
        $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    } catch(Exception $e) {
        print_r($e);
    }

    if(!isset($_POST['longURL']) || $_POST['longURL'] === "") {
        header("Location: ./index.php");
    }

    ///////////////////
    //   functions   //
    ///////////////////
    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function insertIntoDatabase($conn, $value) {
        // generate small string and check if it exists
        $randomString = generateRandomString(8);
        while ( urlExists($conn, $randomString, 'shortURL') ) {
            $randomString = generateRandomString(8);
        }

        $query = "INSERT INTO urltable (longURL, shortURL) VALUES (?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $value, $randomString);
        $stmt->execute();

        if ($conn->error) echo $conn->error;
    }

    function urlExists($conn, $value, $destination) {
        $query = "SELECT COUNT(1) FROM urltable WHERE {$destination} = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $value);
        $stmt->execute();
        $stmt->bind_result($found);
        $stmt->fetch();

        return $found ? true : false;
    }

    if (!urlExists($conn, $_POST['longURL'], 'longURL')) {
        insertIntoDatabase($conn, $_POST['longURL']);
    } else {
        echo "shit exists\n";
    }

    /*
        to-do:
        > check if complete URL is in database
        >   if true: give existing shortened URL to user

        > add complete URL to database with a unique identifier
        > give url shortener site + unique identifier to user
            ( example: shorturl.com/[UNIQUE-IDENIFIER] )

        > if shortened URL is visited. get complete URL from database and user header() to redirect the user
            ( example: header("Location: https://example.com") )
    */s