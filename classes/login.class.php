<?php
include_once('classes/connect.php');
 
class User extends Database{
 
    public function __construct(){
 
        parent::__construct();
    }
 
    public function check_login($username, $password){
 
        $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['userid'];
        }
        else{
            return false;
        }
    }
 
    public function details($id){
        $sql = "SELECT * FROM users WHERE userid = '$id'";
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }

    public function get_user($id)
    {
        $query = "SELECT * FROM users WHERE userid = '$id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }
    }
}

// class Login
// {
//     private $error = "";

//     public function evaluate($data)
//     {
//         $email = addslashes($data['email']);

//         $password = addslashes($data['password']);

//         $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        
//         $DB = new Database();
//         $result = $DB->read($query);

//         if($result)
//         {
//             $row = $result[0];

//             if($password == $row['password'])
//             {
//                 // create session data
//                 $_SESSION['socialbook_userid'] = $row['userid'];
//             }
//             else
//             {
//                 $error .= "Please check your password again<br>";
//             }
//         }
//         else
//         {
//             $error .= "Please check your email again<br>";
//         }
//         return false;
//     }
// }

?>