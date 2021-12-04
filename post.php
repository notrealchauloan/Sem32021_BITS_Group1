<!------------------- FEED 1 --------------------->
<div class="feed ">
    <div class="head ">
        <div class="user ">
            <div class="profile-photo ">
                <img src="https://images.unsplash.com/photo-1486302913014-862923f5fd48?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1160&q=80">
            </div>
            <div class="ingo ">
                <h3>
                    <a href="profile.php">
                        <?php
                            echo $ROW_USER['firstname'] . " " . $ROW_USER['lastname'];
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
        <span class="edit "><i class="uil uil-ellipsis-h "></i></span>
    </div>

    <div class="photo">
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
        <p>
        <b>
            <a href="profile.php">
                <?php
                    echo $ROW_USER['firstname'] . " " . $ROW_USER['lastname'];
                ?>
            </a>
        </b> 
        <?php
            echo $ROW['content'];
        ?>
        <!-- <span class="harsh-tag ">#lifestyle</span></p> -->
    </div>
    <div class="comments text-muted ">View all 277 comments</div>
</div>
                        <!---------------- END OF FEED ----------------->