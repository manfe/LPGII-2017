<?php
    require("lib/Encryptor.php");
    require("lib/DatabaseCSV.php");
    
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = Encryptor::encrypt($password);

    $db = new DatabaseCSV();
    $validated = $db->verifyData($email, $encrypted_password);

    if($validated) {
        $_SESSION['signed_in'] = true;
        header("Location: dashboard.php");
    } else {
        $_SESSION['error'] = "Usuário e senha não correspondem ou não existe.";
        header("Location: index.php");
    }
?>
