<?php

    $router->get("/products", function()
    {
        $content = file_get_contents("./layouts/views/product/product-list.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
    $router->get("/product", function()
    {
        $content = file_get_contents("./layouts/views/product/product.php");
        echo $_GET["id"];
        $body = $content;
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product-form", function()
    {
        $content = file_get_contents("./layouts/views/product/product-form.php");
        echo $_GET["id"];
        $body = $content;
        require_once("./layouts/shared/template.php");
    });

?>