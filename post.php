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

        $likes = ($ROW['likes'] > 0) ? "Liked by " . $ROW['likes'] . " people" : "" ;
    ?>
    <div class="action-buttons ">
        <div class="interaction-buttons ">
            <span> 
                <a href="like.php?type=post&id=<?php echo $ROW['postid'] ?>">
                    <i class="uil uil-heart "></i>
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
    <div class="comments text-muted ">View all 277 comments</div>
</div>
                        <!---------------- END OF FEED ----------------->