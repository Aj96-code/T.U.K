<?php
try
{
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
    
        $pdo = new PDO($dsn,$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    require_once("db/class/productType.php");
    require_once("db/class/productSize.php");
    require_once("db/class/product.php");
    require_once("db/class/user.php");
    require_once("db/class/userRole.php");
    }
    catch(PDOException $exc)
    {
        throw new PDOException($exc->getMessage());
       //throw new PDOException($exc->getMessage()); 
    };


    //$user->insertUser("admin","admin01@gmail.com","password",1);

?>