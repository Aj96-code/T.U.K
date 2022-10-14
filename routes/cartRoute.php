<?php 
    $router->get("/cart", function()
    {
        $content = file_get_contents("./layouts/views/cart/cart.php");
        echo $_GET["id"];
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
?>