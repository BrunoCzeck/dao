<?php

require 'conexao/config.php';
require 'include/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findAll();

?>
<!-- <a href="addCrud.php">Adicionar Usuário</a> -->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="estilo/style.css">
        <title>DAO</title>
    </head>
    <body>
        <div class="container mt-3">
            <section id="esquerda" class="row justify-content-end">
                <form id="form-2" class="form-container d-grid justify-content-end mt-1" action="addaction.php" method="POST">
                    <h1></h1>
                    <div class="form-group">
                    Nome:
                    <input class="form-control" type="text" name="name" />
                </div>
                <div class="form-group">
                    Email:
                    <input class="form-control" type="email" name="email" />
                </div>
                <button class="btn btn-primary mt-2" type="submit" value="Enviar">Enviar</button>
            </form>
        </section>
    </div>
    <div class="scrolltable">
    <section id="direita"> 
            <table class="table table-dark table-hover">
                <tr>    
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                <?php 
                foreach($lista as $usuario){ 
                ?>
                <tr>
                    <td><?php echo $usuario->getId(); ?></td>
                    <td><?php echo $usuario->getName(); ?></td>
                    <td><?php echo $usuario->getEmail();?></td>
                    <td class="d-grid">
                        <a href="editar.php?id=<?php echo $usuario->getId(); ?>" type="button" class="btn btn-success">Editar</a>
                        <a href="deletar.php?id=<?php echo $usuario->getId(); ?>" type="button" class="btn btn-danger" onclick="return confirm('Deseja Deletar?')">Deletar</a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </section>
    </div>
    </body>
</html>
