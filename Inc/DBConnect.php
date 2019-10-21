<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Database{
    private $host = "localhost";
    private $db_name = "";
    private $username = "";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function getConnection(){
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
        if (!$this->conn) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        return $this->conn;
    }
    
    public function closeConnection() {
        mysqli_close($this->conn); 
    }
}


