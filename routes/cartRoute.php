<?php 
    $router->get("/cart", function()
    {
        ob_start();
            require_once("./layouts/views/cart/cart.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
?>