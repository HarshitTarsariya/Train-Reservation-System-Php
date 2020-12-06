<?php
    session_start();

?>

<?php include  "header.php"; ?>

<?php
    $username = $_SESSION["username"];
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $query=$dbhandler->prepare("select * from login_passenger_detail where username=?");
    $query->execute(array($username));
    
    $row=$query->fetch(PDO::FETCH_ASSOC);
    
?>
<html lang="en">
<head>
	<title>Edit Profile</title>
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
		<link rel="stylesheet" type="text/css" href="css/header.css" >
</head>
<body>
	<div class="limiter">
		<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
			<div class="wrap">
				<form class="login-form validate-form" action="editdata.php" method="POST">
					<span class="login-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login-form-title p-b-20 p-t-10">
						Edit Profile
					</span>
                    
					<div class="wrap-input validate-input">
						<input class="input" type="text" name="fullname" placeholder="Full Name" value="<?php print($row['full_name']);?>" required>
						<span class="focus-input" data-placeholder="&#xf207;"></span>
					</div>

					<div class="row">

						<div class="col-md-4">
                                                <input type="radio" name="gender" value="male" <?php if($row["gender"] === "male")echo 'checked'?> > Male</div>
						<div class="col-md-4">
                                 <input type="radio" name="gender" value="female" <?php if($row["gender"]=="female")echo 'checked' ?> > Female</div>
					</div>
					<br>

					<div class="wrap-input validate-input">
                                            <input class="input" type="email" name="email" placeholder="Email Id" pattern="^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" value="<?php print($row['email_address']);?>" required />
						<span class="focus-input" data-placeholder="&#x2709;"></span>
					</div>

					<div class="wrap-input validate-input">
						<input class="input" type="date" name="birthdate" placeholder="Birth Date" value="<?php print($row['birth_date']);?>" required />
						<span class="focus-input" data-placeholder="&#x1F5D3;"></span>
					</div>

					<div class="wrap-input validate-input">
						<input class="input" type="text" name="mobileno" placeholder="Mobile Number" pattern="\d{10}" value="<?php print($row['mobile_no']);?>" required>
						<span class="focus-input" data-placeholder="&#x2706;"></span>
					</div>
      
					<br>
					<div class="container-login-form-btn">
						<button class="login-form-btn">
							Change
						</button>
					</div>
					<br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php include  "footer.php"; ?>