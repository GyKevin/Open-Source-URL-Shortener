<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function copyFunction() {
            event.preventDefault();

            console.log(event);
            navigator.clipboard.writeText(event.target.outerText);
        }
    </script>
</head>
<body>
<div class="wrapper">
    <div id="stars"></div>
    <div id="stars2"></div>
    <div id="stars3"></div>
    <div id="title">
            <span>PASTE A URL TO BE SHORTENED</span>

        <form action="url.php" method="post" autocomplete="off">
            <input type="text" name="longurl" placeholder="PASTE URL HERE">
            <br>
            <button type="submit">SHORTEN</button>
            <br>
            <p id="error-output">
                <?php
                    session_start();
                    if(isset($_SESSION['errors'])){
                        $error_output = $_SESSION['errors'];
                        echo $error_output;
                        
                    }
                    ?>
            </p>

                <a href="#" id="url-output" onclick="copyFunction()">
                    <?php
                    if(isset($_SESSION['link'])) {
                        $linkoutput = $_SESSION['link'];
                        if (!isset($_SESSION['errors'])) {
                        echo $linkoutput; 
                        }
                        
                        unset ($_SESSION['link']);
                    }
                    unset ($_SESSION['errors']);
                ?>
                </a>
                <p class="hide">COPY URL</p>
        </form>
        </div>
        </div>
</body>
</html>