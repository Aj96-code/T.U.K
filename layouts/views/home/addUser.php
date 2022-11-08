<?php 
    require_once("./db/conn/conn.php");
    $user = new User($pdo);
    $image = "";
    if($_FILES["image"]["size"] === 0)
    {

        $imageFileType = strtolower(pathinfo("defualtImages/DefaultMaleImage.png",PATHINFO_EXTENSION));
        $imageBase64 = base64_encode(file_get_contents("defaultImages/DefaultMaleImage.png"));
        $image = "data:image/$imageFileType;base64,$imageBase64";
    }
    else
    {
        $name =$_FILES["image"]["name"];
        $tarDir = "uploads/";
        $tarFile = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($tarFile,PATHINFO_EXTENSION));
        $extensionArray = array("jpg","jpeg","png","gif");

        if(in_array($imageFileType,$extensionArray))
        {
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $tarDir.$name))
            {
                 $imageBase64 = base64_encode(file_get_contents($tarDir.$name));
                 $image = "data:image/$imageFileType;base64,$imageBase64";

            }
        }
        else
        {
            session_start();
            $_SESSION["errorMessage"] = "Not a Supported file type, Supported File types are (jpg, jpeg, png, gif)";
            header("Location: /registration");
        }
    }

    $added = $user->insertUser($_POST["username"],$_POST["email"],$_POST["password"],2,$image,$_POST["firstName"], $_POST["lastName"],$_POST["gender"]);
    if($added)
    {
        header("Location: /login");
    }
    else if($added =="Username or Email already exist")
    {
        session_start();
        $_SESSION["errorMessage"] = "User with same username or email is already in the system";
        header("Location: /registration");
    }
    else
    {
        session_start();
            $_SESSION["errorMessage"] = "User Could not be Created";
        header("Location: /registration");
    }
?>