<?php
namespace td2fhealthcare\Connect;

use PDO;
use PDOException;

class Connect {
    private $username;
    private $password;
    private $host;
    private $db;

    public function connectParams()

    {
        $this->username = 'root';
        $this->password = '';
        $this->host = 'localhost';
        $this->db = 'specialprojectdb';

    }

    public function connect()

{
    $this->connectParams();
    
    try{
        
        $conn= new PDO('mysql:host=' . $this->host .'; dbname=' . $this->db . ';charset=utf8' ,$this->username, $this->password);
        
       // print_r($conn);
        //exit('error4');
        return $conn;
    } catch (PDOException $e){
        echo "An error occured conecting to the database:"  . $e->getMessage();
        exit();


    }
}



}