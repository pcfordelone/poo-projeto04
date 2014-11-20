<?php

namespace FRD\DB;

use FRD\Cliente\ClienteAbstract;
use FRD\Cliente\Types\ClientePFType;
use FRD\Cliente\Types\ClientePJType;

class DbFixtures
{
    private $conn;

    public function __construct(\PDO $conn)
    {
        $this->conn = $conn;
    }

    public function createTable()
    {
        try {
            $createTable = $this->conn->prepare(
                "CREATE TABLE IF NOT EXISTS `CODEDU_Mod03`.`clientes` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `nome` VARCHAR(45) NOT NULL,
                `email` VARCHAR(45) NOT NULL,
                `endereco` VARCHAR(45) NOT NULL,
                `grau_importancia` INT NULL,
                `cobranca_especifica` INT NULL,
                `endereco_cobranca` VARCHAR(45) NULL,
                `tipo_cliente` INT NOT NULL,
                `cpf` VARCHAR(45) NULL,
                `cnpj` VARCHAR(45) NULL,
                PRIMARY KEY (`id`),
                UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
                UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC));"
            );
            echo "Tabela `CODEDU_Mod03`.clientes` criada com sucesso <br/>";
            $createTable->execute();
        }
        catch (\PDOException $e) {
            echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
        }
    }

    public function persist(ClienteAbstract $cliente)
    {
        try {
            $this->conn->beginTransaction();

            if ($cliente instanceof ClientePFType) {

                $pdo = $this->conn->prepare(
                    ("INSERT INTO `CODEDU_Mod03`.`clientes` (`nome`, `email`, `endereco`, `grau_importancia`,`cobranca_especifica`, `endereco_cobranca`, `tipo_cliente`, `cpf`) VALUES (:nome, :email, :endereco, :grau_importancia, :cobranca_especifica, :endereco_cobranca, :tipo_cliente, :cpf);")
                );
                $pdo->bindValue(":nome", $cliente->getNome());
                $pdo->bindValue(":email", $cliente->getEmail());
                $pdo->bindValue(":endereco", $cliente->getEndereco());
                $pdo->bindValue(":grau_importancia", $cliente->getGrauDeImportancia());
                $pdo->bindValue(":cobranca_especifica", $cliente->getCobrancaEspecifica());
                $pdo->bindValue(":endereco_cobranca", $cliente->getEnderecoCobranca());
                $pdo->bindValue(":tipo_cliente", $cliente->getTipoDeCliente());
                $pdo->bindValue(":cpf", $cliente->getCpf());
            } elseif ($cliente instanceof ClientePJType) {
                $pdo = $this->conn->prepare(
                    ("INSERT INTO `CODEDU_Mod03`.`clientes` (`nome`, `email`, `endereco`, `grau_importancia`,`cobranca_especifica`, `endereco_cobranca`, `tipo_cliente`, `cnpj`) VALUES (:nome, :email, :endereco, :grau_importancia, :cobranca_especifica, :endereco_cobranca, :tipo_cliente, :cnpj);")
                );
                $pdo->bindValue(":nome", $cliente->getNome());
                $pdo->bindValue(":email", $cliente->getEmail());
                $pdo->bindValue(":endereco", $cliente->getEndereco());
                $pdo->bindValue(":grau_importancia", $cliente->getGrauDeImportancia());
                $pdo->bindValue(":cobranca_especifica", $cliente->getCobrancaEspecifica());
                $pdo->bindValue(":endereco_cobranca", $cliente->getEnderecoCobranca());
                $pdo->bindValue(":tipo_cliente", $cliente->getTipoDeCliente());
                $pdo->bindValue(":cnpj", $cliente->getCnpj());
            }
            echo "Usuário ".$cliente->getNome()." criado com sucesso. <br/>";
            $pdo->execute();
        } catch (\PDOException $e) {
            echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
            $this->conn->rollBack();
        }
    }


    public function flush()
    {
        try {
            $this->conn->commit();
        } catch (\PDOException $e) {
            echo "Não foi possível estabelecer uma conexão com o banco de dados.<br>Código do Erro: ".$e->getCode()."<br> Mensagem: ".$e->getMessage();
        }
    }
} 