<?php

    session_start();
    
    $trainno = (int)$_POST['trainno'];
    $aname = (string)$_POST['aname'];
    $dname =  (string)$_POST['dname'];
    $date = $_POST['date'];
    $trainname =(string)$_POST['trainname'];
  


    
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $query=$dbhandler->prepare("select * from book_train_detail where train_no=?");
    $query->execute(array($trainno));
    
    $row=$query->fetch(PDO::FETCH_ASSOC);
    
    $route_arr = explode(",", $row["route"]);
    $dist_arr = explode(",", $row["distance"]);  
    $time_arr = explode(",",$row["time"]);
    
    
   
    $date = $_SESSION['date'];
    
    $cnt = array_search($dname,$route_arr);
    $d_rdist = (int)$dist_arr[$cnt];
    $d_time = $time_arr[$cnt];
    
    $cnt1= array_search($aname,$route_arr);
    $a_rdist = (int)$dist_arr[$cnt1];
    $a_time = $time_arr[$cnt1];
    
    $_SESSION["atime"] = $a_time;
    $_SESSION["dtime"] = $d_time;



    
    if(isset($_SESSION["username"]))
    {
       $temp = array();
        
        $temp["aname"] = $aname;
        $temp["dname"] = $dname;
       $temp["trainno"] = $trainno;


        $temp["trainname"] = $trainname;
        $temp["atime"] = $a_time;
        $temp["dtime"] = $d_time;
        $temp["distance"] = $a_rdist-$d_rdist;
        $temp["date"] = $date;
        $_SESSION["bookdata"] = $temp;
        header('LOCATION: booking.php');
    }
    else 
    {
        header('LOCATION: login.php');
    }
?>