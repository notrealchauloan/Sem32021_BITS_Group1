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
    $post = new Post();
    $id = $_SESSION['userid'];
    $result = $post->create_post($id, $_POST, $_FILES); 

    if($result == "")
    {
        header("Location: profile.php");
        die;
    }
    else
    {
        echo "<div class='alert alert-info text-center'>";
        echo $result;
        echo "</div>";
					    
    }
}

// even if not submit form, still read posts from database
    $post = new Post();
    $user = new User();
    $id = $_SESSION['userid'];
    $posts = $post->get_posts($id); // posts is an array that contains rows of post
    $user_details = $user->get_user($id);

// display friend
    $id = $_SESSION['userid'];
    $friends = $user->get_friends($id);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title>SocialBook - Social Network for Mental Health Disease</title>
    <link rel="stylesheet" href="profileStyle.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
    include('header.php');
?>
<div class="container db-social">
        <!-- Cover Image -->
        <div class="jumbotron jumbotron-fluid">
            
            <?php
                $image = "";

                if(file_exists($user_details['cover_image']))
                {
                    $image = $user_details['cover_image'];
                }
            ?>
            <img src="<?php echo $image; ?>" alt="">

        </div>
        <!-- Cover Image Ends -->

        <!-- Feed -->
        <div class="container">
            <div class="middle">
                <!------------------- PROFILE DESCRIPTION --------------------->
                <div class="row justify-content-center col-xl-11">
                    <div class="widget head-profile has-shadow widget-body">
                        <div class="row d-flex align-items-center">
                            <!-- <div class="friend">
                                <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Add Friend</button>
                            </div> -->

                            <ul>
                                <li>
                                    <div class="counter ">246</div>
                                    <div class="heading ">Friends</div>
                                </li>
                                <li>
                                    <div class="counter ">30</div>
                                    <div class="heading ">Mutual Friends</div>
                                </li>
                            </ul>

                            <br>
                            <!-- Profile Image -->
                            <div class="image-default ">
                                <?php
                                    $image = "";

                                    if(file_exists($user_details['profile_image']))
                                    {
                                        $image = $user_details['profile_image'];
                                    }
                                    else if($user_details['gender'] == 'F')
                                    {
                                        $image = 'images/user_female.jpg'; 
                                    } 
                                    else if($user_details['gender'] == 'M')
                                    {
                                        $image = 'images/user_male.jpg';
                                    }
                                    else if($user_details['gender'] == 'O')
                                    {
                                        $image = 'images/user_other.jpg';
                                    }
                                ?>
                                <a href="profile.php"><img class="rounded-circle " src="<?php echo $image; ?>" alt="... "></a>
                            </div>
                            <!-- Profile Image Ends -->

                            <!-- Profile description -->
                            <div class="infos ">
                                <h2>
                                
                                    <?php
                                        echo $user_details['firstname'] . " " . $user_details['lastname'];
                                    ?>
            
                                </h2>
                                <div class="location ">
                                    <a href="change_profile_image.php?change=profile">Change Profile Image</a>
                                    |
                                    <a href="change_profile_image.php?change=cover">Change Cover</a>
                                </div>
                                <hr>
                                <br>
                                <p>
                                    An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.
                                </p>
                            </div>
                            <!-- Profile Description Ends -->
                        </div>
                    </div>
                </div>
                <div class="feeds">
                    <!-- Friends -->
                    <div class="right">
                        <div class="friend-requests" style="float: left; width: 23%;">
                            <h4>Friends</h4>                        
                            <div class="request">
                                <?php
                                if($friends)
                                {
                                    foreach ($friends as $FRIEND_ROW)
                                    {
                                        include("friends.php");
                                    }
                                }
                            ?>
                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- End of friend -->

                <div style="width: 75%; float: right;">
                <!-- What's on your mind -->
                   <?php
                         include("createPosts.php");
                   ?>
                    <br>
                <!-- Ends of what's on your mind -->
                <!-- Feed display  -->
                    <?php
                        if($posts)
                        {
                            foreach ($posts as $ROW)
                            {
                                // $user = new User();
                                $ROW_USER = $user->get_user($_SESSION['userid']);
                                            
                                // $ROW_USER = $user->get_user($ROW['userid']);
                                include("post.php");
                            }
                        }
                    ?>
                <!-- Ends of Feed -->
                </div>                               
            </div>            
        </div><!-- End of middle div -->        
    </div><!-- End of container div -->   
</div>




</body>

</html>