<?php

class Connection{
    
    private $servername="localhost";
    private $username ="root";
    private $password ="root";
    private $databasename="mydb";
    
   
    public function connect(){
        
    $conn =mysqli_connect($this->servername,$this->username,$this->password,$this->databasename);
    return $conn;
        
    }
    
    
    
    
    
    
}




?>