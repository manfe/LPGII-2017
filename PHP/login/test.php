<?php
require('start.php');

use App\db\ConnectionFactory as ConnectionFactory;

$cf = new ConnectionFactory();

$consulta = $cf->conn->query("SELECT id_account, email, password FROM accounts;");

foreach ($consulta as $row) {
    // aqui eu mostro os valores de minha consulta
    echo "ID: {$row['id_account']} Email: {$row['email']} - Senha: {$row['password']}<br />";
}