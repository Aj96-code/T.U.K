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
        echo "error";
    }

?>