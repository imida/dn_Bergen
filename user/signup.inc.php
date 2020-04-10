<?php

if (isset($_POST['signup'])) {

    /* Henter ut verdiene fra "signup.php" */
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwdrep'];
    $hashedPwd = '';

    /* sjekker om alle feltene er fylt ut */
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    }
    /* sjekker at email adressen bare består av gyldige tegn */ else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidmail&uid=" . $firstname);
        exit();
    }
    /* sjekker om passord og det gjantakende passordet er det samme */ else if ($password !== $passwordRepeat) {
        header("Location: ../index.php?error=passwordcheckuid" . $username . "&email=" . $email);
        exit();
    } else {
        /* Sender informasjonen til databasen og ser om emailen finnes */
        try {
            require '../database.php';
            $sql = "SELECT * FROM User WHERE Email=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            $resultObj = $stmt->get_result();
            $row = $resultObj->fetch_assoc();

            /* Nektes adgang om mailen finnes */
            if ($row != null) {
                $stmt->close();
                $connection->close();
                header("Location: ../index.php?error=userexist");
            } else {
                $stmt->close();
                $connection->close();
                require '../database.php';
                echo "Connected - ";

                /* Emailen finnes ikke fra før av og databasen blir oppdatert */
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql_insert = "INSERT INTO `User` (`Firstname`, `Lastname`, `Email`, `Password`) VALUES (?, ?, ?, ?)";
                //$sql_insert = "INSERT INTO User VALUES (?, ?, ?, ?)";
                
                $stmt_insert = $connection->prepare($sql_insert);
                $bind_value = $stmt_insert->bind_param("ssss", $firstname, $lastname, $email, $hashedPwd);
                if (!$bind_value) {
                    echo "Is problem with bind values?: (" . $bind_value->errno . ") " . $bind_value->error;
                } else {
                    echo "Bind ok - ";
                }
                $query_result = $stmt_insert->execute();
                echo " Query result: " . $query_result;
                $connection->commit();
                echo "Committed - ";
                $stmt_insert->close();
                $connection->close();
                echo "Closed - ";

                /* Brukeren er opprettet og blir nå logget inn */
                //require 'login.inc.php';
            }
        } catch (Exception $ex) {
            echo 'Exception occurred ' . $ex->getTraceAsString();
        }
    }
} else {
    header("Location: ../index.php?error=noSignup");
    exit();
}

    
    