<?php 
    require_once("./db/conn/conn.php");
    $user = new User($pdo);


    $added = $user->insertUser($_POST["username"],$_POST["email"],$_POST["password"]);
    if($added)
    {
        header("Location: /login");
    }
    else
    {
        session_start();
        $_SESSION["errorMessage"] = "User was not added";
        header("Location: /registration");
    }

?>