<?php
    session_start();
?>
<?php include  "header.php"; ?>
<html>
    <head>
	<title>Home Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/home.css">
    </head>
<body >
    
            <div style="margin-top:8%">
            <div style="overflow-x:auto">
                    <table>
                        <tr>
                           <td id=a1><a href="index.php"><button class="btn 2"><b>SEARCH TRAINS</b></button></td>
                          <td id=a1><a href="cancel.php"><button class="btn 2"><b>CANCEL TICKET</b></button></a></td>
                        </tr>
                    </table>
            </div>
	</div>    
    
	<div id=a2>
		<fieldset id =fbg>
                    <form action="trainloader.php" method="POST">
		<div class="wrapper">
			<div class="box1">&#128649; From</div>
			<div class="box2">&#128649; To</div>
			<div class="box3">&#128197; Date</div>
			<div class="box4"><input type="submit" class=button name="search" value="SEARCH" ></div>
			<div class="box5">
                            <select name="departcity">
                                <?php 
                                    $stationname = $_SESSION["stationname"];
                                    foreach( $stationname as $station) {?>
                                        <option value="<?php print($station) ?>"><?php print($station) ?></option>
                                    <?php } ?>
                            </select>
			</div>
			<div class="box6">
                            <select name="arrivedcity" >
                                <?php 
                                    $stationname = $_SESSION["stationname"];
                                    foreach( $stationname as $station) {?>
                                        <option value="<?php print($station) ?>"><?php print($station) ?></option>
                                    <?php } ?>
                            </select>
			</div>
			<div class="box7"><input type="date" name="date" class=i3 size="15%"  required /></div>
		</div>
		</form>
                <?php if(isset($_SESSION['INVALIDSTATION'])){
                    unset($_SESSION['INVALIDSTATION']);
                 ?>
                        <h5 style="color:red">Invalid Station Selection</h5>
                <?php }
                      else if(isset($_SESSION['dateproblem'])){
                         unset($_SESSION['dateproblem']);?>
                        <h5 style="color:red">Invalid Date Selection</h5>
                     <?php }
                ?>
<!--			{% if mmm %}
				<h5 style="color:red">{{mmm}}</h5>
			{% endif %}-->
		</fieldset>
	</div>
	</body>
</html>
<br><br>
<br><br>
<br><br>
<br><br><br><br>
<br><br>
<br><br>

<?php include  "footer.php"; ?>