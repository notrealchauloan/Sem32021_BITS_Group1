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

    public function create_post($userid, $data, $files)
    {     
        // verify the data
        if(!empty($data['post']) || !empty($files['file']['name']) || isset($data['is_profile_image']) || isset($data['is_cover_image']))
        {
            $myimage = "";
            $has_image = 0;

            $is_profile_image = 0;
            $is_cover_image = 0;

            if(isset($data['is_profile_image']) || isset($data['is_cover_image']))
            {
                $myimage = $files;
                $has_image = 1;
                
                if(isset($data['is_profile_image']))
                {
                    $is_profile_image = 1;
                }

                if(isset($data['is_cover_image']))
                {
                    $is_cover_image = 1;
                }   
            }
            else
            {
                if(!empty($files['file']['name']))
                {
                    // create folder to store images
                    $folder = "uploads/" . $userid . "/";
    
                    if(!file_exists($folder))
                    {
                        mkdir($folder, 0777, true);
                    }
    
                    $image_class = new Image();
    
                    $myimage = $folder . $image_class->generate_filename(20) . ".jpg";
    
                    move_uploaded_file($_FILES['file']['tmp_name'],$myimage);  
    
                    $image_class->crop_image($myimage,$myimage,1000,300); 
    
                    $has_image = 1;
                }
            }          

            $post = "";
            if(isset($data['post']))
            {
                $post = addslashes($data['post']);
            }
            
            $postid = $this->create_postid();

            $query = "INSERT INTO posts (userid, postid, content, images, has_image, is_profile_image, is_cover_image) VALUES ('$userid', '$postid', '$post', '$myimage', '$has_image', '$is_profile_image', '$is_cover_image')";
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

    public function get_one_post($postid)
    {
        if(!is_numeric($postid))
        {
            return false;
        }
        $query = "SELECT * FROM posts WHERE postid = '$postid' LIMIT 1";
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

    public function delete_post($postid)
    {
        
        if(!is_numeric($postid))
        {
            return false;
        }

        $query = "DELETE FROM posts WHERE postid = '$postid' LIMIT 1";
        
        // echo $query;
        // // die;
        $DB = new Database();
        $DB->write($query);
        
    }

    public function i_own_post($postid, $userid)
    {
        
        if(!is_numeric($postid))
        {
            return false;
        }

        $query = "SELECT * FROM posts WHERE postid = '$postid' LIMIT 1";
        
        $DB = new Database();
        $result = $DB->read($query);
        
        if(is_array($result))
        {
            if($result[0]['userid'] == $userid)
            {
                return true;
            }
        }
        return false;
    }

    public function like_post($id, $type, $userid)
    {
        if($type == "post")
        {
            $DB = new Database();
                        
            $sql = "SELECT likes FROM likes WHERE type='post' && contentid = '$id' LIMIT 1";
            $result = $DB->read($sql);

            // print_r($result);
            if(is_array($result))
            {
                $likes = json_decode($result[0]['likes'], true);
                // $likes = json_decode($result, true);
                $user_ids = array_column($likes, "userid");

                if(!in_array($userid, $user_ids))
                {
                    // $likes = json_decode($result['likes']);
                    $arr["userid"] = $userid;
                    $arr["date"] = date("Y-m-d H:i:s");
                    
                    $likes[] = $arr;
                    $likes_string = json_encode($likes);

                    $sql = "UPDATE likes SET likes = '$likes_string' WHERE type='post' && contentid='$id' LIMIT 1";
                    $DB->save($sql);

                    $sql = "UPDATE posts SET likes = likes + 1 WHERE postid = '$id' LIMIT 1";
                    $DB->save($sql);
                }
                else
                {
                    $key = array_search($userid, $user_ids);
                    unset($likes[$key]);

                    $likes_string = json_encode($likes);

                    $sql = "UPDATE likes SET likes = '$likes_string' WHERE type='post' && contentid='$id' LIMIT 1";
                    $DB->save($sql);

                    $sql = "UPDATE posts SET likes = likes - 1 WHERE postid = '$id' LIMIT 1";
                    $DB->save($sql);
                }
            } 
            else 
            {
                $arr["userid"] = $userid;
                $arr["date"] = date("Y-m-d H:i:s");

                $arr2[] = $arr;
                
                $likes = json_encode($arr);

                $sql = "INSERT INTO likes(type, contentid, likes) VALUES ('$type', '$id', '$likes')";
                $DB->save($sql);
            }
        }
    }
}

?>