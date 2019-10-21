<?php
    session_start();
    include_once '../models/User.php';
    include_once '../Inc/DBConnect.php';
    if (htmlspecialchars(stripslashes($_SERVER["REQUEST_METHOD"])) === "POST")
    {
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
        $user->username = htmlspecialchars(stripslashes($_POST['username']));
        $user->email = htmlspecialchars(stripslashes($_POST['email']));
        if(($_POST['username']  || $_POST['email'] || $_POST['password'])==""){
            $fail = true;
            $msg="Invaild Form Data!";  
        }
        elseif($user->userExists()){
            $fail = true;
            $msg="Username already exists!";  
        }
        elseif($user->emailExists()){
            $fail = true;
            $msg="Email already used!";  
        }    
        else{
            $user->password = htmlspecialchars(stripslashes($_POST['password']));
            $user->email = htmlspecialchars(stripslashes($_POST['email']));
            $user->create();
            header("location: /");
        }
    }
