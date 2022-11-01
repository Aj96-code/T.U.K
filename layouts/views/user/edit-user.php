<?php
    session_start();
    require_once("./db/conn/conn.php");
    $user = new User($pdo);

    if(isset($_POST["submit"]))
    {
        $updated = $user->updateUser_Admin(
            $_POST["id"],$_POST["username"],
            $_POST["email"],$_POST["password"],
            $_POST["firstName"],$_POST["lastName"],
            $_POST["gender"]);
        if($updated)
        {
            $_SESSION["success"] = "User information Updated";
            header("Location: /user-edit-form?id=" . $_POST["id"]);
        }
        else
        {
            $_SESSION["errorMessage"] = "User information was not updated";
            header("Location: /user-edit-form?id=".$_POST["id"]);
        }
    }
    else
    {
        $_SESSION["errorMessage"] = "User information was not updated";
        header("Location: /user-edit-form?id=".$_POST["id"]);
    }
?>