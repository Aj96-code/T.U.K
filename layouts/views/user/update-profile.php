<?php

    require_once("db/conn/conn.php");
    $user = new User($pdo);
    if(isset($_POST["submit"]))
    {
        session_start();
        $image = "";
        require_once("./db/conn/conn.php");
        $user = new User($pdo);
        $dbUser1 = $user->getUserByUsername($_SESSION["name"]);
        if($_FILES["image"]["size"] === 0)
        { 
            $imageFileType = strtolower(pathinfo("defualtImages/DefaultMaleImage.png",PATHINFO_EXTENSION));
            $imageBase64 = base64_encode(file_get_contents("defaultImages/DefaultMaleImage.png"));
            $image = empty($dbUser1["image"]) ? "data:image/$imageFileType;base64,$imageBase64" : $dbUser1["image"];
            $updated = $user->updateUser( $_SESSION["id"],            
                    $_POST["username"], $_POST["email"],$_POST["password"],$dbUser1["user_role_id"],$image,
                    $_POST["firstName"], $_POST["lastName"], $_POST["gender"]);
                    

                    if($updated)
                    {
                        header("Location: /profile");
                    }
                    else
                    {
                        header("Location: /profile");
                    }

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
                    
                    $updated = $user->updateUser( $_SESSION["id"],            
                    $_POST["username"], $_POST["email"],$_POST["password"],$dbUser1["user_role_id"],$image,
                    $_POST["firstName"], $_POST["lastName"], $_POST["gender"]);
                    

                    if($updated)
                    {

                        header("Location: /profile");
                    }
                    else
                    {
                        $_SESSION["errorMessage"] = "Profile Could Not update";
                        header("Location: /profile");
                    }
                }
            }
            else
            {
                $_SESSION["errorMessage"] = "Not a Supported file type, Supported File types are (jpg, jpeg, png, gif)";
                header("Location: /profile");
            }
        }
    }


?>