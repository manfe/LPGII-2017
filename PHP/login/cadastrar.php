<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 
                                          'aes-128-cbc', 
                                          '!2#4%6', 
                                          true, 
                                          '0123456789123456');

    $dados = array($email, $encrypted_password);                         

    $file = fopen('users.csv', 'a');

    fputcsv($file, $dados);

    fclose($file);

    echo "Dados inseridos no arquivo users.csv";

?>