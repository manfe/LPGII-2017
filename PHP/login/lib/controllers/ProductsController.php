<?php

namespace App\controllers;

use App\entities\Product as Product;
use App\dao\ProductDAO as ProductDAO;

class ProductsController {

    public function index() {
        $pdao = new ProductDAO();
        $products = $pdao->all();

        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/index.php');      
    }

    public function new() {
        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/new.php');      
    }

    public function create() {
        $nome  = $_POST['nome'];
        $valor = $_POST['valor'];

        $p = new Product();
        $p->setNome($nome);
        $p->setValor($valor);

        $pdao = new ProductDAO();
        
        if($pdao->insertProduct($p)) {
            $_SESSION['msg'] = "Produto cadastrado com sucesso";
            header('Location: /admin/products');
            exit();
        } else {
            $_SESSION['error'] = "Ocorreu um erro ao cadastrar o produto, verifique os dados novamente.";
            return include('lib/views/products/new.php');
        }    
    }

    public function show() {
        $id = $_GET['id'];

        $pdao = new ProductDAO();
        $product = $pdao->find($id);

        return include('lib/views/products/show.php');
    }



}