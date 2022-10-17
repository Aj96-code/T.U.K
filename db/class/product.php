<?php 
    class Product
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }
    }
?>