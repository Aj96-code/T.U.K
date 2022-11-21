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

    $router->get("/user-list-view", function()
    {
        
        $title = "Users";
        ob_start();
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $user = new User($pdo);
                    $users = $user->getUsers();
                    require_once("./layouts/views/user/user-list-view.php");
                }
                else
                {
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->get("/user-form",function()
    {
        $title = "Add User";
        ob_start();
        session_start();
        if(isset($_SESSION["loggedIn"]))
        {
            if($_SESSION["role"] == "admin")
            {
                require_once("./db/conn/conn.php");
                $roles = getUserRoles($pdo);
                require_once("./layouts/views/user/user-form.php");
            }
            else
            {
                header("Location: /login");
            }
        }
        else
        {
            header("Location: /login");
        }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });

    $router->post("/admin-add-user", function()
    {
        session_start();
        if(isset($_SESSION["loggedIn"]))
        {
            if($_SESSION["role"] == "admin")
            {
                require_once("./layouts/views/user/addUser.php");
            }
            else
            {
                header("Location: /login");
            }
        }
        else
        {
            header("Location: /login");
        }
    });
    
 
    $router->get("/user-edit-form?id=", function()
    {
        
        $title = "User";
        ob_start();
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./db/conn/conn.php");
                    $user = new User($pdo);
                    $userdb = $user->getUserById($_GET["id"])->fetch(PDO::FETCH_ASSOC);
                    require_once("./layouts/views/user/user-edit-form.php");
                }
                else
                {
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
        $body = ob_get_clean();
        require_once("./layouts/shared/template.php");
    });
    
    $router->post("/user-edit", function()
    {
        
            session_start();
            if(isset($_SESSION["role"]))
            {
                if($_SESSION["role"] == "admin")
                {
                    require_once("./layouts/views/user/edit-user.php");
                }
                else
                {
                    header("Location: /login");
                }
            }
            else
            {
                header("Location: /login");
            }
    });

    $router->get("/user-delete?id=", function()
    {
        session_start();
        if(isset($_SESSION["role"]))
        {

            if($_SESSION["role"] == "admin")
            {
                require_once("./layouts/views/user/deleteUser.php");
            }
            else
            {
                header("Location: /login");
            }
        }
        else
        {
            header("Location: /login");
        }
    });

?>