
<?php
/* henter aktivitetsplanen fra pålogget bruker */
    $userid = $_SESSION['idUser'];
    
    try {
        /* Oppretter forbindelse med databasen */
        require 'database.php';
        /* Spørringen som henter ut alle aktivitene i aktivitetstypen. "?" er en variabel som blir 
           satt utifra hvilken aktivitet brukeren trykkerpå i navigasjonsbaren */
        $sql = "select * from userplan where User_iduser=? order by activitydate";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $userid);
        $stmt->execute();

        $resultObj = $stmt->get_result();
       /* For hver rad i resultatsettet fra databasen soterer vi bilde, tekst og planleggingsformen
          i en tabell */
        if ($resultObj->num_rows > 0) {
            echo '<div class="row">';
            echo '<div class = "column">'; 
            echo '<table>';
            
            while ($row = $resultObj->fetch_assoc()) {
                
                echo '<tr>';
                echo '<td><img src="resources/bryggen.jpg" height="100px" ></td>';
                echo '<td><h2>' . $row["Header"] . '</h2>';
                echo '<p>' . $row["Text"] . '</p></div></td>';
                echo '<td>';
                echo '<form action="activityplan/activityplan.action.php" method="post">';
                echo '<input type="date" name="activitydate" placeholder="Dato">';
                echo '<input type="hidden" name="activityid" value="'.$row["idActivity"].'">';
                echo '<input type="hidden" name="userid" value="'.$_SESSION['idUser'].'">';
                echo '<button type="submit" name="planactivity" value="planactivity">Planlegg</button>';
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

