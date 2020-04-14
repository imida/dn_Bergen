<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Bergen</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="includes/bergen.css">
    </head>
    <body>

        <?php
        session_start();

        include 'includes/header.php';

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
        if (isset($_SESSION['idUser'])) { 
            echo '<a href="?page=myactivities">Mine aktiviteter</a>';
        }
        ?>            
            
        <a href="?page=about" style="float:right">Om</a>
        <a href="?page=laws" style="float:right">Lover</a>
<?php
echo '<a href="' . $loginout_href . '" style="float:right">' . $loginout_text . '</a>';
?>
        </div>

            <?php
            /* Kobler sider med link */
            $page = $_GET["page"];
            $error = $_GET["error"];

            if (isset($_SESSION['Firstname'])) {
                echo '<p style="float:right; padding-right: 40px;">Hei, ' . $_SESSION['Firstname'] . '</p>';
            }

            if (isset($error)) {
                echo 'Det ble feil: ' . $error;
            }

            if ($page == "login") {
                include 'user/login.php';
            } elseif ($page == "map") {
                include 'pages/map.php';
            } elseif ($page == "activities") {
                include 'pages/activities.php';
            } elseif ($page == "weather") {
                include 'pages/weather/yr.php';
            } elseif ($page == "myactivities") {
                include 'pages/myactivities.php';
            } elseif ($page == "laws") {
                include 'pages/laws.php';
            } elseif ($page == "about") {
                include 'pages/about.php';
            } elseif ($page == "logout") {
                session_destroy();
                header("Location: index.php");
            } elseif ($page == "signup") {
                include 'user/signup.php';
            } else {
                include 'pages/welcome.php';
            }
            
            ?>

    </body>
</html>