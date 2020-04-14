<?php

if (isset($_POST['signup'])) {

    /* Henter ut verdiene fra "signup.php" */
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwdrep'];
    $hashedPwd = '';

    /* Sjekker om alle feltene er fylt ut */
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    }
    /* Sjekker at email adressen bare består av gyldige tegn */ 
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../index.php?error=invalidmail&uid=" . $firstname);
        exit();
    }
    /* Sjekker om passord og det gjantakende passordet er det samme */ else if ($password !== $passwordRepeat) {
        header("Location: ../index.php?error=passwordcheckuid" . $username . "&email=" . $email);
        exit();
    } else {
        /* Sender informasjonen til databasen og ser om emailen finnes */
        try {
            /* denne linjen viser hva passordet må inneholde */
            $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
           
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
                
            /*sjekker at passordet er sikkert nok */
            } elseif (!preg_match($pattern, $password)){
                header("Location: ../index.php?page=signup&error=weakpassword");
            } 
            else {
                $stmt->close();
 
                /* Emailen finnes ikke fra før av og databasen blir oppdatert */
                /* Passordet blir kryptert */
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                $sql_insert = "INSERT INTO `User` (`Firstname`, `Lastname`, `Email`, `Password`) VALUES (?, ?, ?, ?)";
                $stmt_insert = $connection->prepare($sql_insert);
                $stmt_insert->bind_param("ssss", $firstname, $lastname, $email, $hashedPwd);
                
                $stmt_insert->execute();
                
                $stmt_insert->close();
                $connection->close();

                /* Brukeren er opprettet og blir nå logget inn */
                require 'login.inc.php';
            }
        } catch (Exception $ex) {
            echo 'Exception occurred ' . $ex->getTraceAsString();
        }
    }
} else {
    header("Location: ../index.php?error=noSignup");
    exit();
}

    
    