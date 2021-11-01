<?php

class Usuario{
    private $id;
    private $name;
    private $email;

    public function getId(){
        return $this->id;
    }
    public function setId($i){
        $this->id = trim($i); // no set e bom sempre colocar um trim. 
    }
    public function getName(){
        return $this->name;
    }
    public function setName($n){
        $this->name = ucwords(trim($n));
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($e){
        $this->email = strtolower(trim($e));
    }
}
    interface UsuarioDAO{
    public function add(Usuario $u); //  (Created) Cria do crud 
    public function findAll(); // read crud 
    public function findByEmail($email);
    public function findById($id); // Encontra pelo id
    public function update(Usuario $u); // Modifica 
    public function delete($id); // Deleta 
}




?>