<?php 

     session_start();
 $passenger = (int)$_SESSION["passenger"];
    $lst = array();
    for ($i=1;$i<=$passenger;$i++){
    array_push($lst,$i);
    }
    
    
    ?>
<?php include "header.php"; ?> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/header.css" >
	<link rel="stylesheet" type="text/css" href="css/home.css" >
    <style>
        table,td,th,tr{
            padding-top : 90px;
            padding-left : 150px;
            padding-right : 50px;
            border : 10px;
            text-align : right ;
        }
    </style>
</head>
<body>
    <form action="prepayment.php" method="POST">
    <table colspan="4">
        <tr ><th><h3><u>Sr</u></h3></th><th><h3><u>First Name</u></h3></th><th><h3><u>Last Name</u></h3></th><th><h3><u>Age</u></h3></th></tr>
        <?php  
        
       foreach( $lst as $i){
        ?>
            <tr>
                <td><h3><?php echo $i?></h3></td></td><td><div class="box5"><input type="text" name="fname<?php echo $i?>" class=i1 placeholder="First Name" size="15%" required /></div></td>
                <td><div class="box5"><input type="text" name="lname<?php echo $i?>" class=i1 placeholder="Last Name" size="15%" required /></div></td>
                <td><div class="box5"><input type="text" name="age<?php echo $i?>" class=i1 placeholder="Age" size="15%" required /></div></td>
            </tr>
        <?php
       }
       ?>
        <tr>
            <td></td><td></td><td><div class="box4"><input type="submit" class=button name="search" value="BOOK" ></div></td><td></td>
        </tr>
    </table>

    </form>
</body>
</html>