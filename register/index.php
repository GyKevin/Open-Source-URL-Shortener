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
                <li>
                    <a aria-hidden="true" href="#">Short Urls</a>
                </li>
                <li>
                    <a aria-hidden="true" href="./../profile">Profile</a>
                </li>
                <li>
                    <a aria-hidden="true" class="active" href="sign-in">Sign In</a>
                </li>
            </ul>
        </nav>
    </header>

    <form class="field" action="login.php" method="post">
        <center>
          <div class="info">
            <p class="sign-in">Sign Up</p>
          </div>
        <div class="photo">
          <i class="fa fa-user 2x"></i>
        </div>
        <input type="text" name="username" autocomplete="off" placeholder="Username">
        <input type="text" name="email" autocomplete="off" placeholder="Email">
        <input type="password" name="password" autocomplete="off" placeholder="Password">
        <input type="password" name="password" autocomplete="off" placeholder="Confirm Password">
        <br>
        <input type="submit" value="Sign Up">
        <br>
        <br>
        <div>
        <p class="no-acc">Already have an account? <a class="create-acc" href="./../sign-in">Sign In</a></p>
        </div>
        </center>
    </form>
</body>
</html>