<?php
    require('start.php');

    use App\dao\AccountDAO as AccountDAO;
    use App\entities\Account as Account;

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
        header("Location: index.php");
    } else {
        $_SESSION['error'] = "Houve um erro ao atualizar o e-mail e a senha.";
        header('Location: nova_senha.php');
    }
    
?>