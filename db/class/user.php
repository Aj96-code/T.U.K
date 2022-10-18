
<?php 
    class User
    {
        private $db;
        private $defaultUserRole = 2;
        function __construct($conn)
        {
            $this->db = $conn;
        }

        function bindUserValues($stmt,$username,$email,$password,$role)
        {
            $stmt->bindparam(":username",$username);
            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":password",$password);
            $stmt->bindparam(":role",$role);
        }

        function encryptString(string $str)
        {
            return md5($str);
        }
        public function insertUser(
            string $username,string $email,string $password, int $role = 2
        )
        {
            
            try 
            {
                if($this->getUserByUserName($username)["num"] > 0 )
                    return false;
                else
                { 
                    $sql = "INSERT INTO user(username,email,password,user_role_id)
                            VALUE (:username,:email,:password,:role)";  
                    $stmt = $this->db->prepare($sql);
                    $email = strtolower($email);
                    $this->bindUserValues($stmt,$username,$email,
                        $this->encryptString($username.$email.$password),
                        $role
                    );
                    $stmt->execute();
                    return true;
                }
            } catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }

        }

        function getUserByUserName($username)
        {
              try
            {
                $sql = "SELECT COUNT(*) AS num FROM user WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username",$username);
                $stmt->execute();
                return $stmt->fetch();
                
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            } 
        }

        public function getUser($username, $password)
        {
            try 
            {
                $sql = "SELECT * FROM user 
                WHERE username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $password);
                $stmt->execute();
                return $stmt->fetch();
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            }
        }


    }
?>
