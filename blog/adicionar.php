<?php
require 'conexao.php';
if (!empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5($_POST['senha']);
    $sql = "INSERT INTO usuarios SET nome= '$nome', email='$email', senha='$senha'";
    if ($pdo->query($sql)) {
        header("Location: index.php");
    }
}
?>
<style>
    input{
        margin: 10px;
    }
</style>
<form method="POST">
    <fieldset>
        Nome: <input type="text" name="nome" required><br>
        E-mail: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </fieldset>
</form>


