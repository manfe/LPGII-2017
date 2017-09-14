<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use \PDO;

class AccountDAO {

    public function insertAccount($dados) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO accounts (email, password)
                                    VALUES(:email, :ep)');
        $status = $stmt->execute(array(
            ':email' => $dados['email'],
            ':ep' => $dados['encrypted_password']
        ));
        
        return $status;        
    }

    public function emailExist($email) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM accounts WHERE email = :email');
        $stmt->execute(array(
            ':email' => $email
        ));
        
        return $stmt->fetch(PDO::FETCH_OBJ);        
    }

}