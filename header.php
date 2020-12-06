
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="icon" type="image/png" href="/static/images/icons/favicon.ico"/>
        <link rel="stylesheet" type="text/css" href="/static/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
    <header>
        <div class="header">
                <i class="fas fa-subway fa-5x" ></i>
                <strong><font class="header-font">Train Reservation</font></strong>
                <div class="header-right">
                    <?php 
                      if(isset($_SESSION['username']))
                      {
                            echo '<strong>Welcome,'.$_SESSION['username'].' </strong>
                            <strong><a href="home.php" >Home</a></strong>
                            <strong><a href="editprofile.php">Edit Profile</a></strong>
                            <strong><a href="logout.php">Logout</a></strong>';
                      }
                     else
                     {
                            echo '<a href="home.php" >Home</a>
                            <a href="login.php">Login</a>
                            <a href="register.php">Register</a>';
                     }
                    ?>
                </div>
        </div>
	</header>
</body>
</html>
