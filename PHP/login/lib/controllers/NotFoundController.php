<?php
namespace App\controllers;

class NotFoundController {

    public function index() {       
       return include('lib/views/not_found/index.php');
    }

}