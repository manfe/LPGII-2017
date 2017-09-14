<?php
    require('start.php');

    use App\utils\Encryptor as Encryptor;
    use App\dao\AccountDAO as AccountDAO;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = Encryptor::encrypt($password);
    
    $dados = array('email' => $email,
                   'encrypted_password' => $encrypted_password);

    $adao = new AccountDAO();
    
    if($adao->emailExist($email)) {
        $_SESSION['error'] = "E-mail já cadastrado.";
        header("Location: cadastro.php");
    } else {
        $adao->insertAccount($dados);
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header('Location: index.php');
    }
    
?>