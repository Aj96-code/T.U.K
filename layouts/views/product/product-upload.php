<?php 
    require_once("./db/conn/conn.php");
    if(isset($_POST["submit"]))
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

                 $product = new Product($pdo);
                 $added = $product->insertProduct($_POST["name"],$_POST["detail"],$_POST["price"],
                            $_POST["color"], $image,$_POST["type"],$_POST["size"],$_POST["inStock"]);
                if(empty($added))
                {
                    session_start();
                    $_SESSION["errorMessage"] = "Failed to add Product";
                    header("Location: /product-form");
                }
                else
                {

                    header("Location: /product-list-view");
                }
            }
        }
        else
        {
            session_start();
            $_SESSION["errorMessage"] = "<b>Wrong Image Type;</b> Correct Image Types are <strong>['jpg','jpeg','png','gif']</strong>";
            header("Location: /product-form");
        }


    }
    else
    {
        header("Location: /");
    }
?>