<?php

namespace FRD\Cliente\Types;

use FRD\Cliente\ClienteAbstract;

class ClientePJType extends ClienteAbstract
{

    protected $cnpj;

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }


} 