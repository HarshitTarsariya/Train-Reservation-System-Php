
<?php include  "header.php"; ?>

<html lang="en">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/home.css" >   
    <link rel="stylesheet" type="text/css" href="css/header.css" >   
    
</head>
<body>
    <div class="limiter">
        <div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
            <div class="wrap">
                 <?php
                    session_start();
                    if(isset($_SESSION["error"])){
                       if($_SESSION["error"]==1){
                           $msg1="Password incorrect!!";
                           $msg2="<br/>confirm password and password aren't same";
                       }
                       if($_SESSION["error"]==2){
                           $msg1="Username already exist!!";
                           $msg2="";
                       }
                       if($_SESSION["error"]==3){
                           $msg1="Mobile Number is invalid!!";
                           $msg2="</br>enter correct mobile number";
                       }
                        if($_SESSION["error"]==6){
                           $msg1="Something Went Wrong";
                           $msg2="</br>Try Again";
                       }
                       echo "<div class=alert><span class=closebtn onclick=\"this.parentElement.style.display='none'\">&times;</span>";
                       echo '<strong>'.$msg1.'</strong>'.$msg2.'</div>';
                       unset($_SESSION["error"]);
                    }
                ?>
                <form class="login-form validate-form" action="registereddata.php" method="POST">
                        <span class="login-form-logo">
                                <i class="zmdi zmdi-landscape"></i>
                        </span>

                        <span class="login-form-title p-b-20 p-t-10">
                                Sign UP
                        </span>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="wrap-input validate-input" >
                                    <input class="input" type="text" name="firstname" placeholder="First Name" required>
                                    <span class="focus-input" data-placeholder="&#xf207;"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="wrap-input validate-input" >
                                    <input class="input" type="text" name="lastname" placeholder="Last Name"required>
                                    <span class="focus-input" data-placeholder="&#xf207;"></span>
                                    </div>
                                </div>
                        </div>
                        <div class="wrap-input validate-input">
                                <input class="input" type="text" name="username" placeholder="Username" minlength=6 maxlength=10 required>
                                <span class="focus-input" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="row">
                                <div class="col-md-4">	
                                    <input type="radio" name="gender" value="male" checked> Male
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="gender" value="female"> Female
                                </div>
                                <div class="col-md-4">
                                    <input type="radio" name="gender" value="transgender"> Transgender
                                </div>
                        </div>
                        <br>

                        <div class="wrap-input validate-input">
                            <input class="input" type="email" name="email" placeholder="Email Id" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required />
                                <span class="focus-input" data-placeholder="&#x2709;"></span>
                        </div>

                        <div class="wrap-input validate-input">
                            <input class="input" type="date" name="birthdate" placeholder="Birth Date" required>
                                <span class="focus-input" data-placeholder="&#x1F5D3;"></span>
                        </div>

                        <div class="wrap-input validate-input">
                                <input class="input" type="text" name="mobileno" placeholder="Mobile Number" pattern="\d{10}" >
                                <span class="focus-input" data-placeholder="&#x2706;"></span>
                        </div>

                        <div class="wrap-input validate-input">
                                <input class="input" type="password" name="password" placeholder="Password" minlength=8 maxlength=14 required>
                                <span class="focus-input" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input validate-input">
                                <input class="input" type="password" name="confirmpassword" placeholder="Confirm Password" minlength=8 maxlength=14 required>
                                <span class="focus-input" data-placeholder="&#xf191;"></span>
                        </div>

                        <input type="checkbox" name="agree" required /> I have read and agree with Terms and Conditions</a>.
                        <br>
                        <br>
                        <div class="container-login-form-btn">
                                <button class="login-form-btn">
                                        Sign Up
                                </button>
                        </div>
                        <br>
                        <div class="text-center p-t-10">
                        Already have an account?
                                <a class="txt1" href="login.php">
                                        Login
                                </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>
<?php include  "footer.php"; ?>