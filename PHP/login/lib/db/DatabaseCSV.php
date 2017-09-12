<?php

namespace App\db;

class DatabaseCSV {
    private $file;

    function __construct() {
        $this->file = fopen('users.csv', 'r+');
    }

    public function emailExist($email) {
        $existed = false;
        
        while(!feof($this->file)) {
            
            $data = fgetcsv($this->file);
            
            foreach($data as $linha) {
                $login = $data[0];

                if ($login == $email) {
                    $existed = true;
                }            
            }
        }

        return $existed;
    }

    public function verifyData($email, $password) {
        $validated = false;
    
        while(!feof($this->file)) {        
            $data = fgetcsv($this->file);
            
            $login_csv = $data[0];
            $password_csv = $data[1];

            if ($email == $login_csv && $password_csv == $password) {
                $validated = true;
            }
        }

        return $validated;
    }

    public function saveData($data) {
        fputcsv($this->file, $data);
        $this->closeCSV();
    }

    private function closeCSV() {
        fclose($this->file);
    }

}




    
    
    

    