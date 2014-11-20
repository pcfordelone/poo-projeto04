<?php

namespace FRD\DB\Types;

use FRD\DB\DbConnection;

class PDO extends DbConnection
{
    private $dns;
    private $user;
    private $key;
    private $options;
    private $conn;

    public function __construct($setup)
    {
        $this->dns = $setup['dns'];
        $this->user = $setup['user'];
        $this->key = $setup['key'];
        $this->options = $setup['options'];
    }

    public function connectDb()
    {
        try {
            $this->conn = new \PDO($this->dns,$this->user,$this->key,$this->options);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) {
            echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
        }
        return $this->conn;
    }
}