<?php 
    require_once("./db/conn/conn.php");
    $user = new User($pdo);

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

                 $added = $user->insertUser($_POST["username"],$_POST["email"],$_POST["password"],2,$image,$_POST["firstName"], $_POST["lastname"],$_POST["gender"]);
            
        
 
                if($added)
                {
                    header("Location: /login");
                }
                else
                {
                    session_start();
                    $_SESSION["errorMessage"] = "User was not added";
                    header("Location: /registration");
                }
            }
}
?>