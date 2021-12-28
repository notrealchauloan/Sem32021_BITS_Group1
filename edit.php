<?php
include("classes/autoload.php");

// return to the login page if not logged in
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')){
	header('location:login.php');
}
$user = new User();
$id = $_SESSION['userid'];
$user_details = $user->get_user($id);
$Post = new Post();

$error = "";
if(isset($_GET['id'])){
    $ROW = $Post->get_one_post($_GET['id']);

    if(!$ROW)
    {
        $error = "No such post was found";
    }
    else
    {
        if($ROW['userid'] != $_SESSION['userid'])
        {
            $error = "Access Denied";
        } 
        else{
            // if something was posted
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                // // print_r($_POST);
                $Post->delete_post($_POST['postid']);
                header("Location:profile.php");
                die;
                // echo $ROW['userid'] . "userid";
                // echo $_SESSION['userid'] . "session";
            }
        }
    }
} else {
    $error = "No such post was found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Image</title>
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        include("header.php");
    ?>
    <main>
        <div class="middle">
            <form class="create-post" method="post" enctype="multipart/form-data">
                
                    <?php
                    if($error != "")
                    {
                        echo $error;
                    } else
                    {
                        echo " <h3>Are you sure you want to delete this post?</h3> ";

                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['userid']);
                        include("postDelete.php");

                        echo "<input name='postid' type='hidden' value='$ROW[postid]'>";
                        echo "<input id='post_button' class='btn btn-primary' type='submit' value='Delete'>";
                    }
                    ?>
                
                
            </form>
        </div>
    </main>
    
</body>
</html>
