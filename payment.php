<?php 
    session_start();
?>

<?php include  "header.php"; ?>
<html>
<head>
	<title>Ticket Details</title>
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/header.css" />
		<link rel="stylesheet" type="text/css" href="css/home.css" >
	<style type="text/css">
		#book {
			font-size: 20px;
			background-color: white;
			width: 500px;
			height: 500px;
			margin: auto;
			border-radius: 25px;
			border: 2px solid blue;
			margin: auto;
			position: absolute;
			left: 0;
			right: 0;
			padding-top: 4px;
			padding-bottom: 20px;
			margin-top: 130px;

		}
		#booktext	{
			padding-top: 20px;
			box-radius:5px;
		}
		.container img {vertical-align: middle;}
		.container .content {
		  position: absolute;
		  bottom: 0;
		  background: rgb(0, 0, 0); /* Fallback color */
		  background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
		  color: #f1f1f1;
		  width: 100%;
		  padding: 20px;
		}
		table,td,th{
			border: 0;

		}
		.field{

		}
	</style>
</head>
<body>
	<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
		<?php  
                    $bookdata = $_SESSION['bookdata'];
                    unset($_SESSION['bookdata']);
                    foreach($bookdata as $each){?>
	<div class="wrap" >
                        <span class="login-form-title p-b-40 p-t-40">
                                TICKET DETAIL
                        </span>
                                <div>
                                        <b> User Name:</b> <?php echo $each['username'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b> Train Name:</b> <?php echo $each['trainname'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b> Class:</b>   <?php echo $each['class'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b> No. of Passenger:</b><?php echo $each['noofpassenger'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b> PNR No.:</b><?php echo $each['pnr'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b>Departure City:</b><?php echo $each['dcity'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b>Departure Time:</b> <?php echo $each['dtime'] ?>
                                </div>
                                <br>
                                <div>
                                        <b>Arrival City:</b><?php echo $each['acity'] ?>
                                </div>
                                <br>
                                <div>
                                        <b>Arrival Time:</b> <?php echo $each['atime'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b>Price :</b><?php echo $each['price'] ?>
                                </div>
                                <br/>
                                <div>
                                        <b>Distance:</b><?php echo $each['distance'] ?>KM
                                </div>
                                <br/>
                                <div>
                                        <b>Date :</b><?php echo $each['date'] ?>
                                </div>
                        <br/>
	<?php
                }?>
	</div>
	</div>
</body>
</html>
<?php include  "footer.php"; ?>