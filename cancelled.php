<?php

session_start();

if(isset($_SESSION["username"]))
{
    
    $pnrno= (int)$_POST['pnrno'];
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
    $query=$dbhandler->prepare("select * from book_detail");
 
    $query->execute();
    $avai = 0;
    while($row = $query->fetch()){
        if($row['pnr_no'] == $pnrno)
               $avai=1;
    }
    
    if($avai==0)
    {
        $_SESSION["NOPNR"] = "NOPNR";
        header('LOCATION: cancel.php');
    }
    else
    {
        $_SESSION["mmm"] = "NOPNR";
        $query1=$dbhandler->prepare("delete from  book_detail where pnr_no=?");
        $query1->execute(array($pnrno));
        header('LOCATION: cancel.php');
        
    } 
}
else
{
     header('LOCATION: login.php');
}

?>