<?php 
    class Product
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }

        function bindProductsValue(
            $stmt,$name,$detail,$price,$color,
            $image,$productType,$productSize,$inStock
        )
        {
            $stmt->bindparam(":name",$name);
            $stmt->bindparam(":detail",$detail);
            $stmt->bindparam(":price",$price);
            $stmt->bindparam(":color",$color);
            $stmt->bindparam(":image",$image);
            $stmt->bindparam(":productType",$productType);
            $stmt->bindparam(":productSize",$productSize);
            $stmt->bindparam(":inStock",$inStock);
        }

        public function insertProduct(
            $name,$detail,$price,$color,$image,
            $productType,$productSize,$inStock
        )
        {
            try
            {
                $sql = "INSERT INTO product(name,detail,price,color,image,
                        product_type_id,product_size_id,in_stock)
                        VALUES(:name,:detail,:price,:color,:image,
                            :productType,:productSize,:inStock)";
                $stmt = $this->db->prepare($sql);
                $this->bindProductsValue($stmt,$name,$detail,$price,
                    $color,$image,$productType,$productSize,$inStock);
                $stmt->execute();
                return true;
            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
    }
?>