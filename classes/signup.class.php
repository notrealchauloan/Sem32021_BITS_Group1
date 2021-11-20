<?php

class Signup
{
    private $error = "";

    public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty! <br>";

            }

            if($key == "fullname")
            {
                if(is_numeric($value))
                {
                    $this->error .= "Your name cannot be numbers <br>";
                }
            }

            if($key == "email")
            {
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value))
                {
                    $this->error .= "Please enter a valid email address";
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
        $fullname = $data['fullname'];
        $email = $data['email'];
        $password = $data['password1'];
        $gender = $data['gender'];

        // create by PHP
        $userid = strtolower($fullname) . "." . $this->create_userid();
        $url_address = $this->create_userid();

        $query = "INSERT INTO users(userid,fullname,email,password,gender,url_address) VALUES('$userid','$fullname','$email','$password','$gender','$url_address')";
        
        echo $query;
        
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