<?php 
    function getProductTypeResult ($pdo)
    {
        $productType = new ProductType($pdo);
        return $productType->getTypes();
    }

    function getProductSizeResult($pdo)
    {
        $productSize = new ProductSize($pdo);
        return $productSize->getSizes();
    }
    function getProductTypeId(array $productType)
    {
        return $productType["id"];
    } 

    function getHrefProductsIdLink(array $productType)
    {
        return "/products?id=".getProductTypeId($productType);
    }
    function getProductTypeName(array $productType)
    {
        return $productType["type"];
    }    
    function encryptString(string $str)
    {
        return md5($str);
    }

    function verifyUser($pdo,string $username, string $userPassword)
    {
        $user = new User($pdo);


        if($user->getUserByUserNameAsNum($username)["num"] > 0)
        {
            $userFromDb = $user->getUserByUsername($username);
            $eString =  encryptString($userFromDb["username"].$userFromDb["email"].$userPassword);

            $result = $user->getUser($username,$eString);
           if(isset($result["username"]))
           {
                return $result;
           }
           else 
           {
                return false;
           }
        }
        else
        {
            return false;
        }        
    }
?>