<?php
    require_once("./router/request.php");
    require_once("./router/router.php");
    $router = new Router(new Request);
    $router->get("/", function()
    {
        $content = file_get_contents("./layouts/views/home.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
    $router->post("/", function()
    {
        $content = file_get_contents("./layouts/views/home.php");
        $body = $_POST["firstName"] . " ". $_POST["lastName"];
        require_once("./layouts/shared/template.php");
    });


    $router->get("/about", function()
    {
        $content = file_get_contents("./layouts/views/about.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });

    $router->get("/form", function()
    {
        $content = file_get_contents("./layouts/views/form.php");
        $body = $content;
        require_once("./layouts/shared/template.php");
    });
    
?>