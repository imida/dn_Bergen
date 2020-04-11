
<?php

    $activitytype = $_GET["type"];
    try {
        require 'database.php';
        $sql = "select * from Activity where Activitytype_idActivitytype=? order by idActivity";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $activitytype);
        $stmt->execute();

        $resultObj = $stmt->get_result();
       
        if ($resultObj->num_rows > 0) {
            echo '<div class="row">';

            while ($row = $resultObj->fetch_assoc()) {
                echo '<div class = "column">';
                echo '<h2>' . $row["Header"] . '</h2>';
                echo '<p>' . $row["Text"] . '</p></div>';
            }
            echo '</div>';
        }

        $stmt->close();
        $connection->close();
        
    } catch (Exception $ex) {
        echo 'Exception occurred ' . $ex->getTraceAsString();
    }
?>
