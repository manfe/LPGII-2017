<?php
    session_start();

    if($_SESSION['signed_in']) {
        header("Location: dashboard.php");
    }
?>