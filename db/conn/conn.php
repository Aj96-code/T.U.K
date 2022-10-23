<?php
    try
    {
        $host = "127.0.0.1";
        $db = "tuk_db";
        $dbUser = "phpuser";
        $dbPassword = 'PHPU$3rP@$$w0rd';
        $charset = "utf8mb4";
        //* data source name
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        /* Remote Connect
        $host ="sql.freedb.tech";
        $db = "freedb_aj96codedb";
        $dbUser = "freedb_freedb_aj96codedb";
        $dbPassword = "FA5FNpf&geJXV$2";
        $charset = "utf8mb4";
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        */    
    
        $pdo = new PDO($dsn,$dbUser,$dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        require_once("db/class/productType.php");
        require_once("db/class/productSize.php");
        require_once("db/class/product.php");
        require_once("db/class/user.php");
        require_once("db/class/userRole.php");
    }
    catch(PDOException $exc)
    {
        throw new PDOException($exc->getMessage());
    };


?>