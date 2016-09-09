<?php include("cabecalho.php"); ?>

        <h1>Formulário de cadastro</h1>
        <form action="adiciona-produto.php">
            Nome: <input type="text" name="nome" /><br/>
            Preço: <input type="number" name="preco" /><br/>

            <input type="submit" value="Cadastrar" />
        </form>

<?php include("rodape.php"); ?>