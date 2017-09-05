<?php

class Alert {

    private static function success() {
        session_start();
        if(isset($_SESSION['msg'])) {
            echo '<p class="alert alert-success">' . $_SESSION['msg'] . '</p>';
            unset($_SESSION['msg']);
        }
    }


    private static function error() {
        session_start();
        if(isset($_SESSION['error'])) {
            echo '<p class="alert alert-danger">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
    }

    public static function showMessages() {
        Alert::error();
        Alert::success();
    }

}