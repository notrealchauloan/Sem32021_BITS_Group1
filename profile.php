<?php
include("classes/autoload.php");

// return to the login page if not logged in
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')){
	header('location:login.php');
}

// Get user data
$user = new User();
$user_details = $user->get_user($_SESSION['userid']);

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
    $profile = new Profile();
    $profile_data = $profile->get_profile($_GET['id']);
    if(is_array($profile_data))
    {
        $user_details = $profile_data[0];
    }
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
    $id = $user_details['userid'];
    $posts = $post->get_posts($id); // posts is an array that contains rows of post

// display friend
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
    <style>

/* The Modal (background) */

.modal{
  background: rgba(0, 0, 0, 0.5);
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9999;
  text-align: center;
  display: grid;
  place-items: center;
  font-size: 0.9rem;
  display: none;
  transition: opacity 400ms ease-in;
}
.modal .modal-content {
  background: var(--color-white);
  padding: 5px 20px 13px 20px;
  margin: 10% auto;
  border-radius: var(--card-border-radius);
  width: 40%;
  height: 45%;
  box-shadow: 0 0 1rem rgba(0, 0, 0, 0.1);
  position: relative;
}
.modal-image img{
    border-radius: 50%;
    width: 150px;
    display: block;
  margin-left: auto;
  margin-right: auto;
}
/* The Close Button */
.close {
    color: #aaa;
  line-height: 50px;
  font-size: 80%;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 70px;
  text-decoration: none;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.button_container{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50%;
}


</style>
</head>

<body>
<!-- Header -->
    <?php
        include("header.php");
    ?>
<!-- End of Header -->
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
                <div class="row justify-content-center">
                    <div class="col-xl-11">
                        <div class="widget head-profile has-shadow">
                            <div class="widget-body pb-0">
                                <div class="row d-flex align-items-center">
                                    <div class="setting">
                                        <button type="button" id="myBtn" style="float: right; font-weight:bold" class="btn btn-primary">Edit Profile </button> </a>
                                            <!-- The Modal -->
                                        <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                    <span class="close">&times;</span>
                                                    <h2>Edit Profile </h2>
                                                    <br>  
                                                    <div class="modal-image">
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
                                           <a href="profile.php"><img src="<?php echo $image; ?>" alt="... "></a>
                                            <br>
                                            <div class="button_container">
                                            <a href="change_profile_image.php?change=profile">
                                                <button class="btn btn-primary"> Change Profile Image </button> 
                                            </a>
                                            <a href="change_profile_image.php?change=cover"> 
                                                <button class="btn btn-primary" >Change Cover </button>  
                                            </a>
                                            </div> 
                                        </div>   
                                        </div>
                                    </div>

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
                                    <div class="liked-by" style="float: center;">
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-1.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-2.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-3.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-4.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-5.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-7.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-8.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-9.jpg "></span>
                                        <span style="width:30px; height: 30px;"><img src="./images/profile-10.jpg "></span>
                                    </div>

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
                                    <div class="infos ">
                                        <h2>
                                        
                                            <?php
                                                echo $user_details['firstname'] . " " . $user_details['lastname'];
                                            ?>
                    
                                        </h2>
                                
                                        <hr>
                                        <br>
                                        <p>
                                            An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                
                                
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
                                $ROW_USER = $user->get_user($user_details['userid']);
                                            
                                // $ROW_USER = $user->get_user($ROW['userid']);
                                include("post.php");
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



</body>

</html>