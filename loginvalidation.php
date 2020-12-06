<?php
try
{
    $username=trim(filter_input(INPUT_POST,"username"));
    $pass=trim(filter_input(INPUT_POST,"password"));
    $rememberme=filter_input(INPUT_POST,"remember-me");
    $vercode=filter_input(INPUT_POST,"vercode1");

    session_start();

    $dbhandler = new PDO('mysql:host=127.0.0.1;dbname=trainreservation','root','root');
    $dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(!empty($username))
    {
        $query=$dbhandler->prepare("select * from login_passenger_detail where username=?");
        $query->execute(array($username));
        if($r=$query->fetch(PDO::FETCH_ASSOC))
        {
            if($r['password']==$pass)
            {
                if($_SESSION['vercode'] == $vercode)
                {
                    $_SESSION['username']=$username;
                    if($rememberme)
                    {
                        setcookie('username',$username,60*1+time()); 
                    }

                    echo $_SESSION["username"];
                    header('LOCATION: index.php');
                }
                else
                {
                    $_SESSION["error"] = 4;
                    header('LOCATION: login.php');
                }
            }
            else
            {
                $_SESSION["error"] = 1;
                header('LOCATION: login.php');
            }
        }
        else
        {
            $_SESSION["error"]=2;
            header('LOCATION: login.php');
        }
    }
}
catch(PDOException $e)
{
	echo $e->getMessage();
	die();
}
?>