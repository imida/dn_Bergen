<?php

if (isset($_POST['login-submit'])) {

    require '../queries.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysql_stmt_init($connection);
        if (!mysql_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysql_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysql_stmt_execute($stmt);
            $result = mysql_stmt_get_result($stmt);
            if ($row = mysql_fetch_assoc($result)) {
                $pwdCheck = password_vertify($password, $row['pwdUser']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ../index.php?login=success");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}