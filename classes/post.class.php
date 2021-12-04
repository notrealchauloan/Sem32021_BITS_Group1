<?php
class Post
{
    private function create_postid()
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

    private $error = "";

    public function create_post($userid, $data)
    {
        // $content = $data['post'];
        
        // verify the data
        if(!empty($data['post']))
        {
            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "INSERT INTO posts (userid, postid, content) VALUES ('$userid', '$postid', '$post')";
            $DB = new Database();
            $DB->save($query);
        }
        else
        {
            $this->error = "Please type something to post <br>";
        }
        return $this->error;
    }

    public function get_posts($id)
    {
        $query = "SELECT * FROM posts WHERE userid = '$id' ORDER BY id DESC LIMIT 10";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}

?>