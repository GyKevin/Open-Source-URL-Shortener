<?php
    session_start();
    $dbc = require './../database/db.php';
    
    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }

    //variables
    $email = $_POST['email'];
    $error= [0];


    //check if email exists in database
    $sql="SELECT * FROM user WHERE email='$email'";
    $res = mysqli_query($dbc,$sql);

    if (mysqli_num_rows($res) > 0) {
        $row=mysqli_fetch_assoc($res);
        if($email==isset($row['email'])) {
            $error = [1];
            $_SESSION['errors'] = "Email already used.";
            header("location: index.php");
        }
    }

    //if field is empty
    if(empty($email)) {
        $error=[1];
        $_SESSION['errors'] = "Field is empty.";
        header("location: index.php");
    }

    //validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error=[1];
        $_SESSION['errors']="Email is invalid"; 
        header("location: index.php");
    }

    //if no errors insert into database
    if($error == [0]) {
        $query = "UPDATE `user` SET email= '$_POST[email]' WHERE userid=$userID";
        mysqli_query($dbc, $query);
        header("location: index.php");
    }
?>