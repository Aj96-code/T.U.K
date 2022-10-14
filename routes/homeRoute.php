<?php 
    $router->get("/", function()
    {
        $content = file_get_contents("./layouts/views/home/home.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
    $router->get("/login", function()
    {
        $content = file_get_contents("./layouts/views/home/login.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });

    $router->get("/about", function()
    {
        $content = file_get_contents("./layouts/views/home/about.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
?>