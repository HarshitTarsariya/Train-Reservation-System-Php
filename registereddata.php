<?php
    $uname=trim(filter_input(INPUT_POST,"username"));
    $pass=trim(filter_input(INPUT_POST,"password"));
    $cpass=trim(filter_input(INPUT_POST,"confirmpassword"));	
    $fname=trim(filter_input(INPUT_POST,"firstname"));
    $lname=trim(filter_input(INPUT_POST,"lastname"));
    $name=$fname.' '.$lname;
    $bdt=date(filter_input(INPUT_POST,"birthdate")); 
    $gen=filter_input(INPUT_POST,"gender");
    $mob=trim(filter_input(INPUT_POST,"mobileno"));
    $email=trim(filter_input(INPUT_POST,"email"));
    session_start();
    
	if($pass==$cpass)
	{
            try
            {
//                $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
                $dbhandler = new mysqli('localhost','root', 'root', 'trainreservation');
//                $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "select * from login_passenger_detail where username='".$uname."'";
                $query=$dbhandler->query($sql);
               
                if($query->num_rows != 0)
                {
                    $_SESSION["error"]=2;
                    header('LOCATION: register.php');
                }
                else
                {
                    $sql="insert into login_passenger_detail (username,password,full_name,birth_date,gender,mobile_no,email_address) values ('$uname','$pass','$name','$bdt','$gen','$mob','$email')";
                    $query=$dbhandler->query($sql);
                    $_SESSION["registered"] = "registered";
                    header('LOCATION: login.php');
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
                $_SESSION["error"]=6;
                header('LOCATION: register.php');
            }
	}
	else
	{
            $_SESSION["error"]=1;
            header('LOCATION: register.php');
	}
?>
