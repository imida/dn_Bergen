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
/*
$query = "select * from Activitytype order by idActivitytype";
$resultObj = $connection->query($query);

if ($resultObj->num_rows >0) 
{ 
    while ($singleRowFromQuery =$resultObj->fetch_assoc())
    {
        print_r($singleRowFromQuery);
    }
}  
    
echo "connected";

$connection->close();

*/

