<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use App\entities\Product as Product;
use \PDO;

class ProductDAO {

    public function insertProduct($product) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO products (nome_product, valor_product, id_category)
                                    VALUES(:nome, :valor, :id_category)');
        $status = $stmt->execute(array(
            ':nome' => $product->getNome(),
            ':valor' => $product->getValor(),
            ':id_category' => $product->getCategoria()
        ));
        
        return $status;        
    }
    
    public function all() {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM products p
                                    JOIN categories c
                                    ON (c.id_category = p.id_category)');
        $stmt->execute();
        
        $produts = [];

        foreach($stmt->fetchAll() as $product) {
            $p = new Product();
            $p->setId($product['id_product']);
            $p->setNome($product['nome_product']);
            $p->setValor($product['valor_product']);
            $p->setCategoria($product['nome_category']);

            $products[] = $p;
        }
        
        return $products;      
    }

    public function find($id) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM products WHERE id_product = :id');
        $stmt->execute(array(
            ':id' => $id
        ));
        
        foreach($stmt->fetchAll() as $product) {
            $p = new Product();
            $p->setId($product['id_product']);
            $p->setNome($product['nome_product']);
            $p->setValor($product['valor_product']);
        }
        
        return $p;
    }
}