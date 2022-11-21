<?php
    require_once("./db/conn/conn.php");
    $user = new User($pdo);
    $result = $user->deleteUser($_GET["id"]);
    if($result)
    {
        header("Location: /user-list-view");
    }
    else
    {
        header("Location: /user-list-view");
    }

?>