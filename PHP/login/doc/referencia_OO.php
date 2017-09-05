<?php
class Pessoa {
    private $nome;

    function __construct() {
       print "Executado construtor da classe Pessoa.<br />";
    }

    public function falar($s) {
       $nome = $this->getNome();
       print "$nome falando: $s. <br />";
    }

    public function getNome() {
        return ucwords($this->nome);
    }

    public function setNome($s) {
        if(!is_string($s)){
            throw new Exception('$s deve ser uma string!');
        }
        $this->nome = $s;
    }

}

class Funcionario extends Pessoa {
   function __construct() {
       parent::__construct();
       print "Executado construtor da classe Funcionario<br />";
   }

   public static function trabalhar() {
       print "Funcionários trabalhando... <br />";
   }

}


$p = new Pessoa();
$p->setNome("bastião da silva");
$p->falar("besteira");


$f = new Funcionario();
$f->falar("blablabla");

Funcionario::trabalhar();

?>