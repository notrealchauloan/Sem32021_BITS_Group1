<?php
include("classes/autoload.php");

// return to the login page if not logged in
if (!isset($_SESSION['userid']) ||(trim ($_SESSION['userid']) == '')){
	header('location:login.php');
}

// posting starts
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $post = new Post();
    $id = $_SESSION['userid'];
    $result = $post->create_post($id, $_POST); 

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chatbot in PHP</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="chatbot.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <?php
        include('header.php');
        $profile_image = "";

        if(file_exists($user_details['profile_image']))
        {
            $image = $user_details['profile_image'];
        }
    ?>
    <!------------------------- MAIN -------------------------->
    <main>
        <div class="container">
            <!--======================== LEFT ==========================-->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="<?php echo $image; ?>" alt="... ">
                    </div>
                    <div class="handle">
                        <h4> 
                            <?php
                                echo $user_details['firstname'] . " " . $user_details['lastname'];
                            ?>
                        </h4>
                        <!-- <p class="text-muted">
                            @dayi
                        </p> -->
                    </div>
                </a>

                <!-------------------- SIDEBAR ------------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span><h3>Home</h3>
                    </a>
                    <a href="help.php" class="menu-item">
                        <span><i class="uil uil-compass"></i></span><h3 href="help.php">Professional Helps</h3>
                    </a>
                    <a class="menu-item" id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">9+</small></i></span><h3>Notifications</h3>
                        <!-------------------- NOTIFICATION POPUP ---------------->
                        <div class="notifications-popup">

                            
                            <div class="title">online chatbot</div>
                            <div class="bot-inbox inbox">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                              </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-2.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Keke Benjamin</b> accepted your friend request
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-3.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>John Doe</b> commented on your post
                                    <small class="text-muted">1 HOUR AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-4.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Mary Oppong</b> and <b>283 others </b> liked your post
                                    <small class="text-muted">4 MINUTES AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-5.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Doris Y. Lartey</b> commented on a post you are tagged in
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-6.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>Donald Trump</b> commented on a post you are tagged in
                                    <small class="text-muted">1 HOUR AGO</small>
                                </div>
                            </div>
                            <div>
                                <div class="profile-photo">
                                    <img src="./images/profile-7.jpg">
                                </div>
                                <div class="notification-body">
                                    <b>jane Doe</b> commented on your post
                                    <small class="text-muted">1 HOUR AGO</small>
                                </div>
                            </div>
                        </div>
                        <!-------------------- END NOTIFICATION POPUP ---------------->
                    </a>
                    <a class="menu-item" id="messages-notification">
                        <span><i class="uil uil-envelope-alt"><small class="notification-count">6</small></i></span><h3>Messagse</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-bookmark"></i></span><h3>Bookmarks</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-chart-line"></i></span><h3>Analytics</h3>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span><h3>Theme</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-setting"></i></span><h3>Settings</h3>
                    </a>                        
                </div>
                <!------------------- END OF SIDEBAR -------------------->
                <label for="create-post" class="btn btn-primary">Create Post</label>
            </div>
            <!------------------- END OF LEFT -------------------->



            <!--======================== MIDDLE ==========================-->
            <div class="middle">
                <!------------------- STORIES -------------------->
                <div class="stories">
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-20.jpg">
                        </div>
                        <p class="name">Your Story</p>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-9.jpg">
                        </div>
                        <p class="name">Lilla James/p>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-10.jpg">
                        </div>
                        <p class="name">Winnie Hale</p>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-11.jpg">
                        </div>
                        <p class="name">Daniel Bale</p>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-12.jpg">
                        </div>
                        <p class="name">Jane Doe</p>
                    </div>
                    <div class="story">
                        <div class="profile-photo">
                            <img src="./images/profile-8.jpg">
                        </div>
                        <p class="name">Tina White</p>
                    </div>
                </div>
                <!------------------- END OF STORIES -------------------->
                <?php
                    include("createPosts.php");
                ?>
                <!------------------- CHATBOT -------------------->
                <div class="wrapper">
                    <div class="title">Online Chatbot</div>
                    <div class="form">
                        <div class="bot-inbox inbox">
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="msg-header">
                                <p>Hello there, how can I help you?</p>
                            </div>
                        </div>
                    </div>
                    <div class="typing-field">
                        <div class="input-data">
                            <input id="data" type="text" placeholder="Type something here.." required>
                            <button id="send-btn">Send</button>
                        </div>
                    </div>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $("#send-btn").on("click", function(){
                                $value = $("#data").val();
                                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                                $(".form").append($msg);
                                $("#data").val('');
                                
                                // start ajax code
                                $.ajax({
                                    url: 'message.php',
                                    type: 'POST',
                                    data: 'text='+$value,
                                    success: function(result){
                                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                                        $(".form").append($replay);
                                        // when chat goes down the scroll bar automatically comes to the bottom
                                        $(".form").scrollTop($(".form")[0].scrollHeight);
                                    }
                                });
                            });
                        });
                    </script>
            </div>
            <!--======================== END OF MIDDLE ==========================-->


            <!--======================== RIGHT ==========================-->
            <div class="right">
                <div class="messages">
                    <div class="heading">
                        <h4>Messages</h4><i class="uil uil-edit"></i>
                    </div>
                    <!------------ SEARCH BAR -------------->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search messages" id="message-search">
                    </div>
                    <!------------ MESSAGES CATEGORY -------------->
                    <div class="category">
                        <h6 class="active">Primary</h6>
                        <h6>General</h6>
                        <h6 class="message-requests">Requests(7)</h6>
                    </div>
                    <!------------ MESSAGE -------------->
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-2.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Edem Quist</h5>
                            <p class="text-muted">Just woke up bruh</p>
                        </div>
                    </div>
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-3.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Franca Deila</h5>
                            <p class="text-bold">Received bruh. Thanks!</p>
                        </div>
                    </div>
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-4.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Jane Doe</h5>
                            <p class="text-bold">ok</p>
                        </div>
                    </div>
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-5.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Daniella Jackson</h5>
                            <p class="text-bold">2 new messages</p>
                        </div>
                    </div>
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-6.jpg">
                        </div>
                        <div class="message-body">
                            <h5>Juliet Makarey</h5>
                            <p class="text-muted">lol u right</p>
                        </div>
                    </div>
                    <!----- MESSAGE ----->
                    <div class="message">
                        <div class="profile-photo">
                            <img src="./images/profile-7.jpg">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Chantel Msiza</h5>
                            <p class="text-bold">Birthday Tomorrow!</p>
                        </div>
                    </div>
                </div>
                <!------------ END OF MESSAGES -------------->


                <!------------ FRIEND REQUESTS -------------->
                <div class="friend-requests">
                    <h4>Requests</h4>
                    <!----- REQUEST 1----->
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <a href="profilepage.php">
                            <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80 ">
                                </a>
                            </div>
                            <div>
                                <h5>Kim Perron</h5>
                                <p class="text-muted">8 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn">Decline</button>
                        </div>
                    </div>
                    <!----- REQUEST 2----->
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./images/profile-9.jpg">
                            </div>
                            <div>
                                <h5>Jackline Mensah</h5>
                                <p class="text-muted">2 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn">Decline</button>
                        </div>
                    </div>
                    <!----- REQUEST 3----->
                    <div class="request">
                        <div class="info">
                            <div class="profile-photo">
                                <img src="./images/profile-10.jpg">
                            </div>
                            <div>
                                <h5>Jennifer Lawrence</h5>
                                <p class="text-muted">19 mutual friends</p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">Accept</button>
                            <button class="btn">Decline</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--====================== END OF RIGHT ==========================-->
        </div>
    </main>

 <!--================================================ THEME CUSTOMIZATION =============================================-->
 <div class="customize-theme">
    <div class="card">
        <h2>Customize your view</h2>
        <p class="text-muted">Manage your font size, color, and background.</p>

        <!------------ FONT SIZES ------------->
        <div class="font-size">
            <h4>Font Size</h4>
            <div>
                <h6>Aa</h6>
            <div class="choose-size">
                <span class="font-size-1"></span>
                <span class="font-size-2"></span>
                <span class="font-size-3"></span>
                <span class="font-size-4"></span>
                <span class="font-size-5"></span>
            </div>
            <h3>Aa</h3>
            </div>
        </div>

        <!------------ PRIMARY COLORS ------------->
        <div class="color">
            <h4>Color</h4>
            <div class="choose-color">
            <span class="color-1 active"></span>
            <span class="color-2"></span>
            <span class="color-3"></span>
            <span class="color-4"></span>
            <span class="color-5"></span>
            </div>
        </div>

        <!---------- BACKGROUND COLORS ------------>
        <div class="background">
            <h4>Background</h4>
            <div class="choose-bg">
                <div class="bg-1 active">
                    <span></span>
                    <h5 for="bg-1">Light</h5>
                </div>
                <div class="bg-2">
                    <span></span>
                    <h5>Dim</h5>
                </div>
                <div class="bg-3">
                    <span></span>
                    <h5 for="bg-3">Lights Out</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="./index.js"></script>
</body>
</html>