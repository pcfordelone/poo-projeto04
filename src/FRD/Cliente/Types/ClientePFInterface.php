<?php

interface ClientePFInterface
{

    public function getId();
    public function getNome();
    public function getEmail();
    public function getEndereco();
    public function getTipoDeCliente();
    public function getCobrancaEspecifica();
    public function getEnderecoCobranca();
    public function getGrauDeImportancia();
    public function getCpf();

} 