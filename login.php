<?php

include("conecta.php");

include ("banco-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if($usuario == null) {
    header("Location: index.php?login=0");
} else {
    include("logica-usuario.php");

    logaUsuario($usuario["email"]);

    header("Location: index.php?login=1");
}

die();