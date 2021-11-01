<?php
Class Sql extends PDO{
      private $conn; 
      public function __construct(){
      $this->conn = PDO("mysql:12");
      }
}


?> 