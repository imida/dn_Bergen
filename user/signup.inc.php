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
        header("Location: ../index.php?error=passwordcheckuid=" . $username . "&email=" . $email);
    } else {
        /* Sender informasjonen til databasen og ser om emailen finnes */
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

            /* Emailen finnes ikke fra før av og databasen blir oppdatert */
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO `bergendb`.`User`(`Firstname`,`Lastname`,`Email`,`Password`)
                    VALUES (?, ?, ?, ?)";
            $stmt_insert = $connection->prepare($sql);
            $stmt_insert->bind_param("ssss", $firstname, $lastname, $email, $hashedPwd);
            $stmt_insert->execute();
            $stmt_insert->close();
            $connection->close();

            /* Brukeren er opprettet og blir nå logget inn */
            require 'login.inc.php';
        }
    }
} else {
    header("Location: ../index.php?error=noSignup");
    exit();
}

    
    