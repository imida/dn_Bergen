<?php

if (isset($_POST['login-submit'])) {

    

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
  /*      $dbhost="localhost";
        $dbport="8889";
        $dbuser ="root";
        $dbpassword ="root";
        $dbdatabase= "bergendb";

        $connection = new mysqli($dbhost, $dbuser, $dbpassword, $dbdatabase, $dbport);

        if ($connection->connect_errno) 
        {
            header("Location: ../index.php?error=".$connection->connect_error);
            exit("failed; ".$connection->connect_error); 
        }
  */              
/*        $sql = "SELECT * FROM User WHERE Email=?";
        $stmt = mysql_stmt_init($connection);
        if (!mysql_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysql_stmt_bind_param($stmt, "s", $mailuid);
            mysql_stmt_execute($stmt);
            $result = mysql_stmt_get_result($stmt);
            if ($row = mysql_fetch_assoc($result)) {
                $pwdCheck = password_vertify($password, $row['Password']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['idUser'] = $row['idUser'];
                    $_SESSION['Firstname'] = $row['Firstname'];
                    $_SESSION['Lastname'] = $row['Lastname'];
                    $_SESSION['Email'] = $row['Email'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
 * 
 */
        require '../queries.php';
        $sql = "SELECT * FROM User WHERE Email=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $mailuid);
        $stmt->execute();
        
        //$resultObj = $connection->query($query);
        $resultObj = $stmt->get_result();
        $row = $resultObj->fetch_assoc();

        if ($row != null) 
        {
            session_start();
            $_SESSION['idUser'] = $row['idUser'];
            $_SESSION['Firstname'] = $row['Firstname'];
            $_SESSION['Lastname'] = $row['Lastname'];
            $_SESSION['Email'] = $row['Email'];
            header("Location: ../index.php?error=got this far: " . $row['Firstname']);
        } 
        else {
            header("Location: ../index.php?error=nouser");
         }

        $stmt->close();
        $connection->close();

    }
} else {
    header("Location: ../index.php");
    exit();
}