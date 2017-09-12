<?php

namespace App\utils;

class Encryptor {

    public static function encrypt($password) {
        return openssl_encrypt($password, 
                               'aes-128-cbc', 
                               '!2#4%6', 
                               true, 
                               '0123456789123456');
    }

}