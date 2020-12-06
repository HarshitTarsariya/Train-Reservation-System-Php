<?php include  "header.php"; ?>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 30%;
            }   
        </style>
        
</head>
<body>
    <div class="limiter">
            <div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
                    <div class="wrap">
                        <?php
                            session_start();
                            if(isset($_SESSION["error"]))
                            {
                               if($_SESSION["error"]==1)
                               {
                                   $msg1="Password Incorrect!!";
                                   $msg2="<br/>Reenter Correct Password";
                               }
                               if($_SESSION["error"]==2)
                               {
                                   $msg1="Username Incorect!!";
                                   $msg2="<br/>Reenter Correct Username";
                               }
                               if($_SESSION["error"]==4)
                               {
                                   $msg1="Invalid Captcha";
                                   $msg2="";
                               }
                               echo "<div class=alert><span class=closebtn onclick=\"this.parentElement.style.display='none'\">&times;</span>";
                               echo '<strong>'.$msg1.'</strong>'.$msg2.'</div>';
                               unset($_SESSION["error"]);
                            }
                            if(isset($_SESSION["registered"]))
                            {
                                $registered = "Registered Successfully";
                                echo "<div class=alert><span class=closebtn onclick=\"this.parentElement.style.display='none'\">&times;</span>";
                                echo '<strong>'.$registered.'</strong></div>';
                                unset($_SESSION["registered"]);
                            }
                        ?>
                        <form class="login-form validate-form" action="loginvalidation.php" method="POST">
                                <span class="login-form-logo">
                                        <i class="zmdi zmdi-landscape"></i>
                                </span>

                                <span class="login-form-title p-b-34 p-t-27">Log in</span>

                                <div class="wrap-input validate-input" data-validate = "Enter username">
                                        <input class="input" type="text" name="username" placeholder="Username" maxlength="10" minlength="6" required>
                                        <span class="focus-input" data-placeholder="&#xf207;"></span>
                                </div>
                                <div class="wrap-input validate-input" data-validate="Enter password">
                                        <input class="input" type="password" name="password" placeholder="Password" maxlength="14" minlength="8" required>
                                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                                </div>

                                <div class="wrap-input validate-input" >
                                    <img src="captcha.php" alt="captcha" class="center" >
                                        <input class="input" type="text" name="vercode1" required>
                                        <span class="focus-input" data-placeholder=""></span>
                                </div>
                                <div class="contact-form-checkbox">
                                        <input class="input-checkbox" id="ckb1" type="checkbox" name="remember-me">
                                        <label class="label-checkbox" for="ckb1">Remember me</label>
                                </div>
                                <div class="container-login-form-btn">
                                        <button class="login-form-btn">Login</button>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="text-center p-t-40">
                                        <a class="txt1" href="register.php">New User?</a>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="text-center p-t-40">
                                        <a class="txt1" href="forgotpassword.php">Forgot Password?</a>
                                </div>
                                </div>
                                </div>
                        </form>
                    </div>
            </div>
    </div>
</body>
</html>
<?php include  "footer.php"; ?>