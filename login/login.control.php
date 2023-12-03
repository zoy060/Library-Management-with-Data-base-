<?php

require_once '../includes/connect.php';
require_once 'login.model.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = $_POST['username'];
    $pwd = $_POST['pwd'];
    
    $dbUser = get_user($con, $user);
    if (!is_bool($dbUser) && $dbUser['username'] === $user && $dbUser['pass'] === $pwd) {
        echo "This user name is exist";
        echo $dbUser['member_id'];
        include_once '../includes/config_session.inc.php';
        $_SESSION["user"] = $dbUser['username'];
        $_SESSION["id"] = $dbUser['member_id'];
        $_SESSION["user_username"] = htmlentities($dbuser['username']);

        header("Location: login.php");


        $pdo = null;
        $stmt = null;
        die();
    }
    else{
        
        die("Wong pass");
    }
}