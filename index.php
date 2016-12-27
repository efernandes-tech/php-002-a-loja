<?php

include("cabecalho.php");
include("logica-usuario.php");

?>

<?php
if (isset($_SESSION["danger"])) {
?>
    <p class="alert-danger"><?php echo $_SESSION["danger"]; ?></p>
<?php
    // Remover a variavel da sessao.
    unset($_SESSION["danger"]);
}
?>

<?php
if (isset($_SESSION["success"])) {
?>
    <p class="alert-success"><?php echo $_SESSION["success"]; ?></p>
<?php
    // Remover a variavel da sessao.
    unset($_SESSION["success"]);
}
?>

<h1>Bem vindo!</h1>

<?php
if (usuarioEstaLogado()) {
?>
    <p class="alert-success">
        Você está logado como <?php echo usuarioLogado(); ?>
    </p>
    <a href="logout.php">Deslogar</a></p>
<?php
} else {
?>

<h2>Login</h2>

<form action="login.php" method="post">
    <table class="table">
        <tr>
            <td>Email</td>
            <td><input class="form-control" type="email" name="email"></td>
        </tr>
        <tr>
            <td>Senha</td>
            <td><input class="form-control" type="password" name="senha"></td>
        </tr>
        <tr>
            <td><button type="submit" class="btn btn-primary">Login</button></td>
        </tr>
    </table>
</form>

<?php
}
?>

<?php include("rodape.php"); ?>