<?php
    session_start();
    include("classes/connect.php");
    include("classes/login.class.php");

    // check if user is logged in
    if(isset($_SESSION['socialbook_userid']) && is_numeric($_SESSION['socialbook_userid']))
    {
        $id = $_SESSION['socialbook_userid'];
        $login = new User();

        $result = $login->check_login($id);
        
        if($result)
        {
            // retrieve data
            echo "fine";
        }
        else
        {
            header("Location: login.php");
            die;
        }
    }
?>