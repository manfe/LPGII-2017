<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use App\entities\Category as Category;
use \PDO;

class CategoryDAO {

    public function all() {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM categories');
        $stmt->execute();
        
        $categories = [];

        foreach($stmt->fetchAll() as $category) {
            $c = new Category();
            $c->setId($category['id_category']);
            $c->setNome($category['nome_category']);

            $categories[] = $c;
        }
        
        return $categories;      
    }

}