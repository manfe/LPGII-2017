<?php
    session_start();

    if($_SESSION['signed_in']) {
        unset($_SESSION['signed_in']);
        $_SESSION['msg'] = "Você foi desconectado com sucesso.";
        header("Location: index.php");
    }
?>