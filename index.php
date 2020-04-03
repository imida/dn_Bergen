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
<?php    
    session_start();
    $loginout_href = isset($_SESSION['idUser']) ? '?page=logout' : '?page=login';
    $loginout_text = isset($_SESSION['idUser']) ? 'Logg ut' : 'Logg inn';

?>


<div class="topnav">
  <a href="index.php">Hjem</a>
  <a href="?page=activities&type=1">Serverdigheter</a>
  <a href="?page=activities&type=2">Spisesteder</a>
  <a href="?page=activities&type=3">Fjell</a>
  <a href="?page=weather">Vær og klima</a>
  <a href="?page=map">Kart</a>
  <a href="?page=laws" style="float:right">Lover</a>
  <?php 
  echo '<a href="'.$loginout_href.'" style="float:right">'.$loginout_text.'</a>';
  ?>
</div>
  
    <?php
    /* Kobler sider med link */
    $page = $_GET["page"];
    $error = $_GET["error"];
     
    if ($page == "login") {
        include 'user/login.php';
    } elseif ($page == "map") {
        include 'pages/map.php';
    } elseif ($page == "activities") {
        include 'pages/activities.php';
    } elseif ($page == "weather") {
        include 'pages/weather/yr.php';
    } elseif ($page == "laws") {
        include 'pages/laws.php';
    } elseif ($page == "logout") {
        session_destroy();
        header("Location: index.php");
    } elseif ($page == "signup") {
        include 'user/signup.php';
    }
?>


  
</body>