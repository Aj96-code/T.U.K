<?php 
    function getProductTypeResult ()
    {
        require_once("./db/conn/conn.php");
        $productType = new ProductType($pdo);
        return $productType->getTypes();
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
?>