<?php
    session_start();

    if(!empty($user))
    {
        session_regenerate_id();
        $_SESSION["loggedIn"] = true;
        $_SESSION["name"] = $user["username"];
        $_SESSION["id"] = $user["id"];
        header("Location: /");
    }
    else
    {
        $_SESSION["errorMessage"] = "Incorrect <b>Username or Password</b>";
        header("Location: /login");
    }

?>