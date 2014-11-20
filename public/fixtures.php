<meta charset="UTF-8" />
<?php

/*
Nessa última fase do projeto, você, ao invés de trabalhar com arrays,
você deverá persistir essas informações no banco de dados.

1. Em suas fixtures, você deverá criar uma classe com métodos
específicos para persistirem dados no banco.

2. Você terá que injetar no construtor dessa classe um objeto PDO (somente PDO).

3. Crie um método chamado persist dentro dessa mesma classe; esse método
deverá receber como dependência um objeto do tipo Cliente.

4. E para finalizar, crie um método chamado flush. Quando o método
for executado, os dados devem ser persistidos no banco de dados.

Perceba que a responsabilidade de gravar os dados no banco são
especificamente dessa classe, sem adicionar nenhuma outra responsabilidade a ela.

Boa sorte!

PS: Depois disso implementado, a listagem dos clientes devem ser
chamadas a partir do banco de dados e não mais de um conjunto de arrays.*/


define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$setup['dns'] = "mysql:host=localhost;dbname=CODEDU_Mod03";
$setup['user'] = "root";
$setup['key'] = "root";
$setup['options'] = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

$conn = new \FRD\DB\Types\PDO($setup);
$db = $conn->connectDb();

$fixture = new \FRD\DB\DbFixtures($db);
$fixture->createTable();


$cliente01 = new \FRD\Cliente\Types\ClientePFType();
$cliente01
    ->setNome("Cliente01")
    ->setEmail("cliente01@")
    ->setEndereco("Endereco01")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 01")
    ->setTipoDeCliente(0)
    ->setCpf("000.000.00-00")
;
$fixture->persist($cliente01);
$fixture->flush();

$cliente02 = new \FRD\Cliente\Types\ClientePFType();
$cliente02
    ->setNome("Cliente02")
    ->setEmail("cliente02@")
    ->setEndereco("Endereco02")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente(0)
    ->setCpf("222.111.111-11")
;
$fixture->persist($cliente02);
$fixture->flush();

$cliente03 = new \FRD\Cliente\Types\ClientePFType();
$cliente03
    ->setNome("Cliente03")
    ->setEmail("cliente03@")
    ->setEndereco("Endereco03")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereço Cobrança Cliente 03")
    ->setTipoDeCliente(0)
    ->setCpf("333.111.111-11")
;
$fixture->persist($cliente03);
$fixture->flush();

$cliente04 = new \FRD\Cliente\Types\ClientePFType();
$cliente04
    ->setNome("Cliente04")
    ->setEmail("cliente04@")
    ->setEndereco("Endereco04")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco cobranca 04")
    ->setTipoDeCliente(0)
    ->setCpf("444.111.111-11")
;
$fixture->persist($cliente04);
$fixture->flush();

$cliente05 = new \FRD\Cliente\Types\ClientePFType();
$cliente05
    ->setNome("Cliente05")
    ->setEmail("cliente05@")
    ->setEndereco("Endereco05")
    ->setGrauDeImportancia(2)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente(0)
    ->setCpf("555.111.111-11")
;
$fixture->persist($cliente05);
$fixture->flush();

$cliente06 = new \FRD\Cliente\Types\ClientePJType();
$cliente06
    ->setNome("Cliente06")
    ->setEmail("cliente06@")
    ->setEndereco("Endereco06")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereço Cobrança Cliente 06")
    ->setTipoDeCliente(1)
    ->setCnpj("66.666.666/0001-66")
;
$fixture->persist($cliente06);
$fixture->flush();

$cliente07 = new \FRD\Cliente\Types\ClientePJType();
$cliente07
    ->setNome("Cliente07")
    ->setEmail("cliente07@")
    ->setEndereco("Endereco07")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereço Cobrança Cliente 07")
    ->setTipoDeCliente(1)
    ->setCnpj("77.666.666/0001-66")
;
$fixture->persist($cliente07);
$fixture->flush();

$cliente08 = new \FRD\Cliente\Types\ClientePJType();
$cliente08
    ->setNome("Cliente08")
    ->setEmail("cliente08@")
    ->setEndereco("Endereco08")
    ->setGrauDeImportancia(3)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente(1)
    ->setCnpj("88.666.666/0001-66")
;
$fixture->persist($cliente08);
$fixture->flush();

$cliente09 = new \FRD\Cliente\Types\ClientePJType();
$cliente09
    ->setNome("Cliente09")
    ->setEmail("cliente09@")
    ->setEndereco("Endereco09")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereço Cobrança Cliente 09")
    ->setTipoDeCliente(1)
    ->setCnpj("09.666.666/0001-66")
;
$fixture->persist($cliente09);
$fixture->flush();

$cliente10 = new \FRD\Cliente\Types\ClientePJType();
$cliente10
    ->setNome("Cliente10")
    ->setEmail("cliente10@")
    ->setEndereco("Endereco10")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente(1)
    ->setCnpj("10.666.666/0001-66")
;
$fixture->persist($cliente10);
$fixture->flush();
?>