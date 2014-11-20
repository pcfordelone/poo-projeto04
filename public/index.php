<?php

require_once "../autoload.php";
$setup['dns'] = "mysql:host=localhost;dbname=CODEDU_Mod03";
$setup['user'] = "root";
$setup['key'] = "root";
$setup['options'] = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];

$pdo = new \FRD\DB\Types\PDO($setup);
$db = $pdo->connectDb();

$stmt = $db->prepare("SELECT * FROM clientes");
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);

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
                if (!$clientes[$id]->tipo_cliente) : ?>
                    <p><b>Nome: </b><?php echo $clientes[$id]->nome ?></p>
                    <p><b>E-mail: </b><?php echo $clientes[$id]->email ?></p>
                    <p><b>Endereço: </b><?php echo $clientes[$id]->endereco ?></p>
                    <p><b>CPF: </b><?php echo $clientes[$id]->cpf ?></p>
                    <p><b>Grau de Importância: </b>
                        <?php
                        $grau = $clientes[$id]->grau_importancia;
                        for ($i=0; $i<$grau; $i++) {
                            echo "<span class='glyphicon glyphicon-star'></span>";
                        }
                        ?>
                    </p>

                    <?php
                    if ($clientes[$id]->cobranca_especifica) :
                        echo "<p><b>Endereço de Cobrança: </b>".$clientes[$id]->endereco_cobranca."</p>";
                    else :
                        echo "<p><b>Endereço de Cobrança: </b>".$clientes[$id]->endereco."</p>";
                    endif;

                else : ?>
                    <p><b>Nome: </b><?php echo $clientes[$id]->nome ?></p>
                    <p><b>E-mail: </b><?php echo $clientes[$id]->email ?></p>
                    <p><b>Endereço: </b><?php echo $clientes[$id]->endereco ?></p>
                    <p><b>CNPJ: </b><?php echo $clientes[$id]->cnpj ?></p>
                    <p><b>Grau de Importância: </b>
                        <?php
                        $grau = $clientes[$id]->grau_importancia;
                        for ($i=0; $i<$grau; $i++) {
                            echo "<span class='glyphicon glyphicon-star'></span>";
                        }
                        ?>
                    </p>
                    <?php
                    if ($clientes[$id]->cobranca_especifica) :
                        echo "<p><b>Nome: </b>".$clientes[$id]->endereco_cobranca."</p>";
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
                        <td><?php echo $value->id ?></td>
                        <td><a href="/?id=<?php echo $value->id ?>"><?php echo $value->nome ?></a></td>
                        <td><?php echo $value->email ?></td>
                        <td>
                            <?php
                            if ($value->tipo_cliente) {
                                echo "Pessoa Jurídica";
                            } else {
                                echo "Pessoa Física";
                            }
                            ?>
                        </td>
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