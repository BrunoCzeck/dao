<?php

require 'conexao/config.php';
include 'include/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


if($name && $email){
    
    if($usuarioDao->findByEmail($email) === false){
        $newUser = new Usuario();
        $newUser-> setName($name);
        $newUser->setEmail($email);
        $usuarioDao->add($newUser);



    // Criando verificação 
   
        //$sql->bindParam(':email', $email); // Associo o proprio parametro a variavel e-mail
        header("Location: index.php");
        exit;
    }else {
        header("Location : addcrud.php"); 
        exit;
        // Fim da Verificação 
    }
}else{
    header("Location: addcrud.php");
    exit;
}


?>