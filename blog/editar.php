<?php
require './conexao.php';
$id;
$dado;
if (!empty($_GET['usuario'])) {
    $id = addslashes($_GET['usuario']);
}
if (!empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $sql = "UPDATE usuarios SET nome = '$nome', email='$email' WHERE id = $id";
    $pdo->query($sql);
    header("Location: index.php");
}

$sql = "SELECT * FROM usuarios WHERE id = $id";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0) {
    $dado = $sql->fetch();
} else {
    header("Location: index.php");
}
?>
<form method="POST">
    <fieldset>
        Nome: <input type="text" name="nome" value="<?php echo $dado['nome']; ?>"required><br>
        E-mail: <input type="email" name="email" value="<?php echo $dado['email']; ?>" required><br>
        <input type="submit" value="Atualizar">
    </fieldset>
</form>