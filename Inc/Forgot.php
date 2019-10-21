<?php
    session_start();
    include_once '../../models/User.php';
    include_once '../../Inc/DBConnect.php';
    if (htmlspecialchars(stripslashes($_SERVER["REQUEST_METHOD"])) === "POST")
    {
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
        $user->email = htmlspecialchars(stripslashes($_POST['email']));
        if($_POST['email']==""){
            $fail = true;
            $msg="Invaild Form Data!";  
        }
        elseif($user->emailExists()){
            $user->email = htmlspecialchars(stripslashes($_POST['email']));
            $user->forgotPassword();
            header("location: /");
        }    
        else{
            $fail = true;
            $msg="Invaild Email!";  
        }
    }
