<?php
// Usando funcao explicita.
// function carregaClasse($nomeDaClasse) {
//     require_once("class/".$nomeDaClasse.".php");
// }
// // Registrando a função.
// spl_autoload_register("carregaClasse");

// Usando funcao implicita, ou função anônimas e tmb chamadas de closures.
spl_autoload_register(function($nomeDaClasse) {
    require_once("class/".$nomeDaClasse.".php");
});

// Visualiza todos os erros, exceto os avisos.
error_reporting(E_ALL ^ E_NOTICE);

require_once("mostra-alerta.php");

require_once("conecta.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Minha Loja</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/loja.css" rel="stylesheet">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Minha Loja</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                    <li><a href="produto-lista.php">Lista Produto</a></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
            </div>
        </div><!-- container acaba aqui -->
    </div>

    <div class="container">

        <div class="principal">

            <?php mostraAlerta("success"); ?>
            <?php mostraAlerta("danger"); ?>
