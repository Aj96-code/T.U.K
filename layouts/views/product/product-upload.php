<?php 
    require_once("./db/conn/conn.php");
    if(isset($_POST["submit"]))
    {
        $name =$_FILES["image"]["name"];
        $tarDir = "uploads/";
        $tarFile = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensionArray = array("jpg","jpeg","png","gif");

        if(in_array($imageFileType,$extensionArray))
        {
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $tarDir.$name))
            {
                 $imageBase64 = base64_encode(file_get_contents($tarDir.$name));
                 $image = "data:image/$imageFileType;base64,$imageBase64";

                 $product = new Product($pdo);
                 $product->insertProduct($_POST["name"],$_POST["detail"],$_POST["price"],
                        $_POST["color"], $image,$_POST["type"],$_POST["size"],$_POST["inStock"]);
            }
        }

        header("Location: /product-list-view");
    }
?>