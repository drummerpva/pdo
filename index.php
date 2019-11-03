<?php

    $dsn = "mysql:dbname=blog;host=localhost";
    $dbUser = "root";
    $dbPass = "";
    try{
        $pdo = new PDO($dsn,$dbUser,$dbPass);
        $nome = "Testando";
        $email = "teste@teste.com";
        $senha = md5("admin");
        
        $sql = "UPDATE usuarios SET senha = '$senha' where id < 4";
        $sql = $pdo->query($sql);
        echo "<p> Usuario {$pdo->lastInsertId()} alterado com sucesso!</p>";
        
        
        $sql = "SELECT * FROM usuarios";
        $sql = $pdo->query($sql);
        if($sql->rowCount() > 0){
            foreach ($sql->fetchAll() as $usuario){
                echo "<p>Código: {$usuario['id']}<br>Usuário: {$usuario['nome']}<br> E-mail: {$usuario['email']}</p><hr>";
            }
        }
        $sql = "DELETE FROM usuarios WHERE id > 5";
        if($sql = $pdo->query($sql)){
            echo "Acima de 5 deletado com sucesso!";
        }
    } catch (Exception $ex) {
        echo "Erro na conexão! Erro: ".$ex->getMessage();
    }
