<?php 
    require_once("./db/conn/conn.php");
    $user = new User($pdo);

    if(isset($_POST["submit"]))
    {
        session_start();
        $image = "";
        if($_FILES["image"]["size"] === 0)
        { 
            $imageFileType = strtolower(pathinfo("defaultImages/DefaultMaleImage.png",PATHINFO_EXTENSION));
            $imageBase64 = base64_encode(file_get_contents("defaultImages/DefaultMaleImage.png"));
            $image = empty($dbUser1["image"]) ? "data:image/$imageFileType;base64,$imageBase64" : $dbUser1["image"];
            $added = $user->insertUser(
                $_POST["username"],$_POST["email"],
                $_POST["password"], $_POST["role"],
                $_POST["image"],$_POST["firstName"],
                $_POST["lastName"],$_POST["gender"]
            );

                    if($added)
                    {
                        header("Location: /user-list-view");
                    }
                    else
                    {
                        session_start();
                        $_SESSION["errorMessage"] = "Username or Email Already exist";
                        header("Location: /user-form");
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
                    
                    $added = $user->insertUser(
                        $_POST["username"],$_POST["email"],
                        $_POST["password"], $_POST["role"],
                        $_POST["image"],$_POST["firstName"],
                        $_POST["lastName"],$_POST["gender"]
                    );

                    if($added)
                    {

                        header("Location: /user-list-view");
                    }
                    else
                    {
                        $_SESSION["errorMessage"] = "Username or Email already exist";
                        header("Location: /user-form");
                    }
                }
            }
            else
            {
                $_SESSION["errorMessage"] = "Not a Supported file type, Supported File types are (jpg, jpeg, png, gif)";
                header("Location: /user-form");
            }
        }
    }
    else
    {
        session_start();
        $_SESSION["errorMessage"] = "Fail To submit Form";
    }
?>