<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function mySubmit(obj) {
            var pwdObj = document.getElementById('password');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)

            var pwdObj = document.getElementById('repass');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
</head>
<body>
    <?php
        session_start();

        $userID = null;
        if (isset($_COOKIE['iduser'])) {
            $userID = $_COOKIE["iduser"];
        }
    ?>
<form id="field" action="script.php" method="post" autocomplete="off">
        <center>
        <div class="info">
            <p class="sign-in">New Password</p>
        </div>
        <input type="password" id="password" name="password" placeholder="New Password" required>
        <input type="password" id="repass" name="repass" placeholder="Confirm Password"  required>
        <br>
        <input type="submit" id="new-button" onclick="mySubmit()" value="SAVE">
        <br>
        <?php
        if (isset($_SESSION['errors'])) {
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset($_SESSION['errors']);
        }
        ?>
        </center>
    </form>
</body>
</html>