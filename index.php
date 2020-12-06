<?php

session_start();

 $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
 $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
 $query=$dbhandler->prepare("select * from book_train_detail");
 
 $query->execute();
 while($row = $query->fetch())
 {
    $string = $row["route"];
    $str_arr = explode (",", $string);
    $a = array();
    
    for($i=0 ; $i<sizeof($str_arr) ; $i++ )
    {
        array_push($a,$str_arr[$i]);
    }
 }
 array_unique($a);
 
 if(!isset($_SESSION["stationname"]))
     $_SESSION["stationname"] = $a;
 
 
 header('LOCATION: home.php');
 

?>
