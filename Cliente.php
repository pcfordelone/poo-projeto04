<?php

class Cliente
{

    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $endereco;

    public function __construct($id,$nome,$email,$cpf,$endereco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
    }

}