<?php

/* connection with database */

$dbhost="localhost";
$dbport="8889";
$dbuser ="root";
$dbpassword ="root";
$dbdatabase= "bergendb";

$connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

if ($connection->connect_errno) 
{
    exit("failed; ".$connection->connect_error); 
}

echo "connected";

$connection->close();

