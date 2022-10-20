
<?php 
    class UserRole
    {
        private $db;
        
        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function getRoles()
        {
            try
            {
                $sql =  "SELECT * FROM `user_role`";
                return $this->db->query($sql);
            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }
    }
?>