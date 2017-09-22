<?php

namespace App\controllers;

class HomeController {

    public function index() {
        return include('lib/views/home/index.php');      
    }

}