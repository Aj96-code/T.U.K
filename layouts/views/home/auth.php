<?php
    session_start();

    if(!empty($user))
    {
        session_regenerate_id();
        $_SESSION["loggedIn"] = true;
        $_SESSION["name"] = $user["username"];
        $_SESSION["id"] = $user["id"];
        $_SESSION["role"] = $user["user_role_id"] == 1 ? "admin" : "customer";
        $_SESSION["password"] = $_POST["password"];
        if($_SESSION["role"] == "admin")
        {
            if(isset($_SESSION["returnPath"]))
                header("Location: ".$_SESSION["returnPath"]);
            else
                header("Location: /dashboard");
        } 
        else
        {      
            if(isset($_SESSION["returnPath"]))
                header("Location: ".$_SESSION["returnPath"]);
            else
                header("Location: /");
        }
    }
    else
    {
        $_SESSION["errorMessage"] = "Incorrect <b>Username or Password</b>";
        header("Location: /login");
    }

?>