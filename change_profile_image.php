<?php
session_start();

include("classes/connect.php");
include("classes/login.class.php");
include("classes/post.class.php");
include("classes/image.class.php");

// return to the login page if not logged in
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')){
	header('location:login.php');
}


// posting starts
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    echo "<pre>";
    print_r($_POST);
    print_r($_FILES);
    echo "</pre>";
    

    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
    {
        if($_FILES['file']['type'] == "image/jpeg")
        {
            $allowed_size = (1024 * 1024) * 7;
            if($_FILES['file']['size'] < $allowed_size)
            {
                $filename = "uploads/" . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'],$filename);  

                $image = new Image();
                $image->crop_image($filename,$filename,150,150);

                if(file_exists($filename))
                {
                    $userid = $_SESSION['userid'];
                    $change = "profile";

                    // check for mode
                    if(isset($_GET['change']))
                    {
                        $change = $_GET['change'];
                    }

                    if($change == "cover")
                    {
                        $query = "UPDATE users SET cover_image = '$filename' WHERE userid = '$userid' LIMIT 1";
                    }
                    else
                    {
                        $query = "UPDATE users SET cover_image = '$filename' WHERE userid = '$userid' LIMIT 1";
                    }

                    
                    $DB = new Database();
                    $DB->save($query);

                    header('location:profile.php');
                    die;
                }
            }
            else
            {
                echo "Only image of 7 Mb or lower are allowed";
            }
        }
        else
        {
            echo "Only image of Jpeg type are allowed";
        }
    }
    else
    {
        echo "Error uploading images";
    }
    
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
                <input type="file" name="file">
                <input class="btn btn-primary" type="submit" value="Change">
            </form>
        </div>
    </main>
    
</body>
</html>
