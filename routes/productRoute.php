<?php

    $router->get("/products", function()
    {
        ob_start();
            require_once("./layouts/views/product/product-list.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    $router->get("/product", function()
    {
        ob_start();
            require_once("./layouts/views/product/product.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product-form", function()
    {
        ob_start();
            require_once("./layouts/views/product/product-form.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

?>