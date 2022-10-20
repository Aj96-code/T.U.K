<?php
    require_once("./db/conn/conn.php");
    if(isset($_POST["submit"]))
    {
        $image = "";
        if($_FILES["image"]["size"] === 0)
        {
            $product = new Product($pdo);
            $image = $product->getProductByID($_POST["id"])["image"];
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
        }

        $product = new Product($pdo);
        $isEdited = $product->editProduct($_POST["id"],$_POST["name"],$_POST["detail"],$_POST["price"],
                        $_POST["color"], $image ,$_POST["type"],$_POST["size"],$_POST["inStock"]);


        
        if($isEdited)
        {
            header("Location: /product-list-view");
        }
        else
        {
            echo "Error";
        }
    }
?>