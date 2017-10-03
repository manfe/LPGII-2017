<?php

namespace App\controllers;

class ProductsController {

    public function index() {
        // Aqui vai toda a consulta com o banco de dados

        return include('lib/views/products/index.php');      
    }

}