<?php
#     CRUD
// C -> Created 
// R -> Read 
// U -> Update
// D -> Delete

require 'config.php';
require 'include/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>

<a href="addCrud.php">Adicionar Usuário</a>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
</head>
    <body>
        <table border="1" width="100%">
            <tr>    
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        <?php foreach($lista as $usuario){ ?>
            <tr>
                <td><?php echo $usuario->getId(); ?></td>
                <td><?php echo $usuario->getName(); ?></td>
                <td><?php echo $usuario->getEmail();?></td>
                <td>
                    <a href="editar.php?id=<?php echo $usuario->getId(); ?>" style="text-decoration: none; color: black; color: green;">[ Editar ]</a>
                    <a href="deletar.php?id=<?php echo $usuario->getId(); ?>" style="text-decoration: none; color: black; color: red;" onclick=" return confirm('Deseja Deletar?')">[ Deletar ]</a>
                </td>
            </tr>
        <?php 
        }
        ?>
        </table>
    </body>
</html>
