<?php

require_once "Cliente.php";

$clientes[0] = new Cliente (1,"Cliente01","cliente01@","000.000.000-00","Endereco 01");
$clientes[1] = new Cliente (2,"Cliente02","cliente02@","111.000.000-00","Endereco 02");
$clientes[2] = new Cliente (3,"Cliente03","cliente03@","222.000.000-00","Endereco 03");
$clientes[3] = new Cliente (4,"Cliente04","cliente04@","333.000.000-00","Endereco 04");
$clientes[4] = new Cliente (5,"Cliente05","cliente05@","444.000.000-00","Endereco 05");
$clientes[5] = new Cliente (6,"Cliente06","cliente06@","555.000.000-00","Endereco 06");
$clientes[6] = new Cliente (7,"Cliente07","cliente07@","666.000.000-00","Endereco 07");
$clientes[7] = new Cliente (8,"Cliente08","cliente08@","777.000.000-00","Endereco 08");
$clientes[8] = new Cliente (9,"Cliente09","cliente09@","888.000.000-00","Endereco 09");
$clientes[9] = new Cliente(10,"Cliente10","cliente10@","999.000.000-00","Endereco 10");

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

            <?php if (isset($_REQUEST['id'])) : $id = $_GET['id'] - 1; ?>
                <h3>Nome: <?php echo $clientes[$id]->nome ?></h3>
                <p>Email: <?php echo $clientes[$id]->email ?></p>
                <p>Email: <?php echo $clientes[$id]->cpf ?></p>
                <p>Email: <?php echo $clientes[$id]->endereco ?></p>
                <a href="/">voltar</a>
            <?php else : ?>

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
                    <th>CPF</th>
                    <th>Endereço</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($clientes as $value) : ?>
                <tr>
                    <td><?php echo $value->id ?></td>
                    <td><a href="/?id=<?php echo $value->id ?>"><?php echo $value->nome ?></a></td>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo $value->cpf ?></td>
                    <td><?php echo $value->endereco ?></td>
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