<?php

// DADOS
$login = "manfe";
$password = '1234567';

// CRIPTOGRAFIA E ARMAZENAMENTO EM ARQUIVO CSV
$encrypted_password = openssl_encrypt($password, 
                                        'aes-128-cbc', 
                                        '!2#4%6', 
                                        true, 
                                        '0123456789123456');

// CRIA UM ARRAY DOS DADOS A SEREM ARMAZENADOS
$dados = array($email, $encrypted_password);
// ABRE O ARQUIVO PARA EDIÇÃO
$file = fopen('users.csv', 'a');
// INSERE O ARRAY DE DADOS
fputcsv($file, $dados);
//FECHA O ARQUIVO
fclose($file);

// ABRE O ARQUIVO PARA LEITURA (R)
$file = fopen("./users.csv", 'r');

// PERCORRE ATÉ O EOF(END OF FILE) FINAL DO ARQUIVO
while(!feof($file)) {
    // PEGA A LINHA ATUAL COM OS DADOS
    $data = fgetcsv($file);
    
    // PERCORRE OS VALORES DA LINHA
    foreach($data as $linha => $valor) {
        echo "$valor";    
    }
}
// FECHA O ARQUIVO ABERTO PARA LEITURA
fclose($file);

?>