<?php

    require_once("db/conn/conn.php");
    $user = new User($pdo);
    //TODO: Build out Update Functionality
    if(isset($_POST["submit"]))
    {
        
    }
    else
    {
        //TODO: Complete Error Message
        echo "error";
    }


?>