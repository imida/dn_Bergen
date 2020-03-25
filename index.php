<!DOCTYPE html>
<?php
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Bergen</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="includes/bergen.css">
</head>
<body>

<?php    include 'includes/header.php';?>


<div class="topnav">
  <a href="index.php">Hjem</a>
  <a href="activities.php">Serverdigheter</a>
  <a href="activities.php">Spisesteder</a>
  <a href="mountains.php">Fjell</a>
  <a href="weather.php">Vær og klima</a>
  <a href="?page=login" style="float:right">Logg inn</a>
</div>
  
  <div class="column middle">
    <h2>Main Content</h2>
    <?php
    $page = $_GET["page"];
    $error = $_GET["error"];
    echo 'Feil (dust): ' . $error; 
    if ($page == "login") {
        ?>
                <form action="user/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/e-mail">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="login-submit">login</button>
                </form>
                <a href="signup.php">Signup </a>
                <form action="user/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Logout</button>
                </form>
                
     <?php
            
     } 
    ?>
  </div>


  
</body>