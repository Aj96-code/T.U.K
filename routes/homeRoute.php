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
        $title = "Home Page"; 
      
        // Runs Any php scripts in the html before showing it by starting a buffer
        ob_start();
            require_once("./db/conn/conn.php");
            $result = getProductTypeResult($pdo);
            $productTypes = array();
            while($obj = $result->fetch(PDO::FETCH_ASSOC))
            {
                array_push($productTypes,$obj);
            }
            require_once("./layouts/views/home/home.php");
            // get the contents and clear the buffer
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });    
    $router->get("/login", function()
    {
        $title = "log In";
        ob_start();
            require_once("./layouts/views/home/login.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    
    $router->post("/auth", function()
    {
        ob_start();
            require_once("./layouts/view/home/auth.php");
        ob_get_clean();
    });

    $router->get("/registration", function()
    {
        $title = "Registration";
        ob_start();
            require_once("./layouts/views/home/registration.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/about", function()
    {
        $title = "About";
        ob_start();
            require_once("./layouts/views/home/about.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
?>