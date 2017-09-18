<?php
    if(isset($_SESSION['signed_in'])) {
        header("Location: dashboard.php");
    }
?>
