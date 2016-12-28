<?php

include("logica-usuario.php");

include("banco-usuario.php");

$usuario = buscaUsuario($conexao, $_POST["email"], $_POST["senha"]);

if ($usuario == null) {
    $_SESSION["danger"] = "Usuário ou senha inválido.";

    header("Location: index.php");
} else {
    logaUsuario($usuario["email"]);

    $_SESSION["success"] = "Usuário logado com sucesso.";

    header("Location: index.php");
}

die();