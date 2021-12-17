<div class="info" style=" margin-bottom: 1.5rem;">
    <a href="profile.php?id=<?php echo $FRIEND_ROW['userid']; ?>">
        <div class="profile-photo">
            <!-- default profile picture if has not update profile picture -->
            <?php
                $image = "";

                if(file_exists($FRIEND_ROW['profile_image']))
                {
                    $image = $FRIEND_ROW['profile_image'];
                }
                else if($FRIEND_ROW['gender'] == 'F')
                {
                    $image = 'images/user_female.jpg'; 
                } 
                else if($FRIEND_ROW['gender'] == 'M')
                {
                    $image = 'images/user_male.jpg';
                }
                else if($FRIEND_ROW['gender'] == 'O')
                {
                    $image = 'images/user_other.jpg';
                }
            ?>
            <img src="<?php echo $image; ?>" >
        </div>
        <div class="friend-name" style="padding-top:1rem; padding-right: 0.5rem;">
            <h5 style="white-space: nowrap; float:right">
                <?php
                    echo $FRIEND_ROW['firstname'] . " " . $FRIEND_ROW['lastname'];
                ?>
            </h5> 
        </div>
    </a>
</div>
    
    
    

        
    
