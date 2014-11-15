<?php

define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$clientes[0] = new FRD\Cliente\Types\ClientePFType();
$clientes[0]
    ->setId(1)
    ->setNome("Cliente01")
    ->setEmail("cliente01@")
    ->setEndereco("Endereco01")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 01")
    ->setTipoDeCliente("Pessoa Física")
    ->setCpf("000.000.00-00")
;

$clientes[1] = new FRD\Cliente\Types\ClientePFType();
$clientes[1]
    ->setId(2)
    ->setNome("Cliente02")
    ->setEmail("cliente02@")
    ->setEndereco("Endereco02")
    ->setGrauDeImportancia(2)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente("Pessoa Física")
    ->setCpf("111.000.00-00")
;

$clientes[2] = new FRD\Cliente\Types\ClientePFType();
$clientes[2]
    ->setId(3)
    ->setNome("Cliente03")
    ->setEmail("cliente03@")
    ->setEndereco("Endereco03")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 03")
    ->setTipoDeCliente("Pessoa Física")
    ->setCpf("222.000.00-00")
;

$clientes[3] = new FRD\Cliente\Types\ClientePFType();
$clientes[3]
    ->setId(4)
    ->setNome("Cliente04")
    ->setEmail("cliente04@")
    ->setEndereco("Endereco04")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 04")
    ->setTipoDeCliente("Pessoa Física")
    ->setCpf("333.000.00-00")
;

$clientes[4] = new FRD\Cliente\Types\ClientePFType();
$clientes[4]
    ->setId(5)
    ->setNome("Cliente05")
    ->setEmail("cliente05@")
    ->setEndereco("Endereco04")
    ->setGrauDeImportancia(3)
    ->setCobrancaEspecifica(0)
    ->setTipoDeCliente("Pessoa Física")
    ->setCpf("444.000.00-00")
;

$clientes[5] = new FRD\Cliente\Types\ClientePJType();
$clientes[5]
    ->setId(6)
    ->setNome("Cliente06")
    ->setEmail("cliente06@")
    ->setEndereco("Endereco06")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 06")
    ->setTipoDeCliente("Pessoa Jurídica")
    ->setCnpj("55.000.000/0001-00")
;

$clientes[6] = new FRD\Cliente\Types\ClientePJType();
$clientes[6]
    ->setId(7)
    ->setNome("Cliente07")
    ->setEmail("cliente07@")
    ->setEndereco("Endereco07")
    ->setGrauDeImportancia(3)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 07")
    ->setTipoDeCliente("Pessoa Jurídica")
    ->setCnpj("66.000.000/0001-00")
;

$clientes[7] = new FRD\Cliente\Types\ClientePJType();
$clientes[7]
    ->setId(8)
    ->setNome("Cliente08")
    ->setEmail("cliente08@")
    ->setEndereco("Endereco08")
    ->setGrauDeImportancia(5)
    ->setTipoDeCliente("Pessoa Jurídica")
    ->setCnpj("77.000.000/0001-00")
;

$clientes[8] = new FRD\Cliente\Types\ClientePJType();
$clientes[8]
    ->setId(9)
    ->setNome("Cliente09")
    ->setEmail("cliente09@")
    ->setEndereco("Endereco09")
    ->setGrauDeImportancia(5)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 09")
    ->setTipoDeCliente("Pessoa Jurídica")
    ->setCnpj("88.000.000/0001-00")
;

$clientes[9] = new FRD\Cliente\Types\ClientePJType();
$clientes[9]
    ->setId(10)
    ->setNome("Cliente10")
    ->setEmail("cliente10@")
    ->setEndereco("Endereco10")
    ->setGrauDeImportancia(4)
    ->setCobrancaEspecifica(1)
    ->setEnderecoCobranca("Endereco Cobranca 06")
    ->setTipoDeCliente("Pessoa Jurídica")
    ->setCnpj("99.000.000/0001-00")
;

if (!isset($_GET['ordem'])) {
    ksort($clientes);
} elseif ($_GET['ordem'] == "descrescente") {
    krsort($clientes);
} else {
    ksort($clientes);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</head>

<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h3>Lista de Clientes</h3>

            <?php
            if (isset($_REQUEST['id'])) :
                $id = $_REQUEST['id'] - 1;
                if ($clientes[$id]->getTipoDeCliente() == "Pessoa Física") : ?>
                    <p><b>Nome: </b><?php echo $clientes[$id]->getNome() ?></p>
                    <p><b>E-mail: </b><?php echo $clientes[$id]->getEmail() ?></p>
                    <p><b>Endereço: </b><?php echo $clientes[$id]->getEndereco() ?></p>
                    <p><b>CPF: </b><?php echo $clientes[$id]->getCpf() ?></p>
                    <p><b>Grau de Importância: </b>
                    <?php
                        $grau = $clientes[$id]->getGrauDeImportancia();
                        for ($i=0; $i<$grau; $i++) {
                        echo "<span class='glyphicon glyphicon-star'></span>";
                        }
                    ?>
                    </p>

                    <?php
                    if ($clientes[$id]->getCobrancaEspecifica()) :
                        echo "<p><b>Endereço de Cobrança: </b>".$clientes[$id]->getEnderecoCobranca()."</p>";
                    else :
                        echo "<p><b>Endereço de Cobrança: </b>".$clientes[$id]->getEndereco()."</p>";
                    endif;

                else : ?>
                    <p><b>Nome: </b><?php echo $clientes[$id]->getNome() ?></p>
                    <p><b>E-mail: </b><?php echo $clientes[$id]->getEmail() ?></p>
                    <p><b>Endereço: </b><?php echo $clientes[$id]->getEndereco() ?></p>
                    <p><b>CNPJ: </b><?php echo $clientes[$id]->getCnpj() ?></p>
                    <p><b>Grau de Importância: </b>
                        <?php
                            $grau = $clientes[$id]->getGrauDeImportancia();
                            for ($i=0; $i<$grau; $i++) {
                                echo "<span class='glyphicon glyphicon-star'></span>";
                            }
                        ?>
                    </p>
                    <?php
                    if ($clientes[$id]->getCobrancaEspecifica()) :
                        echo "<p><b>Nome: </b>".$clientes[$id]->getEnderecoCobranca()."</p>";
                    endif;
                endif;
                echo "<a href='/'>Voltar</a>";
            else : ?>

            <div class="btn-group btn-group-xs">
                <a href="/?ordem=crescente" class="btn btn-default">
                    <em class="glyphicon glyphicon-arrow-down"></em>
                    Ordem Crescente
                </a>

                <a href="/?ordem=descrescente" class="btn btn-default">
                    <em class="glyphicon glyphicon-arrow-up"></em>
                    Ordem Decrescente
                </a>
            </div>


            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Pessoa Física/Jurídica</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $value) : ?>
                <tr>
                    <td><?php echo $value->getId() ?></td>
                    <td><a href="/?id=<?php echo $value->getId() ?>"><?php echo $value->getNome() ?></a></td>
                    <td><?php echo $value->getEmail() ?></td>
                    <td><?php echo $value->getTipoDeCliente() ?></td>
                </tr>
                </tbody>
                <?php endforeach ?>
            </table>
            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>