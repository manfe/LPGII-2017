<?php
    require('start.php');

    use App\dao\AccountDAO as AccountDAO;
    use App\entities\Account as Account;

    $email    = $_POST['email'];
    $cidade   = $_POST['cidade'];

    $acc = new Account();
    $acc->setEmail($email);
    $acc->setCidade($cidade);

    $adao = new AccountDAO();
    
    if($adao->verifyRecover($acc)) {
        $_SESSION['recoverEmail'] = $email;
        header("Location: nova_senha.php");
    } else {
        $_SESSION['error'] = "E-mail ou cidade não conferem com o cadastrado.";
        header('Location: recuperacao.php');
    }
    
?>