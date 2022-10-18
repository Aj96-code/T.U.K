
<?php 
    class UserRole
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }
    }
?>