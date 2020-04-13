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
        /* Sender informasjonen til databasen og setter inn aktiviteter i aktivitetsplanen */
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
            
        header("Location: ../index.php?page=myactivities");

    }
} elseif (isset($_POST['deleteactivity'])) {
     /* Sender informasjonen til databasen og sletter den valgte planlagte aktiviteten */
        try {
            $userplanid = $_POST['userplanid'];
            require '../database.php';
            
            $sql_delete = "delete from `Userplan` where iduserplan=?";
            $stmt_delete = $connection->prepare($sql_delete);
            $stmt_delete->bind_param("i", $userplanid);

            $stmt_delete->execute();

            $stmt_delete->close();
            $connection->close();
  
        } catch (Exception $ex) {
            echo 'Exception occurred ' . $ex->getTraceAsString();
        }
            
        header("Location: ../index.php?page=myactivities");

} else {
    header("Location: ../index.php?error=planactivity");
    exit();
}