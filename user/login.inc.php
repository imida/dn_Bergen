<?php

/* Sjekker om noen av knappene er blitt trykket */
if (isset($_POST['login-submit']) || isset($_POST['signup'])) {

   /* Bruker passord og email til å lete gjennom databasen etter en bruker */
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    /* Sjekker at ingen felt er tomme. Om passord eller email mangler blir brukeren sendt til forsiden */
    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        /* Feltene er fylt ut og vi kan sjekke om brukeren finnes i databasen */
        require '../database.php';
        $sql = "SELECT * FROM User WHERE Email=?";
        $stmt = $connection->prepare($sql);
        /* "Bind" gjør at databasen vil tolke det som en parameter i stedet for en kommando,
         det vil si at vi beskytter oss mot sql_injection */
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $resultObj = $stmt->get_result();
        $row = $resultObj->fetch_assoc();

        if ($row != null) 
        { 
            /* Brukeren er funnet og nå sjekker vi passordet */ 
            $pwdCheck = password_verify($password, $row['Password']);
            if ($pwdCheck == false) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            } else if ($pwdCheck == true) {
                /* Brukeren finnes og passordet stemmer */
                session_start();
                $_SESSION['idUser'] = $row['idUser'];
                $_SESSION['Firstname'] = $row['Firstname'];
                $_SESSION['Lastname'] = $row['Lastname'];
                $_SESSION['Email'] = $row['Email'];
                header("Location: ../index.php");
            }
        } 
        else {
            /* Brukeren finnes ikke */
            header("Location: ../index.php?error=nouser");
         }
         
        /* Datbasekoblingen lukkes */
        $stmt->close();
        $connection->close();

    }
} else {
    header("Location: ../index.php");
    exit();
}