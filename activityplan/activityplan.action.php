<?php

if (isset($_POST['planactivity'])) {

    /* Henter ut verdiene fra "activity.php" */
    $activityid = $_POST['activityid'];
    $activitydate = $_POST['activitydate'];
    $userid = $_POST['userid'];
  

    /* Sjekker om alle feltene er fylt ut */
    if (empty($activityid) || empty($activitydate) || empty($userid)) {
        header("Location: ../index.php?error=emptyfieldsactivity");
        exit();
        
    } else {
        /* Sender informasjonen til databasen og ser om emailen finnes */
        try {
            require '../database.php';
            
            $sql_insert = "INSERT INTO `Userplan` (`ActivityDate`, `Activity_idActivity`, `User_idUser`) VALUES (?, ?, ?)";
            $stmt_insert = $connection->prepare($sql_insert);
            $stmt_insert->bind_param("sii", date($activitydate), $activityid, $userid);

            $stmt_insert->execute();

            $stmt_insert->close();
            $connection->close();
  
        } catch (Exception $ex) {
            echo 'Exception occurred ' . $ex->getTraceAsString();
        }
            
        header("Location: ../index.php");

    }
} else {
    header("Location: ../index.php?error=planactivity");
    exit();
}