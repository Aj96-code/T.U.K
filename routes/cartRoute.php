<?php 
    $router->get("/cart?id=", function()
    {
        session_start();
        if($_SESSION["loggedIn"])
        {
            $title = "Cart";
            ob_start();
                require_once("./db/conn/conn.php");
                $product = getProductById($pdo,$_GET["id"]);
                $user = new User($pdo);
                $objUser = $user->getUserByUsername($_SESSION["name"]);
                require_once("json.php");
                require_once("./layouts/views/cart/cart.php");
            $body = ob_get_clean();
            require_once("./layouts/shared/template.php");
        }
        else
        {
            header("Location: login");
        }
    });
    $router->get("/cart?rId=", function()
    {
        session_start();
        if($_SESSION["loggedIn"])
        {
            $title = "Cart";
            ob_start();
                require_once("./db/conn/conn.php");
                $product = getProductById($pdo,$_GET["id"]);
                $user = new User($pdo);
                $objUser = $user->getUserByUsername($_SESSION["name"]);
                require_once("json.php");
                require_once("./layouts/views/cart/cart.php");
            $body = ob_get_clean();
            require_once("./layouts/shared/template.php");
        }
        else
        {
            header("Location: login");
        }
    });

    $router->get("/cart", function()
    {
        session_start();
        if($_SESSION["loggedIn"])
        {
            $title = "Cart";
            ob_start();
                require_once("./db/conn/conn.php");
                $user = new User($pdo);
                $objUser = $user->getUserByUsername($_SESSION["name"]);
                require_once("json.php");
                require_once("./layouts/views/cart/cart.php");
            $body = ob_get_clean();
            require_once("./layouts/shared/template.php");
        }
        else
        {
            header("Location: login");
        }
    });
?>