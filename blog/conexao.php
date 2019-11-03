<?php
    $dsn = "mysql:dbname=blog;host=localhost";
    $dbUser = "root";
    $dbPass = "";
    try{
        $pdo = new PDO($dsn,$dbUser,$dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //mostra erros do SQL
        
    } catch (Exception $ex) {
        echo "<p> Conexao Falhou : {$ex->getMessage()}</p>";
    }

