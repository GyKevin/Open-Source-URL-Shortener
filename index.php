<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css?v=1">
    <script src="nav.js" defer></script>
</head>
<body>
    <header class="primary-header flex">
        <div class="logo">
            <img src="img/logo.png">
        </div>

        <button class="mobile-nav-toggle" aria-controls="primary-navigator" aria-expanded="false"><span class="sr-only">Menu</span></button>

        <nav>
            <ul id="primary-navigator" data-visible="false" class="primary-navigation flex">
                <li class="active">
                    <a aria-hidden="true" href="index.php">Home</a>
                </li>
                <li>
                    <a aria-hidden="true" href="#">Short Urls</a>
                </li>
                <li>
                    <a aria-hidden="true" href="#">Profile</a>
                </li>
                <li>
                    <a aria-hidden="true" href="sign-in">Sign In</a>
                </li>
            </ul>
        </nav>
    </header>

    <form id="field">
        <center>
        <input type="text" name="longurl" placeholder="Paste link here">
        <br>
        <input type="submit" value="SUBMIT">
        </center>
    </form>
</body>
</html>