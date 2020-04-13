
<?php
/* henter aktivitetsplanen fra pålogget bruker */
    $userid = $_SESSION['idUser'];
    
    try {
        /* Oppretter forbindelse med databasen */
        require 'database.php';
        /* Spørringen som henter ut alle aktivitene i aktivitetstypen. "?" er en variabel som blir 
           satt utifra hvilken aktivitet brukeren trykkerpå i navigasjonsbaren */
        $sql = "select up.idUserplan
                , at.Menutext
                , a.Header
                , up.activitydate
           from userplan up
              , Activity a
              , Activitytype at
           where up.Activity_idActivity = a.idActivity
             and a.Activitytype_idActivitytype = at.idActivitytype
             and up.User_iduser = 3 order by activitydate";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $userid);
        $stmt->execute();

        $resultObj = $stmt->get_result();
       /* For hver rad i resultatsettet fra databasen soterer vi bilde, tekst og planleggingsformen
          i en tabell */
        if ($resultObj->num_rows > 0) {
            echo '<div class="row">';
            echo '<div class = "column">'; 
            echo '<table style="width: 70%;">';
            /* t står for table, r står for row, h står for heading. 
             * Dette utgjør overskriftsraden i tabellen */ 
            echo '<tr style="background-color: rgb(0, 119, 179); color: white;">';
            echo '<th>Type</th>';
            echo '<th>Aktivitet</th>';
            echo '<th>Dato</th>';
            /*nbsp = no breaking space, og gir en tom celle*/
            echo '<th>&nbsp;</th>';
            echo '</tr>';
            
            while ($row = $resultObj->fetch_assoc()) {
              /* t står for table, r står for row, d står for data. 
             * Dette utgjør verdiene i tabellen som blir hentet fra databasen */    
                echo '<tr>';
                echo '<td>' . $row["Menutext"]. '</td>';
                echo '<td>' . $row["Header"]. '</td>';
                echo '<td>' . $row["activitydate"]. '</td>';
 
                echo '<td>';
                echo '<form action="activityplan/activityplan.action.php" method="post">';
                echo '<input type="hidden" name="userplanid" value="'.$row["idUserplan"].'">';
                echo '<button type="submit" name="deleteactivity" value="deleteactivity">Slett</button>';
                echo '</form>';
                echo '</td>';
                
                echo '</tr>';
            }
            
            echo '</table></div>';
        }

        $stmt->close();
        $connection->close();
        
    } catch (Exception $ex) {
        echo 'Exception occurred ' . $ex->getTraceAsString();
    }
?>

