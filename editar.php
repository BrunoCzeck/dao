<?php 
require 'conexao/config.php';
include 'include/UsuarioDaoMysql.php';
$usuarioDao = new UsuarioDaoMysql($pdo);
$usuario = false;
$id = filter_input(INPUT_GET, 'id');
if($id){
    $usuario = $usuarioDao->findById($id);

}  
if($usuario === false){
    header("Location: index.php");
    exit;
}
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="editar_action.php" method="POST">
        <h1>Editar Usuário</h1>
        
        <input type="hidden" name="id" value="<?php echo $usuario->getId();?>" />
        
        <label>
            Nome:<br/>
            <input type="text" name="name" value="<?php echo $usuario->getName();?>" />
        </label>
        <br>
        <label>
            Email:<br/>
            <input type="email" name="email" value="<?php echo $usuario->getEmail();?>" />
        </label><br/><br/>
    <input type="submit" value="Enviar" />
    </form>  
</body>
</html>