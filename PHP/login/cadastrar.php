<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 
                                          'aes-128-cbc', 
                                          '!2#4%6', 
                                          true, 
                                          '0123456789123456');

    $dados = array($email, $encrypted_password);                         

    $file = fopen('users.csv', 'r+');

    $existed = false;

    // PERCORRE ATÉ O EOF(END OF FILE) FINAL DO ARQUIVO
    while(!feof($file)) {
        // PEGA A LINHA ATUAL COM OS DADOS
        $data = fgetcsv($file);
        
        // PERCORRE OS VALORES DA LINHA
        foreach($data as $linha) {
            $login = $data[0];

            if ($login == $email) {
                $existed = true;
            }            
        }
    }
    
    fputcsv($file, $dados);

    fclose($file);

    if($existed) {
        $_SESSION['error'] = "E-mail já cadastrado.";
        header("Location: cadastro.php");
    } else {
        $_SESSION['msg'] = "Usuário cadastrado com sucesso.";
        header('Location: index.php');
    }
?>