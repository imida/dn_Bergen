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
            $userid = $row['idUser'];
            /* Brukeren er funnet og nå sjekker vi passordet */ 
            $pwdCheck = password_verify($password, $row['Password']);
            if ($pwdCheck == false) {
                header("Location: ../index.php?error=wrongpwd");
            } else if ($pwdCheck == true) {
                /* Brukeren finnes og passordet stemmer */
                session_start();
                $_SESSION['idUser'] = $row['idUser'];
                $_SESSION['Firstname'] = $row['Firstname'];
                $_SESSION['Lastname'] = $row['Lastname'];
                $_SESSION['Email'] = $row['Email'];
                
                header("Location: ../index.php");
            }
            $stmt->close();
            $connection->close();
            
            /* Setter inn i databasen med klokkeslett "nå" */ 
        try {
            $dat = date("Y-m-d H:i:s e");
            $sql_insert_log = "INSERT INTO Loginlog (Logindate, User_idUser, Success) VALUES (?, ?, ?)";
            require '../database.php';
            $stmt_insert_log = $connection->prepare($sql_insert_log);
            /* Setter inn verdiene for spørsmålstegnene, 
             * i = integer som vil si at verdien er et tall
             * $pwdCheck... hvis brukeren skrev inn passordet rett blir det registrert
             i "suksess kolonnen" som  1, men er passordet feil blir det 0. Da kan 
             eieren av brukeren se om det er noen som prøver å logge seg inn */
            $stmt_insert_log->bind_param("sii", $dat, $userid, $pwdCheck);
            $stmt_insert_log->execute();
            $stmt_insert_log->close();
            $connection->close();

         } catch (Exception $ex) {
            echo 'Exception occurred ' . $ex->getTraceAsString();
        }
        } 
        else {
            /* Brukeren finnes ikke */
            $stmt->close();
            $connection->close();

            header("Location: ../index.php?error=nouser");
         }
         
        /* Datbasekoblingen lukkes */
        

    }
} else {
    header("Location: ../index.php");
    exit();
}