<?php
    $router->get("/products", function()
    {
        $title = "Products";

        ob_start();

            require_once("./db/conn/conn.php");
            $result = getProductTypeResult($pdo);
            $products = getProducts($pdo);
            require_once("./layouts/views/product/product-list.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->post("/products", function()
    {
        $title = "Products";
        ob_start();

            require_once("./db/conn/conn.php");
            $result = getProductTypeResult($pdo);
            $product = new Product($pdo);
            $products = $product->getProductBySearchPhrase($_POST["search-phrase"]);
            require_once("./layouts/views/product/product-list.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    $router->get("/products?id=", function()
    {
        $title = "Product";
        ob_start();
            require_once("./db/conn/conn.php");
            $result = getProductTypeResult($pdo);
            $products = getProductsByTypeId($pdo,$_GET["id"]);

            require_once("./layouts/views/product/product-list.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product?id=", function()
    {
        $title = "Product";
        ob_start();
            require_once("./db/conn/conn.php");
            $product = getProductById($pdo,$_GET["id"]);
            require_once("./layouts/views/product/product.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product-form", function()
    {
        
        $title = "Add Product";
        ob_start();
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $result = getProductTypeResult($pdo);
                    $sizes = getProductSizeResult($pdo);
                    require_once("./layouts/views/product/product-form.php");                   
                }
                else
                {
                    $_SESSION["returnPath"] = "/product-form"; 
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");

    });
    
    $router->get("/product-form-edit?id=", function()
    {
        
        $title = "Edit Product";
        ob_start();
        session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $result = getProductTypeResult($pdo);
                    $sizes = getProductSizeResult($pdo);
                    $product = getProductById($pdo,$_GET["id"]);
                    require_once("./layouts/views/product/product-form-edit.php");
                }
                else
                {
                    $_SESSION["returnPath"] = "/product-form-edit?id=".$_GET["id"]; 
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");

    });

    $router->get("/product-delete?id=",function()
    {        
        ob_start();
        session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $product= new Product($pdo);
                    $result = $product->deleteProduct($_GET["id"]);
                    if($result)
                    {
                        header("Location: /product-list-view");
                    }    
                }
                else
                {
                    header("Location: /product-list-view");
                }
            }
            else
            {
                $_SESSION["returnPath"] = "/product-delete?id=".$_GET["id"]; 
                header("Location: /product-list-view");
            }


    });    

    $router->post("/product-edit", function()
    {
        ob_start();
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./layouts/views/product/product-edit.php");
                }
                else
                {
                    $_SESSION["returnPath"] = "/product-edit"; 
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        ob_get_clean();
    });


    $router->get("/product-list-view", function()
    {
        
        $title = "Products";
        ob_start();
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $products = getProducts($pdo);
                    require_once("./layouts/views/product/product-list-view.php");
                }
                else
                {
                    $_SESSION["returnPath"] = "/product-list-view"; 
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    $router->post("/product-upload", function()
    {
        ob_start();
        session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./layouts/views/product/product-upload.php");
                }
                else
                {
                    $_SESSION["returnPath"] = "/product-upload"; 
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        ob_get_clean();
    });
?>