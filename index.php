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
  <?php 
  echo '<a href="'.$loginout_href.'" style="float:right">'.$loginout_text.'</a>';
  ?>
</div>
  
  <div class="column middle">
    <h2>Main Content</h2>
    <?php
    $page = $_GET["page"];
    $error = $_GET["error"];
    
    echo 'Session here:';
    echo '<pre>';
    print_r ($_SESSION);
    echo '</pre>';
        
    echo 'Post here:';
    echo '<pre>';
    print_r ($_POST);
    echo '</pre>';
    echo 'Feil (dust): ' . $error; 
    if ($page == "login") {
        ?>
                <form action="user/login.inc.php" method="post">
                    <input type="text" name="mailuid" placeholder="Username/e-mail">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="login-submit">login</button>
                </form>
                <a href="?page=signup">Signup </a>
                
     <?php
            
     } 
     elseif ($page == "map") {
         include 'pages/map.php';
     }
     elseif ($page == "activities") {
         include 'pages/activities.php';
     }
     elseif ($page == "weather") {
         include 'pages/weather/yr.php';
     }
     elseif ($page == "logout") {
         session_destroy();
         header("Location: index.php");
     }
     elseif ($page == "signup") {
         include 'user/signup.php';
     }
      
    ?>
  </div>


  
</body>