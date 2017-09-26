<?php
    if(!isset($_SESSION['signed_in'])) {
        $_SESSION['error'] = 'É necessário logar para efetuar essa ação.';
        header("Location: /users/sign_in");
    }
?>