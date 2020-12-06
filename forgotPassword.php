<!DOCTYPE html>

<?php
    session_start();
    //require 'PHPMailer-master/PHPMailerAutoload.php';
    if(isset($_POST['submit']))
    {
        $uname = trim(filter_input(INPUT_POST, "username"));
        $dbhandler = new mysqli('localhost','root', 'root', 'trainreservation');
        $sql = "select * from login_passenger_detail where username='".$uname."'";
        $query=$dbhandler->query($sql);
        $row = $query->fetch_assoc();

        if($query->num_rows != 0)
        {
           $otp = rand(10000,999999);
           $_SESSION['otp'] = $otp;
           $_SESSION['username'] = $uname;
           $to = $row['email_address'];
           //echo $to;
           $header = 'From: hbtarsariya076@gmail.com \r\n';
           $subject = "OTP for Reset Password Request by Train Reservation";  
           $message="<noreply>\nOne Time Password is ".$otp."\n\n\nDonot Share with Anyone\n";

           $r = mail($to,$subject,$message,$header);
           
           
//           $mail = new PHPMailer();
//           $mail->isSMTP();
//           $mail->Host = 'smtp.gmail.com';
//           $mail->Port = 587;
//           $mail->SMTPSecure = 'tls';
//           $mail->SMTPAuth = true;
//           $mail->Username = 'hbtarsariya076@gmail.com';
//           $mail->Password = 'harshit@gmail.com';
//           $mail->addAddress($to);
//           $mail->Subject = $subject;
//           $mail->msgHTML($message);
           if($r==true)
            header('LOCATION: newpassword.php ');
        }
        else
        {
            $_SESSION['error'] = 10;
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
	<link rel="stylesheet" type="text/css" href="css/header.css" >
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
				<?php //				<!-- invalid username entered -->
                                    if(isset($_SESSION['error']))
                                    {
                                        if($_SESSION['error'] == 10)
                                        {
                                            echo '<div class=alert><span class=closebtn onclick="this.parentElement.style.display="none"">&times;</span><strong>Invalid Username </strong></div>';
                                            unset($_SESSION['error']);
                                        }
                                    }
                                ?>
                            <form class="login-form validate-form" action="forgotPassword.php" method="POST">
                                <span class="login-form-logo">
                                    <i class="zmdi zmdi-landscape"></i>
                                </span>

                                <span class="login-form-title p-b-40 p-t-40">
                                    Forgot Password
                                </span>
                                    <div class="wrap-input validate-input">
                                        <input class="input" type="text" name="username" placeholder="Username" required>
                                        <span class="focus-input" data-placeholder="&#xf207;"></span>
                                    </div>
                                <br/>
                                <br/><br/>
                                <div class="container-login-form-btn">
                                        <button class="login-form-btn " name="submit" value="submit">GET OTP ON MAIL</button>
                                </div>
                                <br>
                            </form>
                            <form action="login.php" method="POST">
                                    <div class="container-login-form-btn">
                                            <button class="login-form-btn ">Login</button>
                                    </div>
                                    <br>
                            </form>
			</div>
		</div>
	</div>
	<?php include  "footer.php"; ?>
</body>
</html>