<?php 
    class ProductSize
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }
    }
?>