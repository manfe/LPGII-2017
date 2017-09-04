<?php
    // Inicializa a Sessão
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $encrypted_password = openssl_encrypt($password, 
                                          'aes-128-cbc', 
                                          '!2#4%6', 
                                          true, 
                                          '0123456789123456');

    // ABRE O ARQUIVO PARA LEITURA (R)
    $file = fopen("./users.csv", 'r');

    // PERCORRE ATÉ O EOF(END OF FILE) FINAL DO ARQUIVO
    $validated = false;
    
    while(!feof($file)) {
        // PEGA A LINHA ATUAL COM OS DADOS
        $data = fgetcsv($file);
        
        $login_csv = $data[0];
        $password_csv = $data[1];

        if ($email == $login_csv && $password_csv == $encrypted_password) {
            $validated = true;
        }
    }

    // FECHA O ARQUIVO ABERTO PARA LEITURA
    fclose($file);

    if($validated) {
        $_SESSION['signed_in'] = true;
        header("Location: dashboard.php");
    } else {
        $_SESSION['error'] = "Usuário e senha não correspondem ou não existe.";
        header("Location: index.php");
    }
?>
