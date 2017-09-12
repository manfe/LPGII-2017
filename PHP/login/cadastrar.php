<?php
    require('start.php');

    use App\utils\Encryptor as Encryptor;
    use App\db\DatabaseCSV as DatabaseCSV;

    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = Encryptor::encrypt($password);
    
    $dados = array($email, $encrypted_password);

    $db = new DatabaseCSV();
    
    if($db->emailExist($email)) {
        $_SESSION['error'] = "E-mail já cadastrado.";
        header("Location: cadastro.php");
    } else {
        $db->saveData($dados);
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header('Location: index.php');
    }
    
?>