<?php

session_start();
$dbhandler = new PDO("mysql:host=localhost;dbname=trainreservation", "root", "root");
$trainno = (int) $_SESSION["train_no"];
$a_rdist = (int) $_SESSION["a_rdist"];
$d_rdist = (int) $_SESSION["d_rdist"];
$passenger = (int) $_SESSION["passenger"];
$aname = (string) $_SESSION["aname"];
$dname = (string) $_SESSION["dname"];
$date = $_SESSION["date"];
$train_class = (string) $_SESSION["train_class"];
$username = (string) $_SESSION["username"];
$trainname = (string) $_SESSION["trainname"];
$atime = (string) $_SESSION["atime"];
$dtime = (string) $_SESSION["dtime"];

unset($_SESSION["train_no"]);

unset($_SESSION["passenger"]);
unset($_SESSION["aname"]);

unset($_SESSION["dname"]);
unset($_SESSION["date"]);
unset($_SESSION["train_class"]);
unset($_SESSION["d_rdist"]);
unset($_SESSION["a_rdist"]);
unset($_SESSION["trainname"]);
unset($_SESSION["dtime"]);
unset($_SESSION["atime"]);

$PNR = rand(1000000000, 1100000000);

$price = 0;
$stmt = $dbhandler->prepare("INSERT INTO book_detail (pnr_no,no_of_passenger,date,train_class,departure_station,arrival_station,arrival_station_rdist,departure_station_rdist,train_no_id,username_id) VALUES (?, ?,?,?,?,?,?,?,?,?)");
$stmt->execute([$PNR, $passenger, $date, $train_class, $dname, $aname, $a_rdist, $d_rdist, $trainno, $username]);

if ($train_class == "first") {
    $price = ($a_rdist - $d_rdist) * 2;
} else {
    $price = ($a_rdist - $d_rdist);
}
$dbhandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $dbhandler->prepare("select * from login_passenger_detail where username=?");
$query->execute(array($username));
$row=$query->fetch(PDO::FETCH_ASSOC);
$to = $row["email_address"]; //$_SESSION['email'];
//echo $to;
$header = 'From: hbtarsariya076@gmail.com \r\n';
$subject = 'Confirmation Mail For Booking';
$message = "Your booking details are below." . "\n" . "\nPNR Number:" . (string) $PNR . "\nTrain Name:" . $trainname . "\nClass:" . $train_class . "\nNo. of Passanger:" . (string) $passenger . "\nArrival City:" . $aname . "\nDeparture City:" . $dname . "\nArrival Time:" . (string) $atime . "\nDeparture Time:" . (string) $dtime . "\nDate:" . $date . "\nPrice:" . (string) ($price * $passenger) . "\nDistance:" . (string) ($a_rdist - $d_rdist) . "KM\r\n\n\nPassenger Details:\n";


for ($i = 1; $i <= $passenger; $i++) {
    $fname = (string) $_POST["fname" . (string) ($i)];
    $lname = (string) $_POST["lname" . (string) ($i)];
    $age = (int) $_POST["age" . (string) ($i)];
    $stmt = $dbhandler->prepare("INSERT INTO book_booked_passenger_details (pnr_no_id,f_name,l_name,age) VALUES (?, ?,?,?)");
    $stmt->execute([$PNR, $fname, $lname, $age]);

    $message .= $fname . " " . $lname . " " . (string) $age . " \n ";
}

$r = mail($to, $subject, $message, $header);


$data = array();
$temp = array();
$temp["username"] = $username;
$temp["trainname"] = $trainname;
$temp["class"] = $train_class;
$temp["noofpassenger"] = $passenger;
$temp["pnr"] = $PNR;
$temp["dcity"] = $dname;
$temp["acity"] = $aname;
$temp["price"] = $price * $passenger;
$temp["distance"] = $a_rdist - $d_rdist;
$temp["date"] = $date;
$temp["dtime"] = $dtime;
$temp["atime"] = $atime;
array_push($data, $temp);
$_SESSION["bookdata"] = $data;
header('LOCATION: payment.php');
?>