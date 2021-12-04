<?php

class Signup
{
    private $error = "";

    public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            if($key == "firstname" || $key == "lastname")
            {
                if(is_numeric($value) || strstr($value, " "))
                {
                    $this->error .= "Your name cannot be numbers or contains empty space <br>";
                }
            }

            if($key == "email")
            {
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
                {
                    $this->error .= "Invalid email address <br>";
                }
            }

            if($key == "password")
            {
                if($value !== $data['password_confirm'])
                {
                    $this->error .= 'Your confirm password must match your password <br>';
                }
            }
        }

        if($this->error == "")
        {
            // no error
            $this->create_user($data);
        }
        else
        {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        $firstname = ucfirst($data['firstname']);
        $lastname = ucfirst($data['lastname']);
        $email = $data['email'];
        $password = $data['password_confirm'];
        $gender = $data['gender'];
        $sel1 = $data['sel1'];
        $sel2 = $data['sel2'];
        $sel3 = $data['sel3'];
        $sel4 = $data['sel4'];


        // create by PHP
        $userid = $this->create_userid();
        $url_address = strtolower($firstname) . "." . strtolower($lastname) . "." . $userid;

        $query = "INSERT INTO users(userid,firstname,lastname,email,password,gender,url_address,feeldown,lackinterest,focus,energy) VALUES('$userid','$firstname','$lastname','$email','$password','$gender','$url_address','$sel1','$sel2','$sel3','$sel4')";
        
        $DB = new Database();
        $DB->save($query);
    }
    
    private function create_userid()
    {
        // generate random number
        $length = rand(4,19);
        $number = "";
        for ($i=0; $i < $length; $i++) {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }

        return $number;
    }
}

?>