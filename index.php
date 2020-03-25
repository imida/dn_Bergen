<!DOCTYPE html>
<?php
        // put your code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: rgb(0, 119, 179);
  padding: 20px;
  text-align: center;
}
b
/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: rgb(191, 191, 191);
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

/* Middle column */
.column.middle {
  width: 100%;
  text-align: center;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
</head>
<body>

<div class="header">
  <h1>Header</h1>
</div>

<div class="topnav">
  <a href="index.php">Hjem</a>
  <a href="activities.php">Serverdigheter</a>
  <a href="activities.php">Spisesteder</a>
  <a href="mountains.php">Fjell</a>
  <a href="weather.php">Vær og klima</a>
  <a href="login.php" style="float:right">Logg inn</a>
</div>
  
  <div class="column middle">
    <h2>Main Content</h2>
    <p>midten</p>
    <p>Nystemnten</p>
   
  </div>


  
</body>