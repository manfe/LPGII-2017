<?php

namespace App\controllers;

class DashboardController {

    public function index() {
        // Aqui vai toda a consulta com o banco de dados

        return include('lib/views/dashboard/index.php');      
    }

}