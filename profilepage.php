<?php
session_start();

include("classes/connect.php");
include("classes/login.class.php");
include("classes/post.class.php");

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
            <div class="jumbotron jumbotron-fluid"></div>
            <div class="container">
                <div class="middle">
                    <!------------------- PROFILE DESCRIPTION --------------------->
                    <div class="row justify-content-center">
                        <div class="col-xl-11">
                            <div class="widget head-profile has-shadow">
                                <div class="widget-body pb-0">
                                    <div class="row d-flex align-items-center">
                                        <div class="friend">
                                            <button type="button" style="float: right; font-weight:bold" class="btn btn-primary">Add Friend</button>
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
                                            <img class="rounded-circle " src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80 " alt="... ">
                                        </div>
                                        <div class="infos ">
                                            <h2>Kim Perron</h2>
                                            <div class="location ">Las Vegas, Nevada, U.S.</div>
                                            <hr>
                                            <br>
                                            <p>
                                                An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-body pb-0">
                        <!------------------- CREATE POST --------------------->
                        <form class="create-post">
                            <div class="profile-photo">
                                <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80 ">
                            </div>
                            <input type="text" placeholder="What's on your mind, Kim?" id="create-post">
                            <input type="submit" value="Post" class="btn btn-primary">
                        </form>
                        <br>
                        <div class="feeds">
                            <!---------------- FRIENDS REQUEST ----------------->
                            <div class="right">
                                <div class="friend-requests" style="float: right; vertical-align:top; width: 25%;">
                                    <h4>Requests</h4>
                                    <!----- REQUEST 1----->
                                    <div class="request">
                                        <div class="info">
                                            <div class="profile-photo">
                                                <img src="./images/profile-8.jpg">
                                            </div>
                                            <div>
                                                <h5>Hajia Bintu</h5>
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
                                    <!----- REQUEST 4----->
                                    <div class="request">
                                        <div class="info">
                                            <div class="profile-photo">
                                                <img src="./images/profile-4.jpg">
                                            </div>
                                            <div>
                                                <h5>Kim Miami</h5>
                                                <p class="text-muted">17 mutual friends</p>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <button class="btn btn-primary">Accept</button>
                                            <button class="btn">Decline</button>
                                        </div>
                                    </div>
                                    <!----- REQUEST 5----->
                                    <div class="request">
                                        <div class="info">
                                            <div class="profile-photo">
                                                <img src="./images/profile-5.jpg">
                                            </div>
                                            <div>
                                                <h5>Jenna Lawrence</h5>
                                                <p class="text-muted">9 mutual friends</p>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <button class="btn btn-primary">Accept</button>
                                            <button class="btn">Decline</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!------------------- FEED 1 --------------------->
                            <div class="feed" style="width:70%">
                                <div class=" head ">
                                    <div class="user ">
                                        <div class="profile-photo ">
                                            <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80 ">
                                        </div>
                                        <div class="ingo ">
                                            <h3>Kim Perron</h3>
                                            <small>Dubai, 15 MINUTES AGO</small>
                                        </div>
                                    </div>
                                    <span class="edit "><i class="uil uil-ellipsis-h "></i></span>
                                </div>

                                <div class="photo ">
                                    <img src="./images/feed-1.jpg ">
                                </div>

                                <div class="action-buttons ">
                                    <div class="interaction-buttons ">
                                        <span><i class="uil uil-heart "></i></span>
                                        <span><i class="uil uil-comment-dots "></i></span>
                                        <span><i class="uil uil-share-alt "></i></span>
                                    </div>
                                    <div class="bookmark ">
                                        <span><i class="uil uil-bookmark-full "></i></span>
                                    </div>
                                </div>

                                <div class="liked-by ">
                                    <span><img src="./images/profile-10.jpg "></span>
                                    <span><img src="./images/profile-4.jpg "></span>
                                    <span><img src="./images/profile-15.jpg "></span>
                                    <p>Liked by <b>Ernest Achiever</b> and <b>2,323 others</b></p>
                                </div>

                                <div class="caption ">
                                    <p><b>Lana Rose</b> Just recieved gifts from my online friends. <span class="harsh-tag ">#lifestyle</span></p>
                                </div>
                                <div class="comments text-muted ">View all 277 comments</div>
                            </div>
                            <!---------------- END OF FEED ----------------->
                            <!------------------- FEED 2 --------------------->
                            <div class="feed" style="width:70%">
                                <div class="head">
                                    <div class="user ">
                                        <div class="profile-photo ">
                                            <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80 ">
                                        </div>
                                        <div class="ingo ">
                                            <h3>Kim Perron</h3>
                                            <small>Miami, 2 WEEKS AGO</small>
                                        </div>
                                    </div>
                                    <span class="edit "><i class="uil uil-ellipsis-h "></i></span>
                                </div>

                                <div class="photo ">
                                    <img src="./images/feed-2.jpg ">
                                </div>

                                <div class="action-buttons ">
                                    <div class="interaction-buttons ">
                                        <span><i class="uil uil-heart "></i></span>
                                        <span><i class="uil uil-comment-dots "></i></span>
                                        <span><i class="uil uil-share-alt "></i></span>
                                    </div>
                                    <div class="bookmark ">
                                        <span><i class="uil uil-bookmark-full "></i></span>
                                    </div>
                                </div>

                                <div class="liked-by ">
                                    <span><img src="./images/profile-10.jpg "></span>
                                    <span><img src="./images/profile-4.jpg "></span>
                                    <span><img src="./images/profile-15.jpg "></span>
                                    <p>Liked by <b>Ernest Achiever</b> and <b>2,323 others</b></p>
                                </div>

                                <div class="caption ">
                                    <p><b>Lana Rose</b> Started my day with fulfil enjoyments. How about you guys? <span class="harsh-tag ">#behappy</span></p>
                                </div>
                                <div class="comments text-muted ">View all 3,473 comments</div>
                            </div>
                            <!---------------- END OF FEED ----------------->
                            <!------------------- FEED 7 --------------------->
                            <div class="feed" style="width:70%">
                                <div class="head">
                                    <div class="user">
                                        <div class="profile-photo">
                                            <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80">
                                        </div>
                                        <div class="ingo">
                                            <h3>Kim Perron</h3>
                                            <small>Dubai, 15 MINUTES AGO</small>
                                        </div>
                                    </div>
                                    <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                                </div>

                                <div class="photo">
                                    <img src="./images/feed-7.jpg">
                                </div>

                                <div class="action-buttons">
                                    <div class="interaction-buttons">
                                        <span><i class="uil uil-heart"></i></span>
                                        <span><i class="uil uil-comment-dots"></i></span>
                                        <span><i class="uil uil-share-alt"></i></span>
                                    </div>
                                    <div class="bookmark">
                                        <span><i class="uil uil-bookmark-full"></i></span>
                                    </div>
                                </div>

                                <div class="liked-by">
                                    <span><img src="./images/profile-10.jpg"></span>
                                    <span><img src="./images/profile-4.jpg"></span>
                                    <span><img src="./images/profile-15.jpg"></span>
                                    <p>Liked by <b>Ernest Achiever</b> and <b>2,323 others</b></p>
                                </div>

                                <div class="caption">
                                    <p><b>Lana Rose</b> Express yourself in the most comfortable way. <span class="harsh-tag">#expressing</span></p>
                                </div>
                                <div class="comments text-muted">View all 277 comments</div>
                            </div>
                            <!---------------- END OF FEED ----------------->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>




    </body>

    </html>