<?php

namespace App\controllers;

use App\models\Product as Product;
use App\models\Category as Category;

class ProductsController {

    public function index() {
        $products = Product::all();
        $total = Product::count();

        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/index.php');      
    }

    public function new() {
        $categories = Category::all(); 
        
        // Aqui vai toda a consulta com o banco de dados
        return include('lib/views/products/new.php');      
    }

    public function create() {
        $nome  = $_POST['nome'];
        $valor = $_POST['valor'];
        $category = $_POST['categoria'];

        $p = new Product;
        $p->nome = $nome;
        $p->valor = $valor;
        $p->category_id = $category;
        
        if($p->save()) {
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