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
            $user = null;
            if(isset($_POST["username"]))
            {
                require_once("./db/conn/conn.php");
                $user = verifyUser($pdo,$_POST["username"],$_POST["password"]);
            }
        ob_get_clean();
        require_once("./layouts/views/home/auth.php");
    });

    $router->get("/logout",function()
    {
        require_once("./layouts/views/home/logout.php");
    });

    $router->get("/registration", function()
    {
        $title = "Registration";
        ob_start();
            require_once("./layouts/views/home/registration.php");
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->post("/addUser", function()
    {
        ob_start();
            if(isset($_POST["submit"]))
            {   
                require_once("./db/conn/conn.php");
                if(getUserByUserAsCount($pdo,$_POST["username"]) > 0)
                {
                    session_start();
                    session_regenerate_id();
                    $_SESSION["errorMessage"] = "<b>Username</b> already in use";
                    header("Location: /registration");
                }
            }
        ob_get_clean();
        require_once("./layouts/views/home/addUser.php");
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