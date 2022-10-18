
<?php 
 class ProductType
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getTypes()
        {
            try
            {
                $sql = "SELECT * FROM `product_type`";
                return $this->db->query($sql);
            }
            catch (PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
    }
?>