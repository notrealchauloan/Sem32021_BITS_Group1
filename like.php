<?php

include('classes/autoload.php');

if(isset($_SERVER['HTTP_REFERER'])){
    $return_to = $_SERVER['HTTP_REFERER'];
} else {
    $return_to = "profile.php";
}

if(isset($_GET['type']) && isset($_GET['id']))
{
    if(is_numeric($_GET['id']))
    {
        $allowed[] = 'post';
        $allowed[] = 'user';
        $allowed[] = 'comment';

        if(in_array($_GET['type'], $allowed))
        {
            $post = new Post();
            $post->like_post($_GET['id'], $_GET['type'], $_SESSION['userid']);
        }
    }
    
}


header("Location: ". $return_to);
die;

