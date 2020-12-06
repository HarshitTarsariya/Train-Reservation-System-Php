
<?php

session_start();
?>
<?php include  "header.php"; ?>

<html>
<head>
    <title>Book Your Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <style>
            body{
                    padding:0;
                    margin:0;
                    background-opacity:0.4;
            }
            .hidden_input{
                    display: none;
            }
    </style>
</head>
<body >
	<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
    	<?php
            $each = $_SESSION["bookdata"];
            unset($_SESSION["bookdata"]);
        ?>
			<center>
                            <form action="prefinal.php" method="POST" >
                                <div class="wrap">
                                    <span class="login-form-title p-b-40 p-t-40">
                                            BOOKING DETAIL
                                    </span>
                                    <div>
                                            <b> Train Name:</b> <?php  print($each["trainname"]);?>
                                    </div>
                                    <br/>
                                    <div>
                                            <b>Source:</b><?php  print($each["dtime"]); ?>
                                    </div>
                                    <br/>
                                    <div>
                                            <b>Destination:</b><?php  print($each["atime"]); ?>
                                    </div>
                                    <br/>
                                    <div>
                                            <b> Distance:</b><?php  print($each["distance"]); ?> KM
                                    </div>
                                    <br/>
                                    <div>
                                            <b>Date:</b><?php  print($each["date"]); ?>
                                    </div>
                                    <br/>
                                    <div>
                                            <b>Class:</b> First:<input type="radio"  name="train_class" value="first" >&nbsp Second:<input type="radio"  name="train_class" value="second"><br>
                                    </div>
                                    <br/>
                                    <div>
                                            <b>Number of Passengers:</b><input name="passenger" type="number" min="1" max="10" style="width: 10%;" value="1" required />
                                    </div>
                                    <input class="hidden_input" name="trainno" type="text" value="<?php  print($each['trainno']); ?>"/>
                                    <input class="hidden_input" name="aname" type="text" value="<?php  print($each['aname']); ?>"/>
                                    <input class="hidden_input" name="dname" type="text" value="<?php  print($each['dname']); ?>"/>
                                    <input class="hidden_input" name="dist" type="text" value="<?php  print($each["distance"]); ?>"/>
                                    <input class="hidden_input" name="dtime" type="text" value="<?php  print($each["dtime"]); ?>"/>
                                    <input class="hidden_input" name="atime" type="text" value="<?php  print($each["atime"]); ?>"/>
                                    <input class="hidden_input" name="date" type="date" value="<?php  print($each["date"]); ?>"/>
                                <br/>
                                <br/>
                                <div class="container-login-form-btn">
                                        <button class="login-form-btn">CONFIRM</button>
                                </div>
                                </div>
                            </form>
				</center>
				</center>

		</div>
	</body>
</html>

<?php include  "footer.php"; ?>