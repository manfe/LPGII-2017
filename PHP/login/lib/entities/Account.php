<?php

namespace App\entities;

use App\utils\Encryptor as Encryptor;

class Account {

    private $email;
    private $password;
    private $cidade;


    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = Encryptor::encrypt($password);
    }

    public function setCidade($cidade) {
        $this->cidade = strtolower($cidade);
    }

    public function getCidade() {
        return $this->cidade;
    }

}