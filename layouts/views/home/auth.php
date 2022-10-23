<?php
    session_start();

    if(!empty($user))
    {
        session_regenerate_id();
        $_SESSION["loggedIn"] = true;
        $_SESSION["name"] = $user["username"];
        $_SESSION["id"] = $user["id"];
        $_SESSION["role"] = $user["user_role_id"] == 1 ? "admin" : "customer";
        if($_SESSION["role"] == "admin")
        {
            header("Location: /dashboard");
        } 
        else
        {
            header("Location: /");
        }
    }
    else
    {
        $_SESSION["errorMessage"] = "Incorrect <b>Username or Password</b>";
        header("Location: /login");
    }

?>