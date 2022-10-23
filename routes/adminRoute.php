<?php

  $router->get("/dashboard", function()
    {
        $title = "About";
        ob_start();
            require_once("./layouts/views/admin/dashboard.php");
        $body = ob_get_clean();
    });
?>