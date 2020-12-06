    
<?php
    session_start();
?>


<?php

 $dbhandler = new PDO("mysql:host=localhost;dbname=trainreservation", "root", "root");
 $sql=("select * from book_detail");
   $all_booked_record=$dbhandler->query($sql);
 
    $trainno = $_POST["trainno"];
    $passenger =$_POST["passenger"];
    // print($passenger);

    $query=$dbhandler->prepare("select * from book_train_detail where train_no=?");
    $query->execute(array($trainno));
    $r=$query->fetch(PDO::FETCH_ASSOC);
    
    $route = $r["route"];
    $route_arr = explode(",",$route);
    
    $dist = $r["distance"];
    $dist_arr = explode(",",$dist);
    
    $time = $r["time"];
    $time_arr = explode(",",$time);
    
    $trainname = $r["train_name"];
    $total_seats = $r["no_of_seat"];
    
    $aname =$_POST['aname'];
    $dname = $_POST['dname'];
    $d_rdist = (int)$dist_arr[(int)array_search($dname,$route_arr)];
    $a_rdist = (int)$dist_arr[(int)array_search($aname,$route_arr)];
    $train_class =$_POST["train_class"];
    $date =$_POST['date'];

    $rem_slots = 0;
   
    
    
                

while( $row = $all_booked_record->fetch(PDO::FETCH_ASSOC))

{
        if (
            (($row['departure_station_rdist'] >= $d_rdist && $a_rdist > $row['departure_station_rdist']) || (
            $d_rdist >= $row['departure_station_rdist'] && $d_rdist <$row['arrival_station_rdist']))&& (
            $row['train_class'] == $train_class) && ($row['date'] == $date) && (
            $row['train_no_id'] == $trainno)){
            $rem_slots += $row['no_of_passenger'];

            }
    }   

    $date =$_POST["date"];
    print($total_seats);
     $sqlc=("select * from book_daily");
  $total_left_capacity=$dbhandler->query($sqlc);

    if( $passenger+ $rem_slots <= ($total_seats/2)){
        $a = 1;
        $first_left = 0;
        $second_left = 0;
        while( $rowc =$total_left_capacity->fetch(PDO::FETCH_ASSOC)){
            if($rowc['date'] == $date && $rowc['train_no_id'] ==$trainno){
                $first_left = $rowc['first_class'];
                $second_left =$rowc['second_class'];
                $a = 2;
                break;
            }
        }
        if($a == 1){
            $stmt = $dbhandler->prepare("INSERT INTO book_daily (train_no_id,date,first_class,second_class) VALUES (?, ?,?,?)");
$stmt->execute([$trainno,$date,$total_seats/2,$total_seats/2]);
            
        }
      
       $_SESSION["aname"] = $aname;
       $_SESSION["dname"] = $dname;
       $_SESSION["a_rdist"] = $a_rdist;
       $_SESSION["d_rdist"] = $d_rdist;
        $_SESSION["train_no"] = $trainno;
        $_SESSION["passenger"] = $passenger;
        $_SESSION["date"] = $date;
        $_SESSION["trainname"] = $trainname;
        $_SESSION["train_class"] = $train_class;
        header('LOCATION: getdetails.php');
    }
    else
        header('LOCATION: notavailable.php');



?>