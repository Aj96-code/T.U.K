<?php 
    $path = "userCart/*.json";

    $fileNames = glob($path);
    $userCartFile ="userCart/".$objUser["password"].".json";

    if(in_array($userCartFile,$fileNames))
    {

        $jsonFileContent = file_get_contents($userCartFile);
        $cartItems = json_decode($jsonFileContent,true);
        $found = 0;
        $count = 0;
        if(isset($_GET["rId"]))
        {
            $rId = $_GET["rId"];
            foreach ($cartItems as $cartItem)
            {
        
                if((int)$cartItem["id"] === (int)$rId)
                {
                    array_splice($cartItems,$count,1);
                }  
            
                $count++;
            } 
            file_put_contents("userCart/".$objUser["password"].".json",
                json_encode($cartItems));
        }      

        if(isset($product["id"]))
        {
            foreach ($cartItems as $cartItem)
            {
                if(isset($_GET["rId"]))
                {
                    if((int)$cartItem["id"] === (int)$GET["rId"])
                    {
                        unset($cartItems[$count]);
                    }
                }
                if((int)$cartItem["id"] === (int)$product["id"])
                {
                    $found = 1;
                }
            }

            if($found == 0)
            {

                $amount = array("amount"=>1);
                $cartItem = array_merge($product,$amount);
                array_push($cartItems,$cartItem);
                file_put_contents("userCart/".$objUser["password"].".json",
                    json_encode($cartItems));
            }
        }

    }
    else
    {
        if(isset($product["id"]))
        {
            $amount = array("amount"=>1);
            $cartItem = array_merge($product,$amount);
        
            file_put_contents("userCart/".$objUser["password"].".json",
                "[".json_encode($cartItem)."]");
        }
    }

?>