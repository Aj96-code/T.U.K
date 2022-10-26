<?php

  $router->get("/dashboard", function()
    {
        $title = "DashBoard";
            require_once("./layouts/views/admin/dashboard.php");
    });
?>