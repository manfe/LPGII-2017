<?php
namespace App\dao;

use App\db\ConnectionFactory as ConnectionFactory;
use \PDO;

class AccountDAO {

    public function insertAccount($account) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('INSERT INTO accounts (email, password, cidade)
                                    VALUES(:email, :ep, :cidade)');
        $status = $stmt->execute(array(
            ':email' => $account->getEmail(),
            ':ep' => $account->getPassword(),
            ':cidade' => $account->getCidade()
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

    public function verifyRecover($account) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('SELECT * FROM accounts 
                                    WHERE email = :email AND cidade = :cidade');
        
        $status = $stmt->execute(array(
            ':email' => $account->getEmail(),
            ':cidade' => $account->getCidade()
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

    public function updatePassword($account) {
        $cf = new ConnectionFactory();

        $stmt = $cf->conn->prepare('UPDATE accounts set password = :password
                                    WHERE email = :email');
        $status = $stmt->execute(array(
            ':email' => $account->getEmail(),
            ':password' => $account->getPassword()
        ));
        
        return $status;        
    }

}