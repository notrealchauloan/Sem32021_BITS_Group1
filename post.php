<!------------------- FEED 1 --------------------->
<div class="feed">
    <div class="head ">
        <div class="user ">
            <div class="profile-photo ">
                <img class="rounded-circle " src="
                <?php 
                
                    echo $ROW_USER['profile_image'];
                ?>
                " alt="... ">    
            </div>
            <div class="ingo ">
                <h3>
                    <a href="profile.php">
                        <?php
                            echo $ROW_USER['firstname'] . " " . $ROW_USER['lastname'];
                        
                            if($ROW['is_profile_image'])
                            {
                                $gender = "his";
                                if($ROW_USER['gender'] == "F")
                                {
                                    $gender = "her";
                                } 
                                else if($ROW_USER['gender'] == "O")
                                {
                                    $gender = "";
                                }
                                echo '<span style="font-weight:normal; color:#aaa;"> has updated ' . $gender . ' profile image</span>';
                            }

                            if($ROW['is_cover_image'])
                            {
                                $gender = "his";
                                if($ROW_USER['gender'] == "F")
                                {
                                    $gender = "her";
                                } 
                                else if($ROW_USER['gender'] == "O")
                                {
                                    $gender = "";
                                }
                                echo '<span style="font-weight:normal; color:#aaa;"> has updated ' . $gender . ' profile image</span>';
                            }
                        ?>
                    </a>
                </h3>
                <small>
                    <!-- get time of post creation -->
                    <?php
                        echo $ROW['date'];
                    ?>
                </small>
            </div>
        </div>
        <!-- <span class="edit "><i class="uil uil-ellipsis-h "></i></span> -->
        <?php
            $Post = new Post();
            if($Post->i_own_post($ROW['postid'],$_SESSION['userid'])){
                echo "<span class='edit'>
                        <a href='edit.php?postid=$ROW[postid]'>Edit</a>
                    </span>";
            }

            $i_liked = false;
            if(isset($_SESSION['userid']))
            {
                $DB = new Database();
                $sql = "SELECT likes FROM likes WHERE type='post' && contentid = '$ROW[postid]' LIMIT 1";
                $result = $DB->read($sql);

                // print_r($result);
                if(is_array($result))
                {
                    $likes = json_decode($result[0]['likes'], true);
                    $user_ids = array_column($likes, "userid");
                    if(in_array($_SESSION['userid'], $user_ids))
                    {
                        $i_liked = true;
                    }
                }
            } 
        ?>
    </div>

    <div class="photo">
        <?php
            if(file_exists($ROW['images']))
            {
        ?>
            <img src="<?php echo $ROW['images'] ?>" alt="">
        <?php
            }
        ?>
        
    </div>

    <?php
        $likes = "";

        if($ROW['likes'] > 0)
        {
            // echo "<br>";
            // echo "<a href='likes.php?type=post&id=$ROW[postid]'>";
            // echo
            if($ROW['likes'] == 1)
            {
                if($i_liked)
                {
                    $likes = "You like this post";
                }
                else
                {
                    $likes = "1 person likes this post";
                }
            }
            else 
            {
                if($i_liked)
                {
                    $other_likes = $ROW['likes'] - 1;
                    if($other_likes == 1)
                    {
                        $likes = "You and " . $other_likes . " other person like this post";
                    }
                    else
                    {
                        $likes = "You and " . $other_likes . " people like this post";
                    }
                } 
                else
                {
                    $likes = $ROW['likes'] . " people like this post";
                }
            }
        }  
        // ($ROW['likes'] > 0) ? "Liked by " . $ROW['likes'] . " people" : "" ;
    ?>
    <div class="action-buttons ">
        <div class="interaction-buttons ">
            <span id="icon-style"> 
                <a href="like.php?type=post&id=<?php echo $ROW['postid'] ?>">
                    <i class="uil uil-heart"></i>
                </a>
            </span>
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
        <p><b><?php echo $likes; ?></b></p>
    </div>

    <div class="caption ">
        <p>
        <b>
            <a href="profile.php">
                <?php
                    echo htmlspecialchars($ROW_USER['firstname']) . " " . htmlspecialchars($ROW_USER['lastname']);
                ?>
            </a>
        </b> 
        <?php
            echo htmlspecialchars($ROW['content']);
        ?>
        <!-- <span class="harsh-tag ">#lifestyle</span></p> -->
    </div>
    <!-- <div class="comments text-muted ">View all 277 comments</div> -->
</div>
                        <!---------------- END OF FEED ----------------->