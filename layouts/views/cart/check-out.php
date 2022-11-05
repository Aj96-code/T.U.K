<?php 
    $path = "userCart/*.json";

    $fileNames = glob($path);
    $userCartFile ="userCart/".$objUser["password"].".json";
    file_put_contents("userCart/".$objUser["password"].".json",
                json_encode(array()));

    session_start();
    $_SESSION["successMessage"] = "Your Order was Successfully completed";
?>