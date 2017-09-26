<?php

namespace App\controllers;

use App\entities\Account as Account;
use App\dao\AccountDAO as AccountDAO;

class UsersController {

    public function signIn() {
        return include('lib/views/users/sign_in.php');      
    }

    public function login() {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $acc = new Account();
        $acc->setEmail($email);
        $acc->setPassword($password);

        $adao = new AccountDAO();
        $validated = $adao->verifyData($acc);

        if($validated) {
            $_SESSION['signed_in'] = true;
            header("Location: /dashboard");
        } else {
            $_SESSION['error'] = "Usuário e senha não correspondem ou não existe.";
            header("Location: /users/sign_in");
        }
    }

    public function cadastro() {
        return include('lib/views/users/sign_up.php');      
    }

    public function cadastrar() {
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $cidade   = $_POST['cidade'];

        $acc = new Account();
        $acc->setEmail($email);
        $acc->setPassword($password);
        $acc->setCidade($cidade);

        $adao = new AccountDAO();
        
        if($adao->emailExist($email)) {
            $_SESSION['error'] = "E-mail já cadastrado.";
            header("Location: /users/sign_up");
        } else {
            $adao->insertAccount($acc);
            $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
            header('Location: /users/sign_in');
        }
    }

    public function signOut() {
        if($_SESSION['signed_in']) {
            unset($_SESSION['signed_in']);
            $_SESSION['msg'] = "Você foi desconectado com sucesso.";
            header("Location: /users/sign_in");
        }      
    }

    public function recoverForm() {
        return include('lib/views/users/recover_form.php');      
    }

    public function recover() {
        $email    = $_POST['email'];
        $cidade   = $_POST['cidade'];

        $acc = new Account();
        $acc->setEmail($email);
        $acc->setCidade($cidade);

        $adao = new AccountDAO();
        
        if($adao->verifyRecover($acc)) {
            $_SESSION['recoverEmail'] = $email;
            header("Location: /users/new_password_form");
        } else {
            $_SESSION['error'] = "E-mail ou cidade não conferem com o cadastrado.";
            header('Location: /users/recover_form');
        }
    }

    public function newPasswordForm() {
        return include('lib/views/users/new_password_form.php');      
    }

    public function newPassword(){
        $email = $_SESSION['recoverEmail'];
        $pass1 = $_POST['novaSenha'];
        $pass2 = $_POST['confirmarSenha'];

        if ($pass1 != $pass2) {
            $_SESSION['error'] = "Senhas não confererem, digite novamente.";
            header("Location: nova_senha.php");
        }
        
        $acc = new Account();
        $acc->setEmail($email);
        $acc->setPassword($pass1);

        $adao = new AccountDAO();
        
        if($adao->updatePassword($acc)) {
            unset($_SESSION['recoverEmail']);
            $_SESSION['msg'] = "Senha atualizada com sucesso.";
            header("Location: /users/sign_in");
        } else {
            $_SESSION['error'] = "Houve um erro ao atualizar o e-mail e a senha.";
            header('Location: /users/new_password_form');
        }
    }
}