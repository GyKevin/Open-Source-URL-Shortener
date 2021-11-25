<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>stuff</title>
</head>
<body>
<section>
    <div class="form-container">
      <div class="form-inner">
        <div class="info">
          <li class="sign-in active">sign in</li>
          <li class="sign-up">sign up</li>
        </div>
        <div class="info-state"></div>
        
        <div class="photo">
          <i class="fa fa-user 2x"></i>
        </div>

        <div class="form-input">

          <!--SIGN IN HTML CODE><-->
          <div class="form-input-inner">
            <div class="sign-in-input">
              <div class="input-contain">
                <div class="warp">
                  <input type="text" placeholder="Username" />
                </div>
                <div class="warp">
                  <input type="password" placeholder="Password" class="tabIgnore"/>
                </div>
              </div>
            </div>

            <div class="mention">
              <div class="mention-info">SUBMIT</div>
            </div>
          </div>  

          <!--SIGN UP HTML CODE><-->
          <div class="form-input-inner">
            <div class="sign-up-input">
              <div class="input-contain">
                <div class="warp">
                  <input type="text" placeholder="Email" />
                </div>
                <div class="warp">
                  <input type="text" placeholder="Username" />
                </div>
                <div class="warp">
                  <input type="password" placeholder="Password" />
                </div>
                <div class="warp">
                  <input type="password" placeholder="Confirm password" />
                </div>
              </div>
            </div>

            <div class="mention">
              <div class="mention-info">Register</div>
            </div>
          </div>  

        </div>
    </div>
  </section>
  <script src="script.js"></script>
</body>
</html>