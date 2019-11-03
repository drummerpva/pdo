<?php 
    require "conexao.php";
    session_start();
    if(!empty($_SESSION['id'])){
        
    }else{
        header("Location: login.php");
    }
?>
<a href="adicionar.php">Adicionar Novo Usuário</a>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0){
                foreach ($sql->fetchAll() as $usuario){
                    echo "<tr>";
                    echo "<td>{$usuario['nome']}</td>";
                    echo "<td>{$usuario['email']}</td>";
                    echo "<td><a href='editar.php?usuario={$usuario['id']}'>Editar</a> - <a href='excluir.php?usuario={$usuario['id']}'>Excluir</a></td>";
                    echo "</tr>";
                }
            }
        ?>
    </tbody>
</table>
<br>
Usuario: <?php echo $_SESSION['id']?>
<br><br>
<a href="logout.php">Logout</a>

