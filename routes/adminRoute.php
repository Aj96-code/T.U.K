<?php

  $router->get("/dashboard", function()
    {
        $title = "DashBoard";
        ob_start();
            require_once("./layouts/views/admin/dashboard.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
?>