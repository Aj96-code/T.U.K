<?php 
    $router->get("/profile", function()
    {
        $title = "Profile";
        ob_start();
            require_once("./db/conn/conn.php");
            session_start();
            if(isset($_SESSION["name"]))
            {
                $user = getUserByUsername($pdo,$_SESSION["name"]);
                require_once("./layouts/views/user/profile.php");
            }
            else
            {
                require_once("./layouts/views/home/login.php");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->post("/update-profile",function()
    {
        require_once("./layouts/views/user/update-profile.php");
    });
?>