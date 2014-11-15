<?php

namespace FRD\Cliente\Types;
use FRD\Cliente\ClienteAbstract;

class ClientePFType extends ClienteAbstract
{

    protected $cpf;

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }


}