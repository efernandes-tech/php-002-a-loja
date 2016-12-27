<?php

// Cria ou usa uma sessao.
session_start();

function usuarioEstaLogado() {
    // return isset($_COOKIE["usuario_logado"]);
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
    // Redireciona se nao estiver logado.
    if (!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Você não tem acesso a esta funcionalidade.";
        header("Location: index.php");
        die();
    }
}

function usuarioLogado() {
    // return $_COOKIE["usuario_logado"];
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email) {
    // setcookie("usuario_logado", $email);
    // setcookie("usuario_logado", $email, time()+60);
    $_SESSION["usuario_logado"] = $email;
}

function logout() {
    session_destroy();
    session_start();
}