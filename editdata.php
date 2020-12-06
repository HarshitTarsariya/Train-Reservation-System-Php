<?php

    session_start();
    $username = $_SESSION["username"];
    $fullname = $_POST["fullname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $mobileno = $_POST["mobileno"];
    
    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $query=$dbhandler->prepare("UPDATE login_passenger_detail SET full_name=?, gender=?, birth_date=? , email_address=?, mobile_no=? WHERE username=?");
    $query->execute(array($fullname, $gender, $birthdate, $email,$mobileno,$username));
   
    
    header('LOCATION: editprofile.php');

?>