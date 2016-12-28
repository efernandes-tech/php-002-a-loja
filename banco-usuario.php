<?php

function buscaUsuario($conexao, $email, $senha) {
    // Criptografa a senha recebida para verificar com a senha criptografada no banco.
    $senhaMd5 = md5($senha);

    // Escapar caracteres especiais.
    $email = mysqli_real_escape_string($conexao, $email);

    $query = "SELECT * FROM usuarios WHERE email='{$email}' AND senha='{$senhaMd5}'";

    $resultado = mysqli_query($conexao, $query);

    $usuario = mysqli_fetch_assoc($resultado);

    return $usuario;
}