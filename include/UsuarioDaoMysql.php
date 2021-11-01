<?php

require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO{
    private $pdo; 
    
    public function  __construct(PDO $driver){
        $this->pdo = $driver;
    }
    
    public function add(Usuario $u){
        $sql = $this->pdo->prepare("INSERT INTO php (name, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }
    public function findAll(){
        $array = array();
        $sql = $this->pdo->query("SELECT * FROM php");
        if($sql->rowCount() > 0){
            $data = $sql->fetchAll();

            foreach($data as $item){
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setName($item['name']);
                $u->setEmail($item['email']);
                $array [] = $u;
            }
        }
        return $array;
    }
    public function findByEmail($email){
        $sql = $this->pdo->prepare("SELECT * FROM php where email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);
            return $u;
        }else { 
            return false;
        }

    } 
    public function findById($id){
        $sql = $this->pdo->prepare("SELECT * FROM php where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0){
            $data = $sql->fetch();
            $u = new Usuario();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);
            return $u;
        }else { 
            return false;
        }

    } 
    
    public function update(Usuario $u){
        $sql = $this->pdo->prepare("UPDATE php SET name= :name, email= :email WHERE id = :id");
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();
        return true;
    }
    
    public function delete($id){

    }
}


?>