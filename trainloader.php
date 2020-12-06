<?php

    session_start();

    $dcity = $_POST['departcity'];
    $acity = $_POST['arrivedcity'];
    
    if(strcmp($dcity, $acity)==0 )
    {
       $_SESSION['INVALIDSTATION'] = 'INVALIDSTATION';
       header('LOCATION: index.php');
    }
    else
    {
    $date = $_POST['date'];
    $_SESSION['date'] = $date;
    $_SESSION['acity'] = $acity;
    $_SESSION['dcity'] = $dcity;
    
    $todaydate =date("Y-m-d");
    if($date < $todaydate)
    {
        $_SESSION['dateproblem'] = 'dateproblem';
        header('LOCATION: index.php');
    }
    else {
        
    
    
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
    $query=$dbhandler->prepare("select * from book_train_detail");
 
    $query->execute();
    
    $alldata = array();
    while($row = $query->fetch()){
        $temp = array();
        $route = explode(",", $row["route"]);
        $distance = explode(",", $row["distance"]);  
        $time = explode(",",$row["time"]);
        
        if(!in_array($acity,$route) or   !in_array($dcity,$route))
        {
            continue;
        }
        $d_index = array_search($dcity,$route);
        $a_index = array_search($acity,$route);
        
        if($d_index > $a_index)
           continue;
        $arrival_time = $time[$a_index];
        $departure_time = $time[$d_index];
        
        $temp["acity"] = $acity;
        $temp["dcity"] = $dcity;
        $temp["aname"] = $acity;
        $temp["dname"] = $dcity;
        $temp["trainno"] = $row["train_no"];
        $temp["trainname"] = $row["train_name"];
        $temp["distance"] = (int)$distance[$a_index] - (int)$distance[$d_index];
        $temp["atime"] = $arrival_time;
        $temp["dtime"] = $departure_time;
        $temp["price"] = $temp["distance"]*2;
        $temp["date"] = $date;
        array_push($alldata, $temp);
    }
    $_SESSION["routetrain"] = $alldata;
    
    header('LOCATION: showtrain.php');
    }}
?>