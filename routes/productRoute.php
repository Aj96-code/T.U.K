<?php
    $router->get("/products", function()
    {
        $title = "Products";

        ob_start();

        require_once("./db/conn/conn.php");
        $result = getProductTypeResult($pdo);
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
            require_once("./layouts/views/product/product-list.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product", function()
    {
        $title = "Product";
        ob_start();
            require_once("./layouts/views/product/product.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/product-form", function()
    {
        
        $title = "Add Product";
        ob_start();
            require_once("./db/conn/conn.php");
            $result = getProductTypeResult($pdo);
            $sizes = getProductSizeResult($pdo);
            require_once("./layouts/views/product/product-form.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");

    });

    $router->get("/product-list-view", function()
    {
        
        $title = "Products";
        ob_start();
            require_once("./layouts/views/product/product-list-view.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    $router->post("/product-upload", function()
    {
        ob_start();
            require_once("./layouts/views/product/product-upload.php");
        $body = ob_get_clean();
    });
?>