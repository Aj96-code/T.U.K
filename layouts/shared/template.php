<?php
    require_once("./includes/top.php");
    if($body == null)
    {
        $body = file_get_contents("/views/home.php",true);
    }
    echo $body;
    require_once("./includes/base.php"); 
?>