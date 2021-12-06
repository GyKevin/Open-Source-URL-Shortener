<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css?v=1">
    <script src="nav.js" defer></script>
    <script>
        function mySubmit(obj) {
            var pwdObj = document.getElementById('password');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
    <?php
    $userID = null;
    if (isset($_COOKIE['iduser'])) {
        $userID = $_COOKIE["iduser"];
    }
    if (isset($_POST["logout"])) {
        unset($_COOKIE['iduser']);
        setcookie('iduser', null, -1, "/");
        header("Location: index.php");
    }
    ?>
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
                    echo "<li><a aria-hidden=\"true\" href=\"profile\">Profile</a></li>";
                    echo "<li><a aria-hidden=\"true\" href=\"\">Short Urls</a></li>";
                    }

                    if ($userID !== NULL) {
                        echo "<li><form action=\"index.php\" method=\"post\" id=\"logout\"><input type=\"hidden\" name=\"logout\" value=\"Index\"><a href=\"javascript:{}\" onclick=\"document.getElementById('logout').submit(); return false;\">Logout</a></form></li>";
                    } else {
                        echo "<li><a aria-hidden=\"true\" class=\"active\" href=\"#\">Sign In</a></li>";
                    }
                    ?>
            </ul>
        </nav>
    </header>

    <form autocomplete="off" class="field" action="login.php" method="post">
        <center>
          <div class="info">
            <p class="sign-in">Sign In</p>
          </div>
        <div class="photo">
          <i class="fa fa-user 2x"></i>
        </div>
        <input type="text" name="email" autocomplete="off" placeholder="Email">
        <input type="password" id="password" name="password" autocomplete="off" placeholder="Password">
        <br>
        <input type="submit" onclick="mySubmit(this)" value="Sign In">
        <br>
        <?php
        session_start();
        if(isset($_SESSION['errors'])){
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset ($_SESSION['errors']);
        }
        ?>
        <br>
        <div>
        <p class="no-acc">Don't have an account? <a class="create-acc" href="./../register">Create account</a></p>
        </div>
        </center>
    </form>
</body>
</html>