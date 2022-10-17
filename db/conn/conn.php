<?php
    $host = "127.0.0.1";
    $db = "tuk_db";
    $user = "phpuser";
    $password = 'PHPU$3rP@$$w0rd';
    $charset = "utf8mb4";
//* data source name
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

/* Remote Connect
$host ="sql.freedb.tech";
$db = "freedb_aj96codedb";
$user = "freedb_freedb_aj96codedb";
$password = "FA5FNpf&geJXV$2";
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
*/    
    try
    {
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "Working";
    }
    catch(PDOException $exc)
    {
        throw new PDOException($exc->getMessage());
       //throw new PDOException($exc->getMessage()); 
    };
?>