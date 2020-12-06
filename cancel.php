

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
                <form action="cancelled.php" method="POST">
                    <div class="wrapper">
                    <div class="box1">&#128648; Enter PNR Number</div>
                    <div class="box4"><input type="submit" class=button name="search" value="CANCEL" ></div>';
                    <div class="box5"><input type="text" name="pnrno" class=i1 size="20" required ></div>';
                    </div>
                </form>
                 <?php if(isset($_SESSION["NOPNR"])){ unset($_SESSION["NOPNR"]);?>
                            <h5 style="color:red">Invalid PNR</h5>
                 <?php }?>
                 <?php if(isset($_SESSION["mmm"])){ unset($_SESSION["mmm"]);?>
                            <h5 style="color:red">Tickets cancelled Successfully</h5>
                 <?php }?>
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