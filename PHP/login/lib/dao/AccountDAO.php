<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use \PDO;

class AccountDAO {

    public function insertAccount($account) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO accounts (email, password)
                                    VALUES(:email, :ep)');
        $status = $stmt->execute(array(
            ':email' => $account->getEmail(),
            ':ep' => $account->getPassword()
        ));
        
        return $status;        
    }

    public function verifyData($account) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM accounts 
                                    WHERE email = :email AND password = :password');
        
        $status = $stmt->execute(array(
            ':email' => $account->getEmail(),
            ':password' => $account->getPassword()
        ));
        
        return $stmt->fetch(PDO::FETCH_OBJ);        
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