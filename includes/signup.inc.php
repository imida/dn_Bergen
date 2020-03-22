<?php
if (isset($_POST['signup-submit'])) {
    
    require 'queries.php';
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    $hashedPwd ='';
     
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($passwordrepeat))  {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL) &&(!preg_match("/^[a-zA-Z0-9]*$/", $firstname))) {
        header("Location: ../signup.php?error=invalidmail&uid=".$firstname);
        exit();

    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            header("Location: ../signup.php?error=invalidmail&uid=".$firstname);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $firstname)) {
            header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    } 
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheckuid=".$username."&email=".$email); 
    }
    else {
        
        $sql = "SELECT uidUsers FROM user WHERE email=?"; 
        $stmt = mysql_stmt_init($connection);
        if (!mysql_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();     
        }
        else {
            mysql_stmt_bind_param($stmt, "s", $firstname);
            mysql_stmt_execute($stmt);
            mysql_stmt_store_result($stmt);
            $resultCheck = mysql_stmt_num_rows($stmt);
            if (condition > 0){
                 header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();  
            }
            else {
               $sql = "INSERT INTO users (idUser, Firstname, Lastname, Email, Password) VALUES (1, ?, ?, ?, ?)";  
               $stmt = mysql_stmt_init($connection);
               if (!mysql_stmt_prepare($stmt, $sql)) {
                 header("Location: ../signup.php?error=sqlerror");
                exit();     
                } 
                else { 
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                }

                mysql_stmt_bind_param($stmt, "ssss", $firstname, $lastname, $email, $hashedPwd);
                 /* må væew i samme rekkefølge som i den forrige else statmenten */
                mysql_stmt_execute($stmt);
                mysql_stmt_close($stmt);
                mysql_close($connection);
                header("Location: ../signup.php?signup=success");
                exit(); 
            }
        }
    }

   
}
else {
    header("Location: ../signup.php");
        exit(); 
}

    
    