<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo file_get_contents("./components/links.html",true);?>
    <title><?php echo $title?></title>
</head>
<body>
    <?php
     
        session_start();
        require_once("./components/navbar.php");

    ?>
    
