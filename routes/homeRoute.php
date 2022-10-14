<?php 
    /* get with id example
    $router->get("/?id=", function()
    {
        // Runs Any php scripts in the html before showing it by starting a buffer
        ob_start();
            echo $_GET["id"];
            require_once("./layouts/views/home/home.php");
            // get the contents and clear the buffer
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    */
    $router->get("/", function()
    {
        // Runs Any php scripts in the html before showing it by starting a buffer
        ob_start();
            require_once("./layouts/views/home/home.php");
            // get the contents and clear the buffer
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    $router->get("/login", function()
    {
        ob_start();
            require_once("./layouts/views/home/login.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/about", function()
    {
        ob_start();
            echo $_GET["id"];
            require_once("./layouts/views/home/about.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
?>