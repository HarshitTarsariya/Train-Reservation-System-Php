<!DOCTYPE html>


<?php
    session_start();
    if(isset($_POST['newpassword']))
    {
        if(isset($_SESSION['otp']))
        {
            $otp = $_SESSION['otp'];
            $otp_entered = trim(filter_input(INPUT_POST,"otp"));
            if($otp == $otp_entered)
                unset ($_SESSION['otp']);
            else 
                $_SESSION['error'] = 11;
        }
        else
        {
            $password = trim(filter_input(INPUT_POST,"password"));
            $cpassword = trim(filter_input(INPUT_POST,"confirmpassword"));
            if($password == $cpassword)
            {
                $uname = $_SESSION['username'];
                unset($_SESSION['username']);
                
                $dbhandler = new mysqli('localhost','root', 'root', 'trainreservation');
                $sql = "UPDATE login_passenger_detail SET password='".$password."' where username='".$uname ."'";
                $query=$dbhandler->query($sql);
                
                header('LOCATION: login.php');
            }
            else
                $_SESSION['error'] = 12;
        }
    }
?>
<html lang="en">
<head>
	<title>Forgot Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<style>
        .alert {
          padding: 20px;
          background-color: #f44336;
          color: white;
        }
        .closebtn {
          margin-left: 15px;
          color: white;
          font-weight: bold;
          float: right;
          font-size: 22px;
          line-height: 20px;
          cursor: pointer;
          transition: 0.3s;
        }

        .closebtn:hover {
          color: black;
        }
	</style>
</head>
<body>

	<div class="limiter">
		<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
			<div class="wrap">
				<?php //				invalid otp
				 if(isset($_SESSION['error']))
                                 {
                                    if($_SESSION['error'] == 11)
                                    {
                                        echo '<div class=alert><span class=closebtn onclick="this.parentElement.style.display="none"">&times;</span><strong>Invalid OTP </strong></div>';
                                        
                                    }
                                    if($_SESSION['error'] == 12)
                                    {
                                        echo '<div class=alert><span class=closebtn onclick="this.parentElement.style.display="none"">&times;</span><strong>Confirm Password and Password arent same </strong></div>';
                                    }
                                    unset($_SESSION['error']);
                                 }
                                ?>
                            <form class="login-form validate-form" action="newpassword.php" method="POST">
					<span class="login-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login-form-title p-b-40 p-t-40">
					<?php
						if(isset($_SESSION['otp']))
                                                {
                                                    echo 'Enter OTP';
                                                }
						else
                                                    echo 'Enter new Password'
					?>
                                        </span>
                                        <?php
                                            if(isset($_SESSION['otp']))
                                            {
                                                echo '<div class="wrap-input validate-input">
                                                        <input class="input" type="text" name="otp" placeholder="Enter OTP" required>
                                                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                </div>';
                                            }
                                            else
                                            {
                                                echo '<div class="wrap-input validate-input">
                                                        <input class="input" type="password" name="password" placeholder="New Password" required>
                                                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                    </div>

                                                <div class="wrap-input validate-input">
                                                        <input class="input" type="password" name="confirmpassword" placeholder="Confirm Password" required>
                                                        <span class="focus-input" data-placeholder="&#xf191;"></span>
                                                </div>';
                                            }
                                        ?>
					<br>
					<br><br>
					<div class="container-login-form-btn">
						<button class="login-form-btn " name='newpassword' value='newpassword'>Reset New Password</button>
					</div>
					<br>

				</form>
			</div>
		</div>
	</div>
	<?php include  "footer.php"; ?>
</body>

</html>