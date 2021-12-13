<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css?v=1">
    <script src="https://kit.fontawesome.com/d269b334d3.js" crossorigin="anonymous"></script>
    <script src="nav.js" defer></script>
    <?php
    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }

    $dbc = require './../database/db.php';
    $res = $dbc->query("SELECT * FROM `url` WHERE user_userid='{$userID}'");
    //$row = $res->fetch_assoc();

    if (isset($_POST["logout"])) {
        unset($_COOKIE['iduser']);
        setcookie('iduser', null, -1, "/");
        header("Location: index.php");
    }
    ?>
    <script>
        function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        console.log(copyText);
        navigator.clipboard.writeText(copyText);
        }
    </script>
</head>
<body>
    <header class="primary-header flex">
        <div>
            <img src="./../img/logo.svg" class="logo">
        </div>

        <button class="mobile-nav-toggle" aria-controls="primary-navigator" aria-expanded="false"><span class="sr-only">Menu</span></button>

        <nav>
            <ul id="primary-navigator" data-visible="false" class="primary-navigation flex">
                <li class="active">
                    <a aria-hidden="true" href="./../index.php">Home</a>
                </li>
                <?php
                    if ($userID !== NULL){
                    echo "<li><a aria-hidden=\"true\" href=\"./../profile\">Profile</a></li>";
                    echo "<li><a aria-hidden=\"true\" class=\"active\" href=\"\">My Urls</a></li>";
                    }

                    if ($userID !== NULL) {
                        echo "<li><form action=\"./../index.php\" method=\"post\" id=\"logout\"><input type=\"hidden\" name=\"logout\" value=\"Index\"><a href=\"javascript:{}\" onclick=\"document.getElementById('logout').submit(); return false;\">Logout</a></form></li>";
                    } else {
                        echo "<li><a aria-hidden=\"true\" href=\"sign-in\">Sign In</a></li>";
                    }
                    ?>
            </ul>
        </nav>
    </header>

    <form id="field">
        <center>
        <p class="sign-in">My Urls</p>
        <?php
        while($row_link = mysqli_fetch_array($res)) { 
            //echo "<button class=\"smallbttn\" onclick=\"myFunction()\" type=\"submit\"><i class=\"far fa-copy\"></i></button>";
            //echo "<button class=\"bigbttn\" onclick=\"myFunction()\" type=\"submit\">Copy</button>";
            echo "<button type=\"submit\" name=\"link\" onclick=\"myFunction()\" id=\"myInput\">h1ren.xyz/r/?url=" . $row_link['shorturl'] . "</button><br>"; 
            }
        ?>
        </center>
    </form>
</body>
</html>