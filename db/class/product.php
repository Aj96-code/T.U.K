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
                $sql = "INSERT INTO `product`(name,detail,price,color,image,
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

        public function getProductByID($id)
        {
            try
            {
                $sql = "SELECT * FROM `product` WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);

            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function getProducts()
        {
            try
            {
                $sql = "SELECT * FROM `product`";
                return $this->db->query($sql);
            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }


        public function getProductsAsNum()
        {
            try
            {
                $sql = "SELECT COUNT(*) as num FROM `product`";
                return $this->db->query($sql);
            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
        public function getProductsByTypeId($id)
        {
            try
            {
                $sql = "SELECT * FROM product WHERE product_type_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
                $stmt->execute();
                return $stmt;
            } 
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
            }
        }

        public function editProduct(          
            $id,$name,$detail,$price,$color,$image,
            $productType,$productSize,$inStock
        )
        {
            try
            {
                $sql = "UPDATE `product` SET `name` = :name,`detail` = :detail,
                        `price` = :price,`color` = :color,`image` = :image,
                        `product_type_id` = :productType,`product_size_id` = :productSize,
                        `in_stock` = :inStock WHERE `id` = :id" ;
                $stmt = $this->db->prepare($sql);
                $this->bindProductsValue($stmt,$name,$detail,$price,
                    $color,$image,$productType,$productSize,$inStock);
                $stmt->bindparam(":id",$id);
                $stmt->execute();
                return true;

            } 
            catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function deleteProduct($id)
        {
            try
            {
                $sql = "DELETE FROM product WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
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