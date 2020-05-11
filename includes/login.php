<?php
include_once "../config.php"; 
session_start();

if(isset($_POST['login'])){

    $user = new User();
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    $user->selectUserByUsername($user->username);

    if($user->username === $user->db_username && $user->password === $user->db_password){
        $_SESSION['user_logged']=true;
        $_SESSION['username'] = $user->db_username;
        $_SESSION['first_name'] = $user->db_first_name;
        $_SESSION['last_name'] = $user->db_last_name;
        $_SESSION['role'] = $user->db_role;
        
        $user->admin();
        
    }else{
        $user->notAdmin();
    }

}



?>