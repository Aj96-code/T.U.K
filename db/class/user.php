
<?php 
    class User
    {
        private $db;
        function __construct($conn)
        {
            $this->db = $conn;
        }

        function bindUserValues(
            $stmt,$username,$email,$password,$role,$image,
             $firstName, $lastName, $gender
        )
        {
            $stmt->bindparam(":username",$username);
            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":password",$password);
            $stmt->bindparam(":role",$role);
            $stmt->bindparam(":image",$image);
            $stmt->bindparam(":firstName", $firstName);
            $stmt->bindparam(":lastName", $lastName);
            $stmt->bindparam(":gender", $gender);
        }

        function encryptString(string $str)
        {
            return md5($str);
        }
        public function insertUser(
             string $username, string $email,$password,$role = 2,$image,
             $firstName, $lastName, $gender
        )
        {
            
            try 
            {
                if($this->getUserByUserNameAsNum($username)["num"] > 0 
                   && $this->getUserByEmailAsNum($email) > 0)
                    return "Username or Email already exist";
                else
                { 
                    $sql = "INSERT INTO user(username,email,password,user_role_id,image,first_name,last_name,gender)
                            VALUE (:username,:email,:password,:role,:image,:firstName,:lastName,:gender)";  
                    $stmt = $this->db->prepare($sql);
                    $email = strtolower($email);
                    $this->bindUserValues($stmt,$username,$email,
                        $this->encryptString($username.$email.$password),
                        $role,$image,$firstName, $lastName,$gender
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

        public function getUserByUserNameAsNum($username)
        {
              try
            {
                $sql = "SELECT COUNT(*) AS num FROM user WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username",$username);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            } 
        }
        public function getUserByEmailAsNum($email)
        {
              try
            {
                $sql = "SELECT COUNT(*) AS num FROM user WHERE email = :email";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":email",$email);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            } 
        }

       public function getUserByUsername($username)
       {

              try
            {
                $sql = "SELECT * FROM user WHERE username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":username",$username);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
                
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            } 
       }

       public function getUsersAsNum()
       {
            try
            {
                $sql = "SELECT COUNT(*) as num FROM user";
                return $this->db->query($sql);
            }
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
       }

       public function getUsers()
       {     
            try
            {
                $sql = "SELECT * FROM user";
                return $this->db->query($sql);
            }
            catch(PDOException $exc)
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
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $exc) 
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function getUserById($id)
        {
            try
            {
                $sql = "SELECT * FROM user WHERE id = :id";
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

        public function updateUser( $id,            
            $username, $email,$password,$role = 2,$image,
            $firstName, $lastName, $gender)
        {
            try
            {
                $sql = "UPDATE user SET
                        username = :username,
                        email = :email,
                        password = :password,
                        user_role_id = :role,
                        first_name = :firstName,
                        gender = :gender,
                        image = :image,
                        last_name = :lastName
                        WHERE id = :id";

                $stmt = $this->db->prepare($sql);

                $this->bindUserValues($stmt,$username,$email,
                    $this->encryptString($username.$email.$password),
                    $role,$image,$firstName, $lastName,$gender
                );
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


        public function updateUser_Admin( $id,            
            $username,$email,$password, $firstName,$lastName,$gender)
        {
            try
            {
                if(!empty($password))
                {

                    $sql = "UPDATE user SET
                            username = :username,
                            password = :password,
                            first_name = :firstName,
                            gender = :gender,
                            last_name = :lastName
                            WHERE id = :id";

                    $stmt = $this->db->prepare($sql);

                    $newPassword = $this->encryptString($username.$email.$password);
                    $stmt->bindparam(":username",$username);
                    $stmt->bindparam(":password",$newPassword);
                    $stmt->bindparam(":firstName", $firstName);
                    $stmt->bindparam(":gender",$gender);
                    $stmt->bindparam(":lastName",$lastName);
                    $stmt->bindparam(":id",$id);
                    $stmt->execute();
                    return true;
                }
                else
                {

                    $sql = "UPDATE user SET
                            username = :username,
                            first_name = :firstName,
                            gender = :gender,
                            last_name = :lastName
                            WHERE id = :id";

                    $stmt = $this->db->prepare($sql);
                    $stmt->bindparam(":username",$username);
                    $stmt->bindparam(":firstName", $firstName);
                    $stmt->bindparam(":gender",$gender);
                    $stmt->bindparam(":lastName",$lastName);
                    $stmt->bindparam(":id",$id);
                    $stmt->execute();
                    return true;
                }
            } 
            catch(PDOException $exc)
            {
                echo $exc->getMessage();
                return false;
            }
        }

        public function deleteUser($id)
        {
            try
            {
                $sql = "DELETE FROM user WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(":id",$id);
                $stmt->execute();  
                return true;
            } catch (PdoException $exc)
            {
                $exc->getMessage();
                return false;
            }
        }

    }
?>
