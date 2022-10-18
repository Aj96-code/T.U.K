<?php 
    class ProductSize
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function getSizes()
        {
            try
            {
                $sql = "SELECT * FROM `product_size`";
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