<?php
    session_start();
    include_once 'models/User.php';
    include_once 'DBConnect.php';
    $msg="";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]=true){
    header("location: /home/home");
    }
    if (htmlspecialchars(stripslashes($_SERVER["REQUEST_METHOD"])) === "POST") 
    {
        $username = htmlspecialchars(stripslashes($_POST['username']));
        $pass = htmlspecialchars(stripslashes($_POST['pass']));
        $database = new Database();
        $db = $database->getConnection();
        $user = new User($db);
        $user->username=$username;
        if($user->userExists()&& password_verify($pass, $user->password) && $user->status =="approved")
        {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"]= $user->username;
            $_SESSION["userid"]= $user->userid;
            $_SESSION["id"]= $user->id;
            $_SESSION["access_level"]= $user->access_level;
            header("location: /home/home");
        }
        else
        {
            $fail=true;
            if (!$user->userExists() || !password_verify($pass, $user->password)) {
            $mmsg = "Invalid Login";
        } elseif (!$user->status == "approved") {
            $mmsg = "Waiting for account approval!";
        }
    }
    }
   