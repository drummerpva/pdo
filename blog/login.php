<?php
    session_start();
    if(!empty($_POST['email'])){
        require 'conexao.php';
        $email = addslashes($_POST['email']);
        $senha = md5($_POST['senha']);
        $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha ='$senha'";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            $sql = $sql->fetch();
            $_SESSION['id'] =$sql['id']; 
            
        }else{
            header("Location: login.php");
        }
    }
    if(!empty($_SESSION['id'])){
        header("Location: index.php");
    }

?>
<form method="POST">
    <fieldset style="margin:auto;width: 200px;">
        <legend>Faça o Login</legend>
        E-mail:<br>
        <input type="email" name="email" required><br><br>
        Senha:<br>
        <input type="password" name="senha" required><br><br>
        <input type="submit" value="Entrar">
    </fieldset>
</form>