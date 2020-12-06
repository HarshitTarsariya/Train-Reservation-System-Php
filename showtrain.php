<?php
    session_start();
?>

<?php include  "header.php"; ?>
<html>
	<head>
		<title>Show Train</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
                <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
                <link rel="stylesheet" type="text/css" href="css/util.css">
                <link rel="stylesheet" type="text/css" href="css/main.css">
                <link rel="stylesheet" type="text/css" href="css/showtrain.css">
                <link rel="stylesheet" type="text/css" href="css/header.css">
	</head>
	<body >
	<div class="co" style="background-image: url('images/login.jpg'); background-size:cover;">
            <?php
                $avail_trains = $_SESSION["routetrain"];
                unset($_SESSION["routetrain"]);
                if(sizeof($avail_trains) !=0)
                {
                ?>
                    <table>
                        <tr>
                            <th>Train Name</th>
                            <th>Source</th>
                            <th>Destination</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                            <th>Distance (KM)</th>
                        </tr>
                        <div id="demo">
                            <?php 
                                foreach($avail_trains as $each){ ?>
                                     <tr >
                                           <td> <?php print($each["trainname"]); ?> </td>
                                           <td> <?php print($each["dname"]); ?> </td>
                                           <td> <?php print($each["aname"]); ?></td>
                                           <td> <?php print($each["dtime"]) ;?> </td>
                                           <td> <?php print($each["atime"]);?></td>
                                           <td> <?php print($each["distance"]);?></td>
                                     </tr>
                            </div>
                            <tr>
                            <form action="book.php" method="POST">
                                <td colspan="7"><center><input type="submit" class="btn btn-success" value="BOOK" id="a" name="book_now"/>
                                <input class="hidden_input" name="trainname" type="hidden" value="<?php print($each['trainname']); ?>"/>
                               <input class="hidden_input" name="trainno" type="hidden" value="<?php print($each['trainno']); ?>"/>
                               <input class="hidden_input" name="dname" type="hidden" value="<?php print($each['dname']); ?>"/>
                               <input class="hidden_input" name="aname" type="hidden" value="<?php print($each['aname']); ?>"/>
                               <input class="hidden_input" name="date" type="hidden" value="<?php print($each['date']); ?>"/></center></td>
                            </form>
                            </tr>
                     
                             <?php }
                            echo '</table>';    
                       }else{ ?>
			<table>
				<th><h1 style="color:red">Sorry, No Trains are Available</h1></th>
			</table>
                <?php }?>
		</div>
	</body>
</html>
<?php include  "footer.php"; ?>