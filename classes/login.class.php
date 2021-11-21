<?php

class Login
{
    private $error = "";

    public function evaluate($data)
    {
        $email = addslashes($data['email']);

        $password = addslashes($data['password']);

        $query = "SELECT * FROM users WHERE email = '$email' limit 1";
        
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];

            if($password == $row['password'])
            {
                // create session data
                $_SESSION['socialbook_userid'] = $row['userid'];
            }
            else
            {
                $error .= "Please check your password again<br>";
            }
        }
        else
        {
            $error .= "Please check your email again<br>";
        }
        return false;
    }
}

?>