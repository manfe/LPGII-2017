<?php
    session_start();

    if(!isset($_SESSION['signed_in'])) {
        header("Location: index.php");
    }
?>