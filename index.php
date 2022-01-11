<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
</head>
<body>
    <div class="container">
        <form action="url.php" method="post" autocomplete="off">
            <input type="text" name="longurl" placeholder="Paste Link Here">
            <br>
            <button type="submit">SHORTEN</button>
            <br>
            <?php
                session_start();
                if(isset($_SESSION['errors'])){
                    $error_output = $_SESSION['errors'];
                    echo $error_output;
                    unset ($_SESSION['errors']);
                }

                if(isset($_SESSION['link'])) {
                    $linkoutput = $_SESSION['link'];
                    echo $linkoutput;
                    unset ($_SESSION['link']);
                }
        ?>
        </form>
    </div>
</body>
</html>