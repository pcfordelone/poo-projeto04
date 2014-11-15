<?php

namespace FRD\Cliente;

abstract class ClienteAbstract
{

    protected $id;
    protected $nome;
    protected $email;
    protected $endereco;
    protected $tipo_de_cliente;
    protected $cobranca_especifica;
    protected $endereco_cobranca;
    protected $grau_de_importancia;

    /**
     * @param mixed $cobranca_especifica
     */
    public function setCobrancaEspecifica($cobranca_especifica)
    {
        $this->cobranca_especifica = $cobranca_especifica;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCobrancaEspecifica()
    {
        return $this->cobranca_especifica;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco_cobranca
     */
    public function setEnderecoCobranca($endereco_cobranca)
    {
        $this->endereco_cobranca = $endereco_cobranca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCobranca()
    {
        return $this->endereco_cobranca;
    }

    /**
     * @param mixed $grau_de_importancia
     */
    public function setGrauDeImportancia($grau_de_importancia)
    {
        $this->grau_de_importancia = $grau_de_importancia;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrauDeImportancia()
    {
        return $this->grau_de_importancia;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $tipo_de_cliente
     */
    public function setTipoDeCliente($tipo_de_cliente)
    {
        $this->tipo_de_cliente = $tipo_de_cliente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoDeCliente()
    {
        return $this->tipo_de_cliente;
    }


}