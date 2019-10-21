<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author EliR
 */
class User {
    private $conn;
    private $table_name = "users";
    public $id;
    public $userid;
    public $username;
    public $password;
    public $email;
    public $status;
    public $access_level;
    public $access_code;
    public $created;
    public $modified;
 
    // constructor
    public function __construct($db){
        $this->conn = $db;
    }
    public function userExists(){
        $query = "SELECT id, userid, access_level, password, status
            FROM " . $this->table_name . "
            WHERE username = ?
            LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $this->username=htmlspecialchars(strip_tags($this->username));
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
        $stmt->bind_result($this->id,$this->userid,$this->access_level,$this->password, $this->status);
        $stmt->fetch(); 
        $stmt->close();
        if(isset($this->id)){
            return true;
        }
        return false;
    }
     public function emailExists(){
        $query = "SELECT id, userid, access_level, password, status
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $this->email=htmlspecialchars(strip_tags($this->email));
        $stmt->bind_param("s", $this->email);
        $stmt->execute();
        $stmt->bind_result($this->id,$this->userid,$this->access_level,$this->password,$this->status);
        $stmt->fetch(); 
        $stmt->close();
        if(isset($this->id)){
            return true;
        }
        return false;
    }
    public function sendMail($subject,$msg){
        $headers  = 'MIME-Version: 1.0' . "\r\n";   
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Chatbot<chatbot@edog0049a.com>' . "\r\n"; 
        mail($this->email,$subject,$msg,$headers);
    }
    public function create() {
        $query = "INSERT INTO " . $this->table_name . 
                " SET   
                    userid = ?,
                    username = ?,
                    password = ?,
                    email = ?,
                    access_level = ?,
                    access_code = ?,
                    status = ?,
                    created = ?"; 
        $stmt = $this->conn->prepare( $query );
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->userid = md5(time() . uniqid().$this->username);
        $this->created=date('Y-m-d H:i:s');
        $this->access_code = md5(time() . uniqid());
        $this->access_level ="user";
        $this->status= "unverifed";
        $this->created=date('Y-m-d H:i:s');
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bind_param("ssssssss",$this->userid,$this->username, $this->password, $this->email, $this->access_level, $this->access_code, $this->status, $this->created);
         if($stmt->execute()){
            $stmt->close();
            $this->sendMail("cONFRIM eMAIL", $this->access_code);
            return true;
        }
        $stmt->close();
        return false;
    }
}
