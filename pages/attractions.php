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

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}
</style>
</head>
<body>

<?php    include 'includes/header.php';?>

<div class="topnav">
  <a href="index.php">Hjem</a>
  <a href="activities.php">Serverdigheter</a>
  <a href="activities.php">Spisesteder</a>
  <a href="mountains.php">Fjell</a>
  <a href="weather.php">Vær og klima</a>
  <a href="login.php" style="float:right">Logg inn</a>
</div>


<div class="row">

  <div class="column">

    <h2>1</h2>
    <p>hei</p>
  </div>
  
  <div class="column">
    <h2>2</h2>
    <p>hei igjen</p>
  </div>
  
  </div> 

</body>
